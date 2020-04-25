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
}