<?php 
require 'inc/header.php';
use src\Controller\RegisterController;
?>


<div class="container bg-light">

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
        <input type="text"  class="form-control <?= (isset($errorMessageUsername) && !empty($errorMessageUsername)) ? 'is-invalid' : '' ?>" name="name" placeholder="First name" value="<?= $_POST['name']  ?? '' ?>" valited>
        <div class="invalid-feedback"><?= $errorMessageUsername ?? "" ?></div>
      </div>
      <div class="col col-md-4">
        <label for="lastName">Nom</label>
        <input type="text" class="form-control <?= (isset($errorMessageUsername) && !empty($errorMessageUsername)) ? 'is-invalid' : '' ?>" placeholder="Last name" name="lastName" value="<?= $_POST['lasName']  ?? '' ?>" valited>
        <div class="invalid-feedback"><?= $errorMessageUsername ?? "" ?></div>
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
      </div>
       <input type="submit" value="S'inscrire" class="btn btn-outline-success">
    </div>
  </form>

</div>


<?php require "inc/footer.php"; ?>
