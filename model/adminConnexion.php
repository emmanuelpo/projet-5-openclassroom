<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Manager.php");

class adminConnexion extends Manager
{
	public function getLogin($pseudo) /** Préparation de la connexion à la partie administration du site **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM p5_admin WHERE login = :login');
		$req->execute(array(":login"=>$pseudo));

		$logincheck = $req->fetch();

		return $logincheck;
	}

	public function getToken()
	{
		$db = $this->dbConnect();
		$stmt = $db->prepare('SELECT token FROM p5_admin');
		$stmt->execute();

		$email = $stmt->fetchColumn();

		return $email;
	}

	public function updateToken($token,$login)
	{
		$db = $this->dbConnect();
		$stmt = $db->prepare('UPDATE p5_admin SET token = :token WHERE login = :login');
		$stmt->execute(array('token'=>$token, 'login'=>$login));

		return $stmt;
	}

	public function updatePassword($password,$token)
	{
		$db = $this->dbConnect();
		$pass = $db->prepare('UPDATE p5_admin SET password = :password WHERE token = :token');
		$pass->execute(array('password'=>$password, 'token'=>$token));

		return $pass;
	}

	public function invalidToken($token)
	{
		$db = $this->dbConnect();
		$stmt = $db->prepare('UPDATE p5_admin SET token = NULL WHERE token = :token');
		$stmt->execute(array('token'=>$token));

		return $stmt;
	}
}