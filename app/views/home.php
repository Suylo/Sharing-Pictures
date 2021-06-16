<?php

use App\models\UserAuth;

?>
<main>
    <div class="mainNav">
        <i class="bi bi-arrow-right"></i> Accueil
    </div>

    <div class="title">
        <?php if (UserAuth::userIsLoggedOn()) { ?>
            <h1>Bienvenue <span class="bold"><?= $firstName . " " . $lastName ?></span></h1>
            <p>
                <i class="bi bi-arrow-right-circle-fill"></i> Les 5 dernières photos que vous avez ajouté :
            </p>
            <?php if ($lastFivePictures == null) { ?>
                <p>
                    &gt; Vous n'avez encore posté aucune photo(s).
                </p>
            <?php } else { ?>
                <div class="listPictures" id="photos">
                    <?php foreach ($lastFivePictures as $key => $val) { ?>
                        <a href="./pictures-p<?= $val->getPictureID() ?>-u<?= $val->getUserId(); ?>"><img
                                    src="<?= $val->getPictureURL(); ?>" alt=""></a>
                    <?php } ?>
                </div>
            <?php } ?>

        <?php } else { ?>
            <h1>Bienvenue et bonne visite sur S-P !</h1>
            <p>
                Sur ce site, il est possible de <span class="bold">partager vos photos</span>,
                <span class="bold">(bientôt) télécharger des photos</span>,
                <span class="bold">et aimer/commenter des photos !</span>
            </p>
            <p>
                Afin de pouvoir accéder à la totalité du site, vous devez vous inscrire.
            </p>
        <?php } ?>
        <br>
        <br>
        <p>
            <i class="bi bi-plus-circle-fill"></i> Liste des photos qui ont été ajoutées aujourd'hui :
        </p>
        <div class="listPictures" id="photos">
            <?php foreach ($picturesAddedRecently as $key => $val) { ?>
                <a href="./pictures-p<?= $val->getPictureID() ?>-u<?= $val->getUserId(); ?>"><img
                            src="<?= $val->getPictureURL(); ?>" alt=""></a>
            <?php } ?>
        </div>
    </div>
</main>


