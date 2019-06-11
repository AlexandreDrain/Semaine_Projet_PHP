<?php
namespace src\Controller;

use src\Entity\User;
use src\Utilities\Database;
use src\Utilities\FormValidator;


class RegisterController
{
	
	public function register(): array
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$errorMessageName = FormValidator::checkPostText('name', 128);
			$errorMessageLastName = FormValidator::checkPostText('lastName', 128);
			$errorMessageEmail = FormValidator::checkPostText('email', 255);
			$errorMessagePassword = FormValidator::checkPostText('password', 128);
			$errorMessageCoche = FormValidator::sanitizeCheckCoche('role');
			$user = '';
			$success = '';

			if (empty($errorMessageName) &&
				empty($errorMessageLastName) &&
				empty($errorMessageEmail) &&
				empty($errorMessagePassword) &&
				empty($errorMessageCoche)
				) {
	        // Il n'y a pas d'erreur, on passe à l'inscription
					$database = new Database();
	        // $database->connect(); appelé directement dans le constructeur

	        // On crée un utilisateur en local
	        	// $role = ($_POST['role'] ? 'garagiste' ) TODO a finir .
				$user = new User($_POST['name'],$_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['role'] ?? '');

				$query = "INSERT INTO utilisateurs (name, last_name, email, password, role) VALUES (" .
				$user->getStrParamsSQL() .
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
	                        // Si on ne sait pas comment gérer, on provoque une exception
						throw new \Exception('PDOException dans RegisterController');
					}
				}



			}
		return compact('errorMessageName','errorMessageLastName','errorMessageEmail','errorMessagePassword', 'errorMessageCoche','success', 'user');

		}
		return [];
	}
}