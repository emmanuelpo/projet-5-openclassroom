<?php
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, [
        'cache' => '/path/to/compilation_cache',
    ]);
    $twig = new \Twig\Environment($loader, ['cache' => false]);
    $this->twig->addGlobal('_get', $_GET);

    echo $twig->render('template.php');
?>