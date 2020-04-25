<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Manager.php");

class newsManager extends Manager
{
	public function getNewscast($depart,$newsParPage) /** Récupération des actualités pour leur affichage **/
	{
		$db = $this->dbConnect();
			$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_content, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM p5_news WHERE state = TRUE ORDER BY date_content DESC LIMIT :depart, :newsParPage');
			$req->bindParam('depart', $depart, \PDO::PARAM_INT);
			$req->bindParam('newsParPage', $newsParPage, \PDO::PARAM_INT);
			$req->execute();
			$datas = $req->fetchAll();

			return $datas;
	}

	public function getNews($p5_news) /** Récupération des actualités dans un tableau **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_content, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM p5_news WHERE id = ?');
		$req->execute(array($p5_news));
		$p5_news = $req->fetch();

		return $p5_news;
	}

	public function newNews($title,$content) /** Préparation à l'insertion d'une actualité dans la table p5_news **/
	{
		$db = $this->dbConnect();
		$news = $db->prepare('INSERT INTO p5_news(FK_admin, title, content, date_content,state) VALUES(1, ?, ?, NOW(), TRUE)');
		$affectedLines = $news->execute(array($title, $content));

		return $affectedLines;
	}

	public function editNews($id,$title,$content)	/** Préparation de la modification d'une actualité dans la table p5_news **/
	{

		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE p5_news SET title = :title, content = :content WHERE id = :id');
		$newNewcast = $req->execute(array('id' => $id, 'title'=>$title, 'content'=>$content));
		

		return $newNewcast;

	}

	public function deleteNews($id) /** Préparation de la suppression d'une actualité dans la table p5_news **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE p5_news SET state = FALSE WHERE id = :id');
		$newsuppr = $req->execute(array('id' => $id));

		return $newsuppr;

	}

	public function countNews()	/** Permet de compter toutes les actualités non supprimé afin de mettre en place la pagination**/
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id FROM p5_news WHERE state = TRUE');

		return $req;
	}

	public function lastNews() /** Permettra d'afficher la dernière actualité en date sur la page d'accueil **/
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, SUBSTRING(content,1,100) AS ExtractContent, DATE_FORMAT(date_content, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM p5_news WHERE state = TRUE ORDER BY date_content DESC LIMIT 0, 1');
		$datas = $req->fetchAll();

		return $datas;
	}
}