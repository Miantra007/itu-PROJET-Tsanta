<?php $session = session(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Supermarché</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
        }

        .navbar {
            background: #2c3e50;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }

        .btn-logout {
            background: #e74c3c;
            padding: 6px 10px;
            border-radius: 4px;
        }

        .user {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="navbar">

        <div>
            🛒 Supermarché
        </div>

        <div>
            <?php if ($session->get('isLoggedIn')): ?>

                <span class="user">
                    👤 <?= esc($session->get('nom')) ?>
                </span>

                <a class="btn-logout" href="<?= base_url('/logout') ?>">
                    Déconnexion
                </a>

            <?php else: ?>

                <a href="<?= base_url('/') ?>">Connexion</a>

            <?php endif; ?>
        </div>

    </div>