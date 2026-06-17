<?php $caisse = session()->get('caisse_active'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Achat</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #aaa; padding: 8px; text-align: left; }
        th { background-color: #ddd; }
        .total-row { font-weight: bold; }
    </style>
</head>

<body>

    <div>
        <h2>Faites vos achats</h2>

        <p>
            Caisse active : <?= isset($caisse['num']) ? esc($caisse['num']) : 'Aucune' ?>
        </p>

        <form id="form-achat">
            <?= csrf_field() ?>

            <p>Produits :
                <select name="id_produit" id="id_produit" required>
                    <option value="">selectionner</option>
                    <?php foreach ($produits as $produit): ?>
                        <option value="<?= $produit['id_produit'] ?>" data-prix="<?= $produit['prix_unitaire'] ?>">
                            <?= esc($produit['designation']) ?> (<?= esc($produit['prix_unitaire']) ?> Ar)
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>Quantite :
                <input type="number" name="quantite" id="quantite" min="1" required>
            </p>

            <button type="submit">Valider</button>
        </form>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix Unit</th>
                    <th>Qté</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody id="corps-panier">
                </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="3" style="text-align: right;">Total</td>
                    <td id="total-general">0</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <script>
        document.getElementById('form-achat').addEventListener('submit', function(e) {
            e.preventDefault(); // Empêche le rechargement de la page et l'envoi au contrôleur

            const selectProduit = document.getElementById('id_produit');
            const inputQuantite = document.getElementById('quantite');
            
            const optionSelectionnee = selectProduit.options[selectProduit.selectedIndex];
            const designation = optionSelectionnee.text.split('(')[0].trim(); // Récupère juste le nom (ex: Biscuit)
            const prixUnitaire = parseFloat(optionSelectionnee.getAttribute('data-prix')); // Récupère le prix caché
            const quantite = parseInt(inputQuantite.value);

            // Sécurité si rien n'est choisi
            if (!prixUnitaire || !quantite) return;

            // 3. Calculer le montant de la ligne ($Quantité \times Prix$)
            const montant = prixUnitaire * quantite;

            // 4. Créer la nouvelle ligne HTML pour le tableau
            const tbody = document.getElementById('corps-panier');
            const nouvelleLigne = `
                <tr>
                    <td>${designation}</td>
                    <td>${prixUnitaire}</td>
                    <td>${quantite}</td>
                    <td>${montant}</td>
                </tr>
            `;

            // 5. Injecter la ligne dans le tableau
            tbody.insertAdjacentHTML('beforeend', nouvelleLigne);

            // 6. Mettre à jour le Total Général en bas
            const totalElem = document.getElementById('total-general');
            let totalActuel = parseFloat(totalElem.innerText) || 0;
            totalElem.innerText = totalActuel + montant;

            // 7. Vider les champs pour le prochain ajout
            inputQuantite.value = '';
            selectProduit.value = '';
        });
    </script>

</body>
</html>