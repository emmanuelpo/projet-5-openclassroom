<?php

namespace Controller;

require_once('model/commentManager.php');

class CommentController extends Controller
{

	public function listComment()	/** Permet d'afficher les commentaires d'une actualité **/
	{

		$postManager = new \OpenClassrooms\projetopenclassroom\model\newsManager();
		$commentManager = new \OpenClassrooms\projetopenclassroom\model\commentManager();

		$post = $postManager->getNews($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);

		$titlePage = " Page d'actualité";

		return $this->renderTwig('view/newsPage.php',['comments' => $comments,'titlePage' => $titlePage, 'post' => $post ]);
	}

	public function addComment($FK_post, $author, $comment)  /** Permet d'ajouter un commentaire dans une actualité **/
	{
		$commentManager = new \OpenClassrooms\projetopenclassroom\model\commentManager();

		$affectedLines = $commentManager->postComment($FK_post, $author, $comment);

		if ($affectedLines === false) {
			die('Impossible d\'ajouter le commentaire !');
		}
		else {
			header('Location: index.php?action=post&id='. $FK_post);
		}
	}

	public function deleteComment($id)	/** Permet de supprimer un commentaire d'une actualité **/
	{
		$commentManager = new \OpenClassrooms\projetopenclassroom\model\commentManager();

		$deleteComment = $commentManager->deleteComment($id);
		if($deleteComment == false){
			die('Impossible de supprimer le commentaire !');
		}
        else{
        	header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
	}

    public function reportComment($id,$FK_post)                             /**Permet de signaler un commentaire **/
    {
        $commentManager = new \OpenClassrooms\projetopenclassroom\model\commentManager();

        $report = $commentManager->reportComment($id);
        if($report == false){
			die('Impossible de signaler le commentaire !');
		}
        else{
        	header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function validComment($id)                             /**Permet de valider un commentaire signalé **/
    {
        $commentManager = new \OpenClassrooms\projetopenclassroom\model\commentManager();

        $report = $commentManager->validComment($id);
        if($report == false){
			die('Impossible de valider !');
		}
        else{
        	header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
