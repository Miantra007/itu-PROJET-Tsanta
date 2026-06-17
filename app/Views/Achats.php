<?php $caisse = session()->get('caisse_active'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Achat</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ddd;
        }

        .total-row {
            font-weight: bold;
        }

        button {
            margin-top: 10px;
            padding: 8px 12px;
            cursor: pointer;
        }
    </style>
        <?= $this->include('partials/header') ?>

</head>

<body>

    <h2>Faites vos achats</h2>

    <p>
        Caisse active :
        <?= isset($caisse['num']) ? esc($caisse['num']) : 'Aucune caisse' ?>
    </p>

    <form id="form-achat">

        <?= csrf_field() ?>

        <p>Produit :
            <select name="id_produit" id="id_produit" required>
                <option value="">selectionner</option>

                <?php foreach ($produits as $produit): ?>
                    <option value="<?= $produit['id_produit'] ?>" data-prix="<?= $produit['prix_unitaire'] ?>">
                        <?= esc($produit['designation']) ?> (<?= esc($produit['prix_unitaire']) ?> Ar)
                    </option>
                <?php endforeach; ?>

            </select>
        </p>

        <p>Quantité :
            <input type="number" id="quantite" min="1" required>
        </p>

        <button type="submit">Ajouter au panier</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Montant</th>
            </tr>
        </thead>

        <tbody id="corps-panier"></tbody>

        <tfoot>
            <tr class="total-row">
                <td colspan="3" style="text-align:right;">Total</td>
                <td id="total-general">0</td>
            </tr>
        </tfoot>
    </table>

    <button id="valider-panier">Cloturer Achat</button>

    <script>

        let panier = [];

        /* ================== AJOUT PANIER ================== */
        document.getElementById('form-achat').addEventListener('submit', function (e) {
            e.preventDefault();

            const select = document.getElementById('id_produit');
            const option = select.options[select.selectedIndex];

            const id_produit = select.value;
            const designation = option.text.split('(')[0].trim();
            const prix = parseFloat(option.getAttribute('data-prix'));
            const quantite = parseInt(document.getElementById('quantite').value);

            if (!id_produit || !quantite) return;

            const montant = prix * quantite;

            panier.push({
                id_produit,
                designation,
                prix,
                quantite,
                montant
            });

            document.getElementById('corps-panier').insertAdjacentHTML('beforeend', `
        <tr>
            <td>${designation}</td>
            <td>${prix}</td>
            <td>${quantite}</td>
            <td>${montant}</td>
        </tr>
        `);

            let totalElem = document.getElementById('total-general');
            let total = parseFloat(totalElem.innerText) || 0;
            totalElem.innerText = total + montant;

            document.getElementById('quantite').value = '';
            select.value = '';
        });


        /* ================== VALIDER ACHAT ================== */
        document.getElementById('valider-panier').addEventListener('click', function () {

            if (panier.length === 0) {
                alert("Panier vide !");
                return;
            }

            fetch("<?= base_url('/achat/valider') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: JSON.stringify({
                    panier: panier
                })
            })
                .then(res => res.text())
                .then(text => {
                    console.log("RAW RESPONSE:", text);

                    let data = {};

                    try {
                        data = JSON.parse(text);
                    } catch (e) {
                        alert("Erreur backend (pas JSON)");
                        return;
                    }

                    alert(data.message || "OK");

                    if (data.status) {
                        location.reload();
                    }
                })
                .catch(err => {
                    console.log(err);
                    alert("Erreur réseau");
                });

        });

    </script>

</body>

</html>