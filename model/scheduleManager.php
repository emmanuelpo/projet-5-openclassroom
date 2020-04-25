<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Manager.php");

class scheduleManager extends Manager
{
	public function getSchedules($depart,$scheduleParPage) /** Récupération des articles du journal pour leur affichage **/
	{
		$db = $this->dbConnect();
			$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_content, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM p5_schedule WHERE state = TRUE ORDER BY date_content DESC LIMIT :depart, :scheduleParPage');
			$req->bindParam('depart', $depart, \PDO::PARAM_INT);
			$req->bindParam('scheduleParPage', $scheduleParPage, \PDO::PARAM_INT);
			$req->execute();
			$datas = $req->fetchAll();

			return $datas;
	}

	public function getSchedule($scheduleId) /** Récupération des article dans un tableau **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_content, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM p5_schedule WHERE id = ?');
		$req->execute(array($scheduleId));
		$p5_schedule = $req->fetch();

		return $p5_schedule;
	}

	public function postSchedule($title,$content) /** Préparation à l'insertion d'un article dans la table p5_schedule **/
	{
		$db = $this->dbConnect();
		$news = $db->prepare('INSERT INTO p5_schedule(FK_admin, title, content, date_content,state) VALUES(1, ?, ?, NOW(), TRUE)');
		$affectedLines = $news->execute(array($title, $content));

		return $affectedLines;
	}

	public function editSchedule($id,$title,$content)	/** Préparation de la modification d'un article dans la table p5_schedule **/
	{

		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE p5_schedule SET title = :title, content = :content WHERE id = :id');
		$newNewcast = $req->execute(array('id' => $id, 'title'=>$title, 'content'=>$content));
		

		return $newSchedule;

	}

	public function deleteSchedule($id) /** Préparation de la suppression d'un article dans la table p5_schedule **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE p5_schedule SET state = FALSE WHERE id = :id');
		$schedulesuppr = $req->execute(array('id' => $id));

		return $schedulesuppr;

	}

	public function countSchedule()	/** Permet de compter tous les articles du journal non supprimé afin de mettre en place la pagination**/
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id FROM p5_schedule WHERE state = TRUE');

		return $req;
	}

	public function lastSchedule() /** Permettra d'afficher le dernier article du journal en date sur la page d'accueil **/
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, SUBSTRING(content,1,100) AS ExtractContent, DATE_FORMAT(date_content, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM p5_schedule WHERE state = TRUE ORDER BY date_content DESC LIMIT 0, 1');

		$datas = $req->fetchAll();

		return $datas;
	}
}