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

			//$passtest= password_hash("aaa", PASSWORD_DEFAULT);

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

	public function getToken() /** Permet de récupérer un nouveau mot de passe en envoyant un mail de réinitialisation **/
	{
		$title="Mot de passe oublié";

		if(isset($_POST["email"]))
		{
			$login = htmlspecialchars($_POST["email"]);
			$loginManager = new \OpenClassrooms\projetopenclassroom\model\adminConnexion();
			$account = $loginManager->getLogin($login);

			if ($account){

					$token = uniqid();
					$url = "http://officedutourismestrasbourg-projet2.fr/projet-5-openclassroom/index.php?action=token&token=$token";

					$email = "no-reply@centrechenesblancs.com";
					$to = "emmanuel.polidoro@gmail.com";
					$subject = "Bonjour!";
					$body = "Bonjour voici votre lien de réinitialisation de mot de passe ".$url;
					$headers = 'From: ' .$email . "\r\n".'Reply-To: ' . $email. "\r\n".'X-Mailer: PHP/' . phpversion();
					ob_start();

					if (mail($to, $subject, $body, $headers)){
						$newToken = $loginManager->updateToken($token,$login);
						echo" Mail envoyé avec succès";
					}else{
						echo" Un problème est survenu";
					}

					$mail_send = ob_get_clean();		
			}
		}
		else{
				$ok = "";
		}
		return $this->renderTwig('view/forgetPassword.php',['title' => $title, 'mail_send' => $mail_send]);
	}

	public function newPassword() /** Permet de mettre en place son nouveau mot de passe **/
	{
		$loginManager = new \OpenClassrooms\projetopenclassroom\model\adminConnexion();
		$token = $loginManager->getToken();
		$valid = " ";
		$error = " ";

		if(isset($token) && !empty($token)){
			if( isset($_POST['newPassword']) && isset($_POST['confirmPassword'])){
				if($_POST['newPassword'] == $_POST['confirmPassword']){
					$password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
					$newPass = $loginManager->updatePassword($password,$token);
					$valid = "Mot de passe modifié avec succés !";
					$loginManager->invalidToken($token);
				}else{
					$error = "Les deux champs remplis ne correspondent pas, veuillez réessayer !";
				}
			}
		}
		else{
			return header('Location: index.php');
		}
		return $this->renderTwig('view/admin/token/token.php',['valid' => $valid, 'error' => $error]);
	}
}