<?php
namespace src\Controller;

session_start();

use src\Entity\User;
use src\Utilities\Database;
use src\Utilities\FormValidator;


class AuthController
{
	
	/**
	 * Vérifiants les identifiants et connect l'utilisateur
	 * @return  array
	 */
	public function connect(): array
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			$errorMessageEmail = FormValidator::checkPostText('email', 255);
			$errorMessagePassword = FormValidator::checkPostText('password', 128);
			$user = '';
			$success = '';

			if (empty($errorMessageEmail) &&
				empty($errorMessagePassword)
				) {
	        // Il n'y a pas d'erreur, on passe à l'inscription
					$database = new Database();
	        // $database->connect(); appelé directement dans le constructeur

	        // On crée un utilisateur en local
				$user = new User($_POST[''], $_POST['email'], $_POST['password']);

				$sql = 'SELECT * FROM utilisateur WHERE email = ($user->getEmail())'

				$user = $database->query($sql, User::class);
				if (empty($users)) {

				}else {
					$userPassword = $user[0]->getPassword();
				}

			}
		}
		return [];
	}
	
}