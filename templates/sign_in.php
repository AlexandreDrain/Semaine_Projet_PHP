<?php require 'inc/header.php';

use src\Controller\AuthController;
$controller = new AuthController();
$datas = $controller->connect();
extract($datas);
?>

<form method="post">
<?= $formValidator->generateInputText('name', 'text','Nom d\'utilisateur',$errors) ?>
<?= $formValidator->generateInputText('password', 'password','Mot de passe',$errors) ?>
<input type="submit" value="Se connecter" class="btn btn-outline-success">
</form>

<?php require 'inc/footer.php'; ?>