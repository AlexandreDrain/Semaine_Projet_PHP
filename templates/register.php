<?php 
require 'inc/header.php';
use src\Controller\RegisterController;

$toto = new RegisterController();
extract($toto->register());
?>


<div class="container bg-grey">

  <?php if(isset($success) && $success === 1) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Utilisateur inscrit : Bonjour <?= (isset($user)) ? $user->getName() : '' ?>      
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php  endif; ?>

  <form method="post" class="needs-validation">
    <div>
      <div class="col col-md-4">
        <label for="name">Prénom</label>
        <input type="text"  class="form-control <?= (isset($errorMessageName) && !empty($errorMessageName)) ? 'is-invalid' : '' ?>" name="name" placeholder="First name" value="<?= $_POST['name']  ?? '' ?>"valited>
        <div class="invalid-feedback"><?= $errorMessageName ?? "" ?></div>
      </div>
      <div class="col col-md-4">
        <label for="lastName">Nom</label>
        <input type="text" class="form-control <?= (isset($errorMessageLastName) && !empty($errorMessageLastName)) ? 'is-invalid' : '' ?>" placeholder="Last name" name="lastName" value="<?= $_POST['lastName']  ?? '' ?>" valited>
        <div class="invalid-feedback"><?= $errorMessageLastName ?? "" ?></div>
      </div>
      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" class="form-control <?= (isset($errorMessageEmail) && !empty($errorMessageEmail)) ? 'is-invalid' : '' ?>" id="inputAddress2" name="email" placeholder="Email" value="<?= $_POST['email']  ?? '' ?>">
        <div class="invalid-feedback"><?= $errorMessageEmail ?? "" ?></div>
      </div>
      <div class="form-group col-md-6">
        <label for="password">Mot de passe :</label>
        <input type="password" class="form-control  <?= (isset($errorMessageMdp) && !empty($errorMessageMdp)) ? 'is-invalid' : '' ?>" id="inputPassword4" name="password" placeholder="Password" value="<?= $_POST['password']  ?? '' ?>">
      <div class="invalid-feedback"><?= $errorMessageMdp ?? "" ?></div>
      
        <div class="input-group mb-3 form-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <label for="role">Souhaitez-vous vous inscrire en tant que garagiste ?</label>
              <input type="checkbox" aria-label="Checkbox for following text input" id="role" name="role">
            </div>
          </div>
        </div>

      </div class="form-group col-md-2">
        <input type="submit" value="S'inscrire" class="btn btn-outline-success">
      </div>
</form>

</div>

<?php require "inc/footer.php"; ?>