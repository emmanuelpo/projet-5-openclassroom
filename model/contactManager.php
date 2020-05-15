<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Manager.php");

class contactManager extends Manager
{
    public function getContact()		/**Récupération des formulaires de contact remplis dans la table contact de la base de données **/
	{
		$db = $this->dbConnect();
		$contacts = $db->prepare('SELECT id, first_name, last_name, email, object_contact, text_contact, DATE_FORMAT(date_contact, \'%d/%m/%Y à %Hh%imin\') AS date_contact_fr FROM p5_contact ORDER BY date_contact DESC');
		$contacts->execute();

		return $contacts;
	}

    public function newContact($first_name, $last_name, $email, $object_contact, $text_contact)	/** Préparation à l'insertion d'un formulaire de contact dans la base de données **/
	{
		$db = $this->dbConnect();
        $contacts = $db->prepare('INSERT INTO p5_contact(first_name, last_name, email, object_contact, text_contact, date_contact) VALUES (?, ?, ?, ?, ?, NOW())');
		$req = $contacts->execute(array($first_name, $last_name, $email, $object_contact, $text_contact));

		return $req;
    }
    
    public function deleteContact($id) /** Préparation de la suppression d'un formulaire de contact dans la table p5_contact **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM p5_contact WHERE id = ?');
		$req->execute(array($id));

		return $req;

	}
}