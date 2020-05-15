<?php

namespace Controller;

require_once('model/contactManager.php');

class contactController extends Controller
{
    public function visitorContact()
    {
        $contactManager = new \OpenClassrooms\projetopenclassroom\model\contactManager();

        $titlePage = "Nous contacter";

        return $this->renderTwig('view/contact.php',['titlePage' => $titlePage]);
    }

    public function addFormContact($first_name, $last_name, $email, $object_contact, $text_contact)
    {

        $contactManager = new \OpenClassrooms\projetopenclassroom\model\contactManager();

        $addform = $contactManager->newContact($first_name, $last_name, $email, $object_contact, $text_contact);

        if ($addform === false){
            die('Impossible de nous envoyer votre demande !');
        }
        else{
            $_SESSION['validForm'] = "Votre demande nous a bien été envoyé";
            header('Location: index.php?action=contact');
        }
    }

    public function adminContact()
    {
        $contactManager = new \OpenClassrooms\projetopenclassroom\model\contactManager();
        $contact = $contactManager->getContact();

        $titlePage = "Nous contacter";

        return $this->renderTwig('view/admin/backend/adminContact.php',['title' => $titlePage,'contacts' => $contact]);
    }

    public function deleteContact($id) /** Permet de supprimer un formulaire rempli de contact **/
    {
       $contactManager = new \OpenClassrooms\projetopenclassroom\model\contactManager();

       $deleteContact = $contactManager->deleteContact($id);
       if($deleteContact == FALSE){
           die('Impossible de supprimer le formulaire !');
       }
       else{
           header('Location:' .$_SERVER['HTTP_REFERER']);
       }
    }
}