<?php
namespace src\Controller;

use src\Entity\Service;
use src\Utilities\Database;

class ServiceController
{
	/**
	 * Liste les différents services de la table services.
	 */
	public function service()
	{
		// Connexion à la BDD
		$database = new Database();
		// $database->connect(); appelé directement dans le constructeur

		// Requête SQL
		$query = "SELECT * FROM services WHERE etat_publication = 1";
		// Exécution de la requête SQL et récupération des services
		$services = $database->query($query, service::class);
	
		return compact('services');
	}
}