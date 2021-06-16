<?php

use App\models\UserAuth;
use App\models\UserDAO;

?>

<main>
    <div class="mainNav">
        <i class="bi bi-arrow-right"></i> <a href="./home">Accueil</a>
        <i class="bi bi-arrow-right"></i> <a href="./gallery">Galerie</a>
        <i class="bi bi-arrow-right"></i> Photo No <?= self::$pictureInfos->getPictureID(); ?>:
    </div>


    <div class="content">
        <div class="images">
            <img src="<?= self::$pictureInfos->getPictureURL(); ?>"
                 alt="<?= self::$pictureInfos->getPictureWording(); ?>">
        </div>

        <div class="textContent">
            <div class="inlineRow">
                <img src="img/profile/avatar.jpg" width="32" alt="Avatar">
                <span class="bold ownerProfil">
					<a href="./user-<?= self::$userInfos->getUserID(); ?>"><?= self::$userInfos->getFirstName(); ?>&nbsp;<?= self::$userInfos->getLastName(); ?></a>
				</span>
                &nbsp;&nbsp;•&nbsp;&nbsp;
                <?php if (self::$UIDofUserLogged == self::$UID) { ?>
                    <form method="post">
                        <button type="submit" name="delete_picture" class="input_icons" title="Supprimer la photo"><i
                                    class="bi bi-x-circle"></i></button>
                    </form>
                <?php } ?>
            </div>

            <hr class="separator">
            <?php if (self::$numberOfLikes == 1) { ?>
                <div class="number-of-likes italic"><?= self::$numberOfLikes ?> like</div>
            <?php } else if (self::$numberOfLikes >= 2) { ?>
                <div class="number-of-likes italic"><?= self::$numberOfLikes ?> likes</div>
            <?php } ?>

            <div class="comment">
                <div>
                    <span class="bold ownerProfil"><?= self::$userInfos->getFirstName() . " " . self::$userInfos->getLastName(); ?></span>
                    <?= self::$pictureInfos->getPictureWording(); ?>

                    <?php if (isset($_POST["editCaption"]) == false && self::$UIDofUserLogged == self::$UID) { ?>
                        <form method="post">
                            <button type="submit" name="editCaption" class="input_icons"
                                    title="Modifier la description"><i class="bi bi-pencil"></i></button>
                        </form>
                    <?php } else if (self::$UIDofUserLogged == self::$UID && isset($_POST["editCaption"]) == true) { ?>
                        <form method="post">
                            <input type="text" name="editedCaptionContent"
                                   value="<?= self::$pictureInfos->getPictureWording(); ?>" class="input">
                            <button type="submit" name="saveEditedCaption" class="input_icons" title="Sauvegarder"><i
                                        class="bi bi-save"></i></button>
                        </form>
                    <?php } ?>
                </div>

                <?php if (self::$listOfComments != null) {
                    foreach (self::$listOfComments as $key => $val) {
                        $Username = UserDAO::getUserByID($val["userID"]); ?>
                        <?php if ($Username->getUserEmail() == UserAuth::getMailLoggedOn()) { ?>
                            <p style="margin-top: 10px;">
                            <div style="display: flex; align-items: center">
                                <div>
                                    <span class="bold ownerProfil"><?= $Username->getFirstName() . " " . $Username->getLastName() ?></span>
                                    <?= $val["Comment"] ?>
                                </div>
                                <form method="post">
                                    <button type="submit" name="delete_comment" title="Supprimer ce commentaire"
                                            class="input_icons" value="<?= $val["commentID"] ?>"><i class="bi bi-x"></i>
                                    </button>
                                </form>
                            </div>
                            </p>
                        <?php } else { ?>
                            <p style="margin-top: 10px;">
                                <span class="bold ownerProfil"><?= $Username->getFirstName() . " " . $Username->getLastName() ?></span>
                                <?= $val["Comment"] ?>
                            </p>
                        <?php } ?>
                    <?php }
                } ?>
            </div>
        </div>

        <?php if (UserAuth::userIsLoggedOn()) { ?>
            <div class="send">
                <div class="fav">
                    <?php if (self::$favPicture == 1) { ?>
                        <a href=".?q=fav&idP=<?= self::$pictureInfos->getPictureID() . "&idUC=" . self::$UIDofUserLogged . "&idU=" . self::$pictureInfos->getUserID() ?>&like=no">
                            <i class="bi bi-heart-fill" style="color: #f85f5f; font-size: 35px;"></i>
                        </a>
                    <?php } else if (self::$favPicture == null) { ?>
                        <a href=".?q=fav&idP=<?= self::$pictureInfos->getPictureID() . "&idUC=" . self::$UIDofUserLogged . "&idU=" . self::$pictureInfos->getUserID() ?>&like=yes">
                            <i class="bi bi-heart" style="color: black; font-size: 35px;"></i>
                        </a>
                    <?php } ?>
                </div>
                <div class="comment_send">
                    <form method="post">
                        <input type="text" name="comment" id="comment" placeholder="Envoyer un commentaire..."
                               class="input">
                        <button type="submit" name="submit_comment" class="input_icons"><i
                                    class="bi bi-chat-left-text"></i></button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</main>




