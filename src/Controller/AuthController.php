<?php
namespace src\Controller;

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
		$formValidator = new FormValidator();
		$errors = [];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$errors = $formValidator->validate([
				['name', 'text', 128],
				['password', 'text', 128],
			]);

			$isError = false;
			foreach ($errors as $error) {
				if($error !== '') {
					$isError = true;
				}
			}

			if (!$isError) {
	        // Il n'y a pas d'erreur, on passe à l'inscription
				$database = new Database();

				$user = new User($_POST['name'], '', '', $_POST['password'], '');

				$sql = "SELECT * FROM utilisateurs WHERE name = '{$user->getName()}'";
				$users = $database->query($sql, User::class);

				if (empty($users)) {
					var_dump('notempty');	
					$errorMessageText = "Cet email n'existe pas";
				}  else {
					$userPassword = $users[0]->getPassword();

					if(password_verify($_POST['password'], $userPassword)) {

						$_SESSION['name'] = $users[0]->getName();
						$_SESSION['role'] = $users[0]->getRole();
						$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
                        header('Location: '.$url.'/');
					} else {
						
						$errorMessagePassword = "Mauvais mot de passe";
					}

				}
			}

		}
		return compact('errorMessageEmail', 'errorMessagePassword','formValidator', 'errors','user');
	}

}