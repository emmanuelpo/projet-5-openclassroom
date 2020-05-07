<?php

    require 'vendor/autoload.php';

    $login = new Controller\adminController();
    $comment = new Controller\commentController();
    $news = new Controller\newsController();
    $schedule = new Controller\scheduleController();

	session_start();

	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'post') /** Afficher l'actualité selectionné (newsPage.php) **/
		{
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $comment->listComment();
            }
            else
            {
                throw new Exception('Erreur: aucun identifiant d\'actualité envoyé');
            }

		}
        if($_GET['action'] == 'schedulePost') /** Afficher un article du journal (SchedulePage.php) **/
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $schedule->schedulePage();
            }
            else
            {
                throw new Exception('Erreur: aucun identifiant d\'article envoyé');
            }
        }
        elseif ($_GET['action'] == 'news') /** Aller sur la page des news (mode visiteur) **/
        {
            if(isset($_GET['page']))
            {
                $page = (int)$_GET['page'];
                if($page <1)
                {
                    $page = 1;
                }
            }
            else
            {
                $page=1;
            }  
            $news->visitorView($page);
        }
        elseif ($_GET['action'] == 'schedule') /** Aller sur la page des articles du journal (mode visiteur) **/
        {
            if(isset($_GET['page']))
            {
                $page = (int)$_GET['page'];
                if($page <1)
                {
                    $page = 1;
                }
            }
            else
            {
                $page=1;
            }  
            $schedule->visitorView($page);
        }

        elseif ($_GET['action'] == 'login') /** Se connecter à la partie administrateur **/
        {
            $login->loginValid();
        }

        elseif ($_GET['action'] == 'logout') /** Se déconnecter de la partie administrateur **/
        {
            $login->logout();
        }

        elseif ($_GET['action'] == 'addComment')        /** Ajouter un commentaire sur une actualité **/
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (!empty($_POST['author']) && !empty($_POST['comment']))
                {
                    $comment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else
                {
                    echo 'Erreur: tout les champs ne sont pas remplis !';
                }
            }
            else
            {
                echo 'Erreur! aucun identifiant de chapitre envoyé';
            }
        }
        elseif ($_GET['action'] == 'signalComment') /** Signaler un commentaire **/
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $comment->reportComment($_GET['id'],$_GET['post']);
            }
        }
        elseif ($_GET['action'] == 'validComment') /** Valider un commentaire qui a été reporté **/
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $comment->validComment($_GET['id']);
                }
            } 
        elseif ($_GET['action'] == 'deleteComment')     /** Supprimer un commentaire sur une actualité **/
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $comment->deleteComment($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de commentaire envoyé ");
                }
            } 
        elseif ($_GET['action'] == 'adminNews') /** Afficher la page d'administration d'actualité **/
        {
            if(isset($_GET['page']))
            {
                $page = (int)$_GET['page'];
                if($page <1)
                {
                    $page = 1;
                }
            }
            else
            {
                $page=1;
            }  
            $news->adminNews($page);
        }
        elseif ($_GET['action'] == 'addNews') /** Ajouter une actualité **/
            {
                if (!empty($_POST))
                {
                    if (!empty($_POST['title']) && !empty($_POST['content']))
                    {
                        $news->addNews($_POST['title'], $_POST['content']);
                    }
                    else
                    {
                        echo 'Erreur: tout les champs ne sont pas remplis !';
                    }
                }
                else       /** Aller sur la page pour écrire une nouvelle actualité **/
                {
                    $news->writeNews();  
                }
            }
        elseif ($_GET['action'] == 'editNews') /** Editer une actualité **/
            {
                
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $news->editNews($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de chapitre envoyé");
                }
            } 
        elseif ($_GET['action'] == 'deleteNews') /** Supprimer une actualité **/
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $news->deleteNews($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de chapitre envoyé ");
                }
            }
        elseif ($_GET['action'] == 'adminSchedule') /** Afficher la page d'administration du journal **/
        {
            if(isset($_GET['page']))
            {
                $page = (int)$_GET['page'];
                if($page <1)
                {
                    $page = 1;
                }
            }
            else
            {
                $page=1;
            }  
            $schedule->adminSchedule($page);
        }
        elseif ($_GET['action'] == 'addSchedule') /** Ajouter un article du journal **/
            {
                if (!empty($_POST))
                {
                    if (!empty($_POST['title']) && !empty($_POST['content']))
                    {
                        $schedule->addSchedule($_POST['title'], $_POST['content']);
                    }
                    else
                    {
                        echo 'Erreur: tout les champs ne sont pas remplis !';
                    }
                }
                else       /** Aller sur la page pour écrire un nouvel article de journal **/
                {
                    $schedule->writeSchedule();  
                }
            }
            elseif ($_GET['action'] == 'editSchedule') /** Editer un article **/
            {
                
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $schedule->editSchedule($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de chapitre envoyé");
                }
            } 
            elseif ($_GET['action'] == 'deleteSchedule') /** Supprimer un article **/
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $schedule->deleteSchedule($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de chapitre envoyé ");
                }
            }
	}
	else
	{
		$news->main();
	}