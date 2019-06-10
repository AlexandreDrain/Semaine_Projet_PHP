<?php
namespace src\Controller;

use src\Entity\Garagiste;
use src\Utilities\Database;

class IndexController
{
	/**
	 * Liste les différents produits de la table produit.
	 */
	public function index()
	{
		// Connexion à la BDD
		$database = new Database();
		// $database->connect(); appelé directement dans le constructeur

		// Requête SQL
		$query = "SELECT * FROM produit WHERE etat_publication = 1";
		// Exécution de la requête SQL et récupération des produits
		$products = $database->query($query, Garagiste::class);
	
		return compact('products');
	}
}