<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="../public/css/style.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    </head>

    <body>
    	<?php require('view/header.php'); ?>
    	<?= $content ?>
    <script type="text/javascript" src="../public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../public/js/WeatherApp.js"></script>
    </body>
</html>