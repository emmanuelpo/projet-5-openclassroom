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
		ob_start();

		foreach ($postsNews as $value) {

			echo   '<article class="Actualite">
						<div class="containerActualite">
							<div class="titre">
								'.$value["title"].'
							</div>
							<div class="contenu">
								'.substr(nl2br($value["content"]),0,100).'...
							</div>
							<div class="date_publi">
								<i>Mis en ligne le '.$value["date_fr"].'</i>
							</div>
						</div>
						<p>
						<em><a class="link" href="index.php?action=post&amp;id='.$value["id"].'">Lire l\'actualité </a></em>
						</p>
					</article>';
		}
		
		$post = ob_get_clean();

		ob_start();

	    	for($i=1;$i<=$pagesTotales;$i++) {
	    		  echo '<a class ="nbPages" href="index.php?action=news&page='.$i.'"> '.$i.' </a>'  ;
	    		}

    	$page = ob_get_clean();

		return $this->renderTwig('view/news.php',['postsNews' => $post,'pagesArticles' => $page, 'title' => $title]);
	}

	public function adminNews($page)		/** Permet d'afficher la liste des actualités côté administrateur **/
	{
		$title = "Administration Actualité de l'accueil de Loisirs";

		$postParPage = 5;
		$depart = ($page - 1) * $postParPage ;
		$postManager = new \OpenClassrooms\projetopenclassroom\model\newsManager();
		$postsNews = $postManager->getNewscast($depart,$postParPage);

		$countReq = $postManager->countNews();
		$countPosts = $countReq->rowCount();
		$pagesTotales = ceil($countPosts/$postParPage);

		$commentManager = new \OpenClassrooms\projetopenclassroom\model\commentManager(); 
		$reportList = $commentManager->postReportComment(); 


		ob_start();

		foreach ($postsNews as $value) {
			echo '<article class="Actualite">
					<div class="containerActualite">
						<div class="titre">
							'.$value["title"].'
						</div>
						<div class="contenu">
							'.substr(nl2br($value["content"]),0,100).'...
						</div>
						<div class="date_publi">
							'.$value["date_fr"].'
						</div>
						<em><a class="link" href="index.php?action=post&amp;id='.$value["id"].' ">Lire l\'actualité</a></em>
						<em><a class="modifChapter" href="index.php?action=editNews&amp;id='.$value["id"].'"> (Modifier l\'actualité)</a></em>
					</div>
				</article>
				';
		}
		
		$post = ob_get_clean();

		ob_start();

	    	for($i=1;$i<=$pagesTotales;$i++) {
	    		  echo '<a class ="nbPages" href="index.php?action=adminNews&page='.$i.'"> '.$i.' </a>'  ;
	    		}

    	$page = ob_get_clean();

    	/** Permet d'afficher la liste des commentaires signalés   **/

        ob_start();

		foreach ($reportList as $values){

		echo'
	            <div class="comment_publish">
	                <strong class="commentPseudo">'.$values["author"].'</strong>
	                <p> le '.$values["date_comment_fr"].'</p> 
	                <p>'.$values["comment"].'</p>
	                <p class="signalComment"><a  href="index.php?action=validComment&amp;id='.$values["id"].'"> (Valider le Commentaire)</a>';
		            if(isset($_SESSION["auth"])) { 
	                        echo ' <a href="index.php?action=deleteComment&amp;id='.$values["id"].'"> (Supprimer le commentaire)</a>
		                </p></div>';
	               }
		}

		$reporter = ob_get_clean();

		return $this->renderTwig('admin/backend/adminNews.php',['postsNews' => $post,'pagesArticles' => $page, 'title' => $title, 'reports' => $reporter]);
	}

	public function writeNews()	/** Appelle la page permettant d'écrire d'une nouvelle actualité' **/			   
	{
		return $this->renderTwig('admin/backend/addNews.php');
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

		return $this->renderTwig('admin/backend/editNews.php', ['post' => $post]);

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