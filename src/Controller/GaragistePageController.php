<?php 

namespace src\Controller;

use src\Entity\Service;
use src\Utilities\Database;
use src\Utilities\FormValidator;

class GaragistePageController
{
	public function garPage(): array
	{
		$formValidator = new FormValidator();
		$errors = [];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$errors = $formValidator->validate([
				['image_name', 'text', 128],
				['service_name', 'text', 128],
				['desc_service', 'text', 128],
			]);
            // On vérifie s'il y a une erreur
			$isError = false;
			foreach ($errors as $error) {
				if($error !== '') {
					$isError = true;
				}
			}

			if (!$isError) {
                // Il n'y a pas d'erreur, on passe à l'inscription
				$database = new Database();
                // On crée un utilisateur en local
				$service = new Service($_POST['image_name'], $_POST['service_name'], $_POST['description_service'],$_POST['etat_publication']);
				$query = "INSERT INTO services (image_name, service_name, description_service, etat_publication) VALUES (" .
				$service->getStrParamsSQL() .
				")";

				try {
                    // On essaye d'insérer en BDD
					$success = $database->exec($query);
				} catch(\PDOException $e) {
                    // Une exception PDO est arrivée, on récupère son code
					$code = $e->getCode();
                    // Le code 23000 = email unique
					if ($code === '23000') {
                        // On affiche un message d'erreur
						$errorMessageEmail = 'Email déjà utilisé';
					} else {
						var_dump($e);
                        // Si on ne sait pas comment gérer, on provoque une exception
						throw new \Exception('PDOException dans RegisterController');
					}
				}
			}
		}
		return compact('errors', 'success', 'service', 'formValidator');

	}
	
}