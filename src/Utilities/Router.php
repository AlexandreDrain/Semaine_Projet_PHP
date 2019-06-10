<?php
namespace src\Utilities;

class Router
{
	/**
	 * @var string
	 */
	private $routes;

	/**
	 * Ajouter une route au routeur
	 * @param string $url 
	 * @param void $file
	 */
	public function addRoute(string $url, string $files): void
	{
		$this->routes[] = [
			'url' => $url, 
			'templates' => $files
		];
	}

	/**
	 * Vérifie l'URL et renvoie l'enventuel fichier à appeler
	 * @return string|null - Retourne l'éventuel template à appeler
	 */
	public function match(): ?string
	{
		$url = $_SERVER['REQUEST_URI'];
		// TODO : à enleer ASAP
		if(strlen($url) >= 10) {

			$url = substr($url, 10);	
		}

		// On boucle  dans les routes enregistrées
		foreach ($this->routes as $route) {
			// Si la route correspond a l'URL
			if($route['url'] == $url) {
				// On retourne le template à exécuter
				return $route['templates'];
			}
		}
		// Si aucune route n'a était trouvé, on retourne "null"
		return null;
	}
}