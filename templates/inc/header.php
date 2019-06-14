<?php
use src\Controller\AuthController;

$tata = new AuthController();
$datas = $tata->connect();
extract($datas);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>MechaAvailability</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>
	<header>
		<figure>
			<img src="/assets/images/logo.png" alt="Logo du colectif de garagistes">
			<figcaption>Logo du collectif de garagistes</figcaption>
		</figure>
		<h1>MechaAvailability</h1>
		<div>
		<?php if (!empty($_SESSION['name'])) {
			echo "<p>Utilisateur : <strong>" . $_SESSION['name'] . '</strong></p>';
		} ?>
		<a href="/Deconnexion"><button type="button">Déconnexion</button></a>
		</div>
	</header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="/">Accueil</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07"
			aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExample07">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/services">Services</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdwn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connection</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/inscription">Inscription</a>
						<a class="dropdown-item" href="/sign-in">Sign-in</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/Pages_des_garagistes">garagiste</a>
				</li>
			</ul>
		</div>
	</div>
</nav>






