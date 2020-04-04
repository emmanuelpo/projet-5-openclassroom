<?php

namespace OpenClassrooms\projetopenclassroom\model;

abstract class Manager  /** Classe permettant la connexion à la base de données **/
{
	private $dbname ="projet5";
	private $user = "root";
	private $pass = "";

	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname='.$this->dbname.';charset=utf8',$this->user,$this->pass,array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION ));
		return $db;
	}
}