<?php

use App\models\UserAuth;

?>
<main>
    <div class="mainNav">
        <i class="bi bi-arrow-right"></i> <a href="./home"> Accueil</a> <i class="bi bi-arrow-right"></i> Profil de
        <?= self::$userInfos->getFirstName() . " " . self::$userInfos->getLastName(); ?>:
    </div>


    <div class="profile">
        <div class="images">
            <img src="img/profile/avatar.jpg" width="148" alt="Avatar" class="border-round-img">
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
        <?php if (self::$userInfos->getUserEmail() == UserAuth::getMailLoggedOn()) { ?>
            <div class="upload">
                <form action="./user-<?= self::$userInfos->getUserID() ?>" method="POST"
                      enctype="multipart/form-data">
                    <input type="file" name="picture" id="picture" class="submit">
                    <input type="text" name="pictureWording" id="pictureWording" placeholder="Description de la photo"
                           class="input">
                    <input type="submit" name="submit" value="Envoyer" class="submit">
                </form>
                <?= $msg ?>
            </div>
        <?php } ?>
    </div>
    <div id="my-pictures"></div>

    <h3><i class="bi bi-card-image"></i>
        <?php if (self::$userInfos->getUserEmail() == UserAuth::getMailLoggedOn()) {
            echo "Liste de mes photos :";
        } else {
            echo "Liste des photos de " . self::$userInfos->getFirstName() . " :";
        } ?>
    </h3>
    <div class="listPictures" id="photos">
        <?php foreach (self::$userPictures as $key => $val) { ?>
            <a href="./pictures-p<?= $val->getPictureID() ?>-u<?= $val->getUserId(); ?>"><img
                        src="<?= $val->getPictureURL(); ?>" alt="<?= $val->getPictureWording(); ?>"></a>
        <?php } ?>
    </div>

    <h3>
        <i class="bi bi-heart"></i>
        <?php if (self::$userInfos->getUserEmail() == UserAuth::getMailLoggedOn()) {
            echo "Liste des photos que j'ai aimés : ";
        } else {
            echo "Liste des photos aimés par " . self::$userInfos->getFirstName() . " :";
        } ?>
    </h3>
    <div class="listPictures" id="favPhotos">
        <?php foreach (self::$userFavoritePictures as $key => $val) { ?>
            <a href="./pictures-p<?= $val->getPictureID() ?>-u<?= $val->getUserId(); ?>"><img
                        src="<?= $val->getPictureURL(); ?>" alt="<?= $val->getPictureWording(); ?>"></a>
        <?php } ?>
    </div>
</main>
