<?php $caisse = session()->get('caisse_active'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Achat</title>
</head>

<body>

    <div>
        <h2>Faites vos achats</h2>

        <p>
            Caisse active : <?= $caisse['num'] ?>
        </p>

        <form action="<?= base_url('/achat/ajouter') ?>" method="post">
            <?= csrf_field() ?>

            <input type="hidden" name="id_caisse" value="<?= $caisse['id'] ?>">

            <p>Produits :
                <select name="id_produit" required>
                    <option value="">selectionner</option>
                    <?php foreach ($produits as $produit): ?>
                        <option value="<?= $produit['id_produit'] ?>">
                            <?= $produit['designation'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>Quantite :
                <input type="number" name="quantite">
            </p>

            <button type="submit">Valider</button>
        </form>
    </div>

</body>

</html>