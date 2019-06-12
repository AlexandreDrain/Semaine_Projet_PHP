<?php 
require 'inc/header.php';

use src\Entity\User;
use src\Utilities\FormValidator;
use src\Controller\RegisterController;




session_start();

$mdp_exist = "SELECT * FROM utilisateurs WHERE password";

if (isset($_POST['login']) && isset($_POST['pwd'])) {

$_SESSION['myLoginName'] = $_POST['name'];
$_SESSION['myLoginName'] = $_POST['password']; 

echo 'Bienvenue ' . $_SESSION['myLoginName'];

?>








<?php require 'inc/footer.php'; ?>
