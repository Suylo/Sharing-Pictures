<main>
	<div class="mainNav">
		<i class="bi bi-arrow-right"></i><a href="./?q=home"> Accueil</a> <i class="bi bi-arrow-right"></i> Galerie :
	</div>

	<div class="title">
		<h2 class="bold">Galerie de photos</h2>
	</div>

	<div class="listPictures" id="photos">
        <?php foreach (self::$listOfPictures as $key => $val) { ?>
			<a href="./pictures-p<?= $val->getPictureID() ?>-u<?= $val->getUserId(); ?>"><img
						src="<?= $val->getPictureURL() ?>" alt="<?= $val->getPictureWording() ?>"></a>
        <?php } ?>
	</div>
</main>

