<?php

namespace Controller;

require_once('model/newsManager.php');

class newsController extends Controller
{
	public function main(){	 /** Permet d'afficher la page d'accueil du site avec la dernière actualité et le dernier article  paru **/

	
		$postManager = new \OpenClassrooms\projetopenclassroom\model\newsManager();
		$postManagers = new \OpenClassrooms\projetopenclassroom\model\scheduleManager();

		$postSchedule = $postManagers->lastSchedule();
		$posts = $postManager->lastNews();

		$title = "Centre de loisirs des Chênes Blancs";

		return $this->renderTwig('view/accueil.php',['posts' => $posts[0],'postSchedule'=> $postSchedule[0], 'title' => $title]);
	}

	public function listNews($page) /** Permet d'afficher la liste des actualités en appelant le fichier html news.php **/
	{
		$postParPage = 5;
		$depart = ($page - 1) * $postParPage ;
		$postManager = new \OpenClassrooms\projetopenclassroom\model\newsManager();
		$postsNews = $postManager->getNewcast($depart,$postParPage);
		
		$countReq = $postManager->countNews();
		$countPosts = $countReq->rowCount();
		$pagesTotales = ceil($countPosts/$postParPage);
		
	}

	public function visitorView($page)		/** Permet d'afficher la liste des actualités **/
	{
		$title = "Actualité de l'accueil de Loisirs";

		$postParPage = 5;
		$depart = ($page - 1) * $postParPage ;
		$postManager = new \OpenClassrooms\projetopenclassroom\model\newsManager();
		$postsNews = $postManager->getNewscast($depart,$postParPage);

		$countReq = $postManager->countNews();
		$countPosts = $countReq->rowCount();
		$pagesTotales = ceil($countPosts/$postParPage);

		return $this->renderTwig('view/news.php',['postsNews' => $postsNews,'pNumber' => $pagesTotales, 'title' => $title]);
	}

	public function adminNews($page)		/** Permet d'afficher la liste des actualités côté administrateur ainsi que les commentaires signalés**/
	{
		$title = "Administration Actualité de l'accueil de Loisirs";

		$postManager = new \OpenClassrooms\projetopenclassroom\model\newsManager();
		$commentManager = new \OpenClassrooms\projetopenclassroom\model\commentManager();

		$postParPage = 5;
		$depart = ($page - 1) * $postParPage ;
		
		$postsNews = $postManager->getNewscast($depart,$postParPage);

		$countReq = $postManager->countNews();
		$countPosts = $countReq->rowCount();
		$pagesTotales = ceil($countPosts/$postParPage);

		$reportComments = $commentManager->postReportComment(); 

		return $this->renderTwig('view/admin/backend/adminNews.php',['postsNews' => $postsNews,'pNumber' => $pagesTotales,'title' => $title,'report' => $reportComments]);
	}

	public function writeNews()	/** Appelle la page permettant d'écrire d'une nouvelle actualité' **/			   
	{
		return $this->renderTwig('view/admin/backend/addNews.php');
	}

	public function addNews($title,$content)	/** Permet de créer de nouvelles actualité **/
	{
		$titleNews = "Ajouter une actualité";

		$postManager = new \OpenClassrooms\projetopenclassroom\model\newsManager();

		$affectedLines = $postManager->newNews($title,$content);

		if ($affectedLines === false){
			die('Impossible d\'ajouter le chapitre !');
		}
		else {
			header('Location: index.php?action=adminNews');
		}
	}

	public function editNews($id) /** Permet d'éditer une actualité existantes **/					
	{
		$titleEditNews = 'Editer une actualité';

		$postManager = new \OpenClassrooms\projetopenclassroom\model\newsManager();

		$post = $postManager->getNews($id);

		if (!empty($_POST['title']) && !empty($_POST['content'])) {
			$postManager->editNews($_GET['id'], $_POST['title'], $_POST['content']);
			header('Location: index.php?action=adminNews');
		}

		return $this->renderTwig('view/admin/backend/editNews.php', ['post' => $post]);

	}

	public function deleteNews($id)	/** Permet de supprimer une actualité existants **/		
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\newsManager();

        $post = $postManager->getNews($id);

        if (isset($_GET['id'])) {
           $postManager->deleteNews($_GET['id']);
           header('Location: index.php?action=adminNews');
        }

	}
}