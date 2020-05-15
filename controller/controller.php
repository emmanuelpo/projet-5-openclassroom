<?php

namespace Controller;

class Controller{

	public function renderTwig($path,$variable= []){
		$loader = new \Twig\Loader\FilesystemLoader('/');
	    $twig = new \Twig\Environment($loader, ['cache' => '/path/to/compilation_cache',]);
	    $twig = new \Twig\Environment($loader, ['cache' => false]);
	    $twig = new \Twig\Environment($loader, ['debug' => true,]);
	    $twig->addGlobal('session', $_SESSION);
	    $twig->addGlobal('_get', $_GET);
	    $twig->addExtension(new \Twig\Extension\DebugExtension());
	    
	    echo $twig->render($path,$variable);
	    

	}
}