<?php

use App\models\UserAuth;

?>
<main>
	<div class="mainNav">
		<i class="bi bi-arrow-right"></i> <a href="./?q=home"> Accueil</a> <i class="bi bi-arrow-right"></i> Profil de
        <?= self::$userInfos->getFirstName() . " " . self::$userInfos->getLastName(); ?>:
	</div>


	<div class="profile">
		<div class="images">
			<img src="assets/img/avatar.jpg" width="148" alt="Avatar" class="border-round-img">
		</div>
		<div class="text">
			<p>
				<span class="gray italic">Prénom</span> <?= self::$userInfos->getFirstName(); ?>
			</p>
			<p>
				<span class="gray italic">Nom</span> <?= self::$userInfos->getLastName(); ?>
			</p>
			<p>
				<span class="gray italic">Adresse</span> <?= self::$userInfos->getAddress() ?>
			</p>
			<p>
				<span class="gray italic">Date création du compte </span> <?= self::$userInfos->getCreationDate() ?>
			</p>
		</div>
        <?php if (self::$userInfos->getUserEmail() == UserAuth::getInstance()->getMailLoggedOn()) { ?>
			<div class="upload">
				<form action="./?q=profile&UID=<?= self::$userInfos->getUserID() ?>" method="POST"
				      enctype="multipart/form-data">
					<input type="file" name="picture" id="picture">
					<input type="text" name="pictureWording" id="pictureWording" placeholder="Description de la photo">
					<input type="submit" name="submit" value="Envoyer">
				</form>
                <?= $message ?>
			</div>
        <?php } ?>
	</div>
	<div id="my-pictures"></div>

	<h3><i class="bi bi-card-image"></i>
        <?php if (self::$userInfos->getUserEmail() == UserAuth::getInstance()->getMailLoggedOn()) {
            echo "Liste de mes photos :";
        } else {
            echo "Liste des photos de " . self::$userInfos->getFirstName() . " :";
        } ?>
	</h3>
	<div class="listPictures" id="photos">

        <?php foreach (self::$userPictures as $key => $val) { ?>
			<a href="?q=detail&idP=<?= $val->getPictureID() ?>&idU=<?= $val->getUserId(); ?>"><img
						src="<?= $val->getPictureURL(); ?>" alt="<?= $val->getPictureWording(); ?>"></a>
        <?php } ?>
	</div>

	<h3><i class="bi bi-heart"></i>
        <?php if (self::$userInfos->getUserEmail() == UserAuth::getInstance()->getMailLoggedOn()) {
            echo "Liste des photos que j'ai aimés : ";
        } else {
            echo "Liste des photos aimés par " . self::$userInfos->getFirstName() . " :";
        } ?>
	</h3>
	<div class="listPictures" id="favPhotos">
        <?php foreach (self::$userFavoritePictures as $key => $val) { ?>
			<a href="?q=detail&idP=<?= $val->getPictureID() ?>&idU=<?= $val->getUserId(); ?>"><img
						src="<?= $val->getPictureURL(); ?>" alt="<?= $val->getPictureWording(); ?>"></a>
        <?php } ?>
	</div>
</main>
