<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Manager.php");

class commentManager extends Manager
{
	public function getComments($p5_newsId)		/**Récupération des commentaires dans la table comments de la base de données **/
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin\') AS date_comment_fr FROM p5_comments WHERE FK_post = ? ORDER BY date_comment DESC');
		$comments->execute(array($p5_newsId));

		return $comments;
	}

	public function postComment($p5_newsId, $author, $comment)	/** Préparation à l'insertion d'un commentaire dans la base de données **/
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO p5_comments(FK_post, author, comment, date_comment,report) VALUES (?, ?, ?, NOW(), FALSE)');
		$affectedLines = $comments->execute(array($p5_newsId, $author, $comment));

		return $affectedLines;
	}

	public function reportComment($id) /** Préparation au report d'un commentaire dans la base de données **/
	{
		$db = $this->dbConnect();
		$rep = $db->prepare('UPDATE p5_comments SET report = TRUE WHERE id = ?');
		$newReport  = $rep->execute(array($id));

		return $newReport;
	}

	public function validComment($id) /** Préparation à la validation d'un commentaire qui a été reporté dans la base de données **/
	{
		$db = $this->dbConnect();
		$rep = $db->prepare('UPDATE p5_comments SET report = FALSE WHERE id = ?');
		$newValid  = $rep->execute(array($id));

		return $newValid;
	}

    public function postReportComment() /** Récupération des commentaires reportés de la base de données **/
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM p5_comments WHERE report = TRUE ORDER BY date_comment DESC');
        $comments->execute();

        return $comments;
    }


	public function deleteComment($id)	/** Préparation à la suppression d'un commentaire dans la base de données **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM p5_comments WHERE id = ?');
		$req->execute(array($id));

		return $req;
	}


}