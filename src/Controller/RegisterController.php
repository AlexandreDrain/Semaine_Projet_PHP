<?php
namespace src\Controller;

use src\Entity\User;
use src\Utilities\Database;
use src\Utilities\FormValidator;

class RegisterController
{
    /**
     * Vérification formulaire + inscription de l'utilisateur en BDD
     * @return array - Les données à envoyer à la vue
     * @throws \Exception
     */
    public function register(): array
    {
        $formValidator = new FormValidator();
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = $formValidator->validate([
                ['name', 'text', 128],
                ['lastName', 'text', 128],
                ['email', 'text', 128],
                ['password', 'text', 128],
                ['password-confirm', 'text', 128]
            ]);
            FormValidator::sanitizeRadio('role');
            // Vérification concordance mot de passe
            if($_POST['password'] !== $_POST['password-confirm']) {
                $errors['password'] = 'Les mots de passe ne correspondent pas';
            }

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
                // $database->connect(); appelé directement dans le constructeur
                // On crée un utilisateur en local
                $role = ($_POST['role']) ? 'garagiste' : 'client';
                $user = new User($_POST['name'], $_POST['lastName'], $_POST['email'], $_POST['password'], $role);
                $query = "INSERT INTO utilisateurs (name, last_name, email, password, role) VALUES (" .
                    $user->getStrParamsSQL() .
                    ")";
                try {
                    // On essaye d'insérer en BDD
                    $success = $database->exec($query);

                    if($success === 1 /*&& $_POST['role'] === true*/) {
                        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
                        header('Location: '.$url.'/sign-in');
                    }/*elseif ($success === 1 && $_POST['role'] === false){
                        session_start();
                        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
                        header('Location: '.$url.'/sign-in');
                    }*/

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
        return compact('errors', 'success', 'user', 'formValidator');

    }
}