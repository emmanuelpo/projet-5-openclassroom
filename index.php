<?php

    require 'vendor/autoload.php';

    $login = new Controller\adminController();
    $comment = new Controller\commentController();
    $news = new Controller\newsController();
    $schedule = new Controller\scheduleController();

	session_start();

	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'post')
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
        if($_GET['action'] == 'schedulePost')
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
        elseif ($_GET['action'] == 'schedule') /** Aller sur la page des news (mode visiteur) **/
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

        elseif ($_GET['action'] == 'login')
        {
            $login->loginValid();
        }

        elseif ($_GET['action'] == 'logout')
        {
            $login->logout();
        }

        elseif ($_GET['action'] == 'addComment')        /** Ajouter un commentaire sur un chapitre **/
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
        elseif ($_GET['action'] == 'signalComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $comment->reportComment($_GET['id'],$_GET['post']);
            }
        }
        elseif ($_GET['action'] == 'validComment')
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
        elseif ($_GET['action'] == 'adminNews')
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
        elseif ($_GET['action'] == 'addNews') /** Ajouter un chapitre **/
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
                else       /** Aller sur la page pour écrire un nouveau chapitre **/
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
        elseif ($_GET['action'] == 'deleteNews')
            {
                /** Supprimer une actualité **/
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $news->deleteNews($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de chapitre envoyé ");
                }
            }
        elseif ($_GET['action'] == 'adminSchedule')
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
        elseif ($_GET['action'] == 'addSchedule') /** Ajouter un chapitre **/
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
            elseif ($_GET['action'] == 'editSchedule') /** Editer une actualité **/
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
            elseif ($_GET['action'] == 'deleteSchedule')
            {
                /** Supprimer une actualité **/
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $schedule->deleteSchedule($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de chapitre envoyé ");
                }
            }
        
        /** elseif (isset($_SESSION["active"]))
        {
            if ($_GET['action'] == 'logout')
            {
                $login->logout();
            }
            elseif ($_GET['action'] == 'listChapter')       /** Récupérer la liste des chapitres sur la page 
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
                $chap->listChapter($page);
            }
          
        }
        else
        {
            header('Location: index.php'); /** Renvoie à la première page du site **/
        //} 
	}
	else
	{
		$news->main();
	}