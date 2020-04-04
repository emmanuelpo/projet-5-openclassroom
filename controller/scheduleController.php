<?php

namespace Controller;

require_once('model/scheduleManager.php');


class scheduleController extends Controller
{

	public function mainSchedule(){								

		$postManager = new \OpenClassrooms\projetopenclassroom\model\scheduleManager();

		$postSchedule = $postManager->lastSchedule();

		return $this->renderTwig('view/accueil.php',['postSchedule' => $postSchedule[0]]);
	}	

	public function adminSchedule($page)					/** Permet d'afficher la liste des pages du journal en appelant le fichier html adminSchedule.php **/
	{
		$title = "Administration Journal de l'accueil de Loisirs";

		$postParPage = 5;
		$depart = ($page - 1) * $postParPage;
		$postManager = new \OpenClassrooms\projetopenclassroom\model\scheduleManager();
		$postSchedule = $postManager->getSchedules($depart,$postParPage);

		$countReq = $postManager->countSchedule();
		$countPosts = $countReq->rowCount();
		$pagesTotales = ceil($countPosts/$postParPage);

		ob_start();

		foreach ($postSchedule as $value) {
			echo '<article class="programmeJour">
					<div class="containerProgramme">
						<div class="titreArticle">
							'.$value["title"].'
						</div>
						<div class="contenuArticle">
							'.substr(nl2br($value["content"]),0,100).'
						</div>
						<div class="date_publi">
							<i> Mis en ligne le'.$value["date_fr"].'</i>
						</div>
						<em><a class="fullChapter" href="index.php?action=schedulePost&amp;id='.$value["id"].' ">Lire l\'article</a></em>
						<em><a class="modifChapter" href="index.php?action=editSchedule&amp;id='.$value["id"].'"> (Modifier l\'article)</a></em>
					</div>
				</article>';
		}
		
		$post = ob_get_clean();

		ob_start();

	    	for($i=1;$i<=$pagesTotales;$i++) {
	    		  echo '<a class ="nbPages" href="index.php?action=adminSchedule&page='.$i.'"> '.$i.' </a>'  ;
	    		}

    	$page = ob_get_clean();

		return $this->renderTwig('admin/backend/adminSchedule.php',['postsSchedule' => $post,'pagesSchedule' => $page, 'title' => $title]);
	}

	public function visitorView($page)		
	{
		$postParPage = 5;
		$depart = ($page - 1) * $postParPage;
		$postManager = new \OpenClassrooms\projetopenclassroom\model\scheduleManager();
		$postSchedule = $postManager->getSchedules($depart,$postParPage);

		$countReq = $postManager->countSchedule();
		$countPosts = $countReq->rowCount();
		$pagesTotales = ceil($countPosts/$postParPage);

		$title = "Journal de l'accueil de Loisirs";

		ob_start();

		foreach ($postSchedule as $value) {
			echo '<article class ="programmeJour">
					<div class="containerProgramme">
						<div class="titreArticle">
							'.$value["title"].'
						</div>
						<div class="contenuArticle">
							'.substr(nl2br($value["content"]),0,100).'
						</div>
						<div class="date_publi">
							<i>Mis en ligne le '.$value["date_fr"].'</i>
						</div>
					</div>
				
				<p>
				<em><a class="fullChapter" href="index.php?action=schedulePost&amp;id='.$value["id"].'">Lire l\'article </a></em>
				</p>
				</article>';
		}
		
		$post = ob_get_clean();

		ob_start();

	    	for($i=1;$i<=$pagesTotales;$i++) {
	    		  echo '<a class ="nbPages" href="index.php?action=schedule&page='.$i.'"> '.$i.' </a>'  ;
	    		}

    	$page = ob_get_clean();

		return $this->renderTwig('view/schedule.php',['postsSchedule' => $post,'pagesSchedule' => $page, 'title' => $title]);
	}

	public function schedulePage()
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\scheduleManager();
		$postSchedule = $postManager->getSchedule($_GET['id']);
		$titlePage = "Journal de l'accueil de Loisirs";

		return $this->renderTwig('view/SchedulePage.php',['titlePage' => $titlePage, 'post' => $postSchedule ]);
	}


	public function writeSchedule()				   /** Appelle la page permettant d'écrire une nouvelle page du journal **/
	{
		return $this->renderTwig('admin/backend/addSchedule.php');
	}

	public function addSchedule($title,$content)	/** Permet de créer une nouvelle page du journal **/
	{
		$titleSchedule = "Ajouter le programme du jour";

		$postManager = new \OpenClassrooms\projetopenclassroom\model\scheduleManager();

		$affectedLines = $postManager->postSchedule($title,$content);

		if ($affectedLines === false){
			die('Impossible d\'ajouter le chapitre !');
		}
		else {
			header('Location: index.php?action=adminSchedule');
		}
	}

	public function editSchedule($id)					/** Permet d'éditer une page du journal existants **/
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\scheduleManager();

		$post = $postManager->getSchedule($id);

		if (!empty($_POST['title']) && !empty($_POST['content'])) {
			$postManager->editSchedule($_GET['id'], $_POST['title'], $_POST['content']);
			header('Location: index.php?action=adminSchedule');
		}

		return $this->renderTwig('admin/backend/editSchedule.php', ['post' => $post]);

	}

	public function deleteSchedule($id)				/** Permet de supprimer des pages du journal existants **/
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\scheduleManager();

        $post = $postManager->getSchedule($id);

        if (isset($_GET['id'])) {
           $postManager->deleteSchedule($_GET['id']);
           header('Location: index.php?action=adminSchedule');
        }

	}
}