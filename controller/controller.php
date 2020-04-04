<?php

namespace Controller;

class Controller{

	public function renderTwig($path,$variable= []){
		$loader = new \Twig\Loader\FilesystemLoader('/');
	    $twig = new \Twig\Environment($loader, ['cache' => '/path/to/compilation_cache',]);
	    $twig = new \Twig\Environment($loader, ['cache' => false]);
	    $twig->addGlobal('session', $_SESSION);
	    $twig->addGlobal('_get', $_GET);
	    
	    echo $twig->render($path,$variable);
	}
}