<?php 
use src\Controller\ServiceController;

$controller = new ServiceController();
$datas = $controller->service();
extract($datas);

require 'inc/header.php';
?>

<aside class="container">
    <h1 class="mt-2">Présentation des Services</h1>
    <section class="row">
        <?php foreach ($services as $service) : ?>
            <div class="col-4">
                <div class="card">
                    <img src="/images/uploads/<?= $service->getImageName(); ?>" class="card-img-top"
                         alt="Image de <?= $service->getImageName() ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $service->getServiceName(); ?></h5>
                        <p class="card-text"><?= $service->getDescriptionService(); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</aside>


<?php require "inc/footer.php"; ?>