<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <h1>Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;">
            <?= session()->getFlashdata('error') ?>
        </p>
    <?php endif; ?>

    <form action="<?= base_url('/login') ?>" method="post">
        <p>Email : <input type="email" name="email"></p>
        <p>Mot de passe : <input type="password" name="mdp"></p>
        <input type="submit" value="Se connecter">
    </form>

</body>

</html>