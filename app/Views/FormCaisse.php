<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Choisir une Caisse</title>
    </head>
<body>

    <div>
        <h2>Choisir Caisse</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="<?= base_url('/caisse/selectionner') ?>" method="post">
            <?= csrf_field() ?>
            
            <p>
                <select name="id_caisse" required style="padding: 5px; width: 200px;">
                    <option value="">selectionner</option>
                    <?php foreach ($caisses as $caisse): ?>
                        <option value="<?= $caisse['id_caisse'] ?>"><?= $caisse['nom_caisse'] ?></option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>
                <button type="submit">Valider</button>
            </p>
        </form>
    </div>

</body>
</html>