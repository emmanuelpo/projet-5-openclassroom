<?php

namespace Controller;

require_once('model/adminConnexion.php');
require_once('controller/controller.php');

class adminController extends Controller
{

	public function loginValid()          /** Permet de se connecter à la page d'administration **/
	{		
		if( isset($_POST['username']) && isset($_POST['password']))
		{
			$username = htmlspecialchars($_POST["username"]);
			$password = htmlspecialchars($_POST["password"]);

			$loginManager = new \OpenClassrooms\projetopenclassroom\model\adminConnexion();

			$account = $loginManager->getLogin($username);

			if (!$account){
				$_SESSION['erreurLogin'] = "Mauvais login ou mot de passe";
				return header('Location: index.php?action=login');
			}

			$pass = password_verify($password, $account['password']);
				if($pass){
					$_SESSION["auth"] = TRUE;
					return header('Location: index.php?action=adminNews');
				}else{
					$_SESSION['erreurLogin'] = "Mauvais login ou mot de passe";
					return header('Location: index.php?action=login');
				}
		}
		else
		{
			$title = "Page de Connexion";

			session_destroy();

			echo $this->renderTwig('view/login.php',['title' => $title]);
		}

	}

	public function logout()			/** Permet de se déconnecter de la session admin **/
	{
		if (isset($_SESSION["auth"])){
			session_destroy();
		}
		header ('Location: index.php');
	}

}