<?php
use src\Controller\GaragistePageController;
require 'inc/header.php';

$controller = new GaragistePageController();
$datas = $controller->garPage();
extract($datas);
?>

<?php 
if (isset($_SESSION['role']) && $_SESSION['role'] === 'garagiste') {

	echo $formValidator->generateInputText('image_name', 'text','Nom de votre image',$errors);
	echo $formValidator->generateInputText('service_name', 'text','Nom de votre service',$errors); 
	echo $formValidator->generateInputText('description-service','text','Descritpion du service',$errors);
	echo $formValidator->generateInputText('etat_publication','checkbox','Voulez-vous publier ce service ?',$errors);
	echo "<input type='submit' value=\"S'inscrire\" class='btn btn-outline-success' style='margin-bottom: 10px; margin-left: 10px;'>";
} else {
	
?>
	<div class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Vous n'êtes pas garagiste</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Veuillez vous connecter ou vous inscrire.</p>
				</div>
			</div>
		</div>
	</div>

	<?php
	$jsSup = '<script src="/assets/js/modal-redirect.js"></script>';
	?>
	
</script>


<?php
}
?> 



<?php require 'inc/footer.php'; ?>