<?php

use App\models\UserDAO;

?>

<main>
	<div class="mainNav">
		<i class="bi bi-arrow-right"></i> <a href="./?q=home">Accueil</a>
		<i class="bi bi-arrow-right"></i> <a href="./?q=gallery">Galerie</a>
		<i class="bi bi-arrow-right"></i> Photo No <?= self::$pictureInfos->getPictureID(); ?>:
	</div>


	<div class="content">
		<div class="images">
			<img src="<?= self::$pictureInfos->getPictureURL(); ?>"
			     alt="<?= self::$pictureInfos->getPictureWording(); ?>">
		</div>

		<div class="textContent">
			<div class="inlineRow">
				<img src="assets/img/avatar.jpg" width="32" alt="Avatar">
				<span class="bold ownerProfil">
					<a href="./user-<?= self::$userInfos->getUserID(); ?>"><?= self::$userInfos->getFirstName(); ?>&nbsp;<?= self::$userInfos->getLastName(); ?></a>
				</span>
				&nbsp;&nbsp;•&nbsp;&nbsp;
                <?php if (self::$UIDofUserLogged == self::$UID) { ?>
					<form method="post">
						<input type="submit" name="delete_picture" value="Supprimer la photo" class="submit">
					</form>
	            <?php } ?>
			</div>

			<hr class="separator">
            <?php if (self::$numberOfLikes == 1) { ?>
				<div class="number-of-likes"><?= self::$numberOfLikes ?> like</div>
            <?php } else if (self::$numberOfLikes >= 2) { ?>
				<div class="number-of-likes"><?= self::$numberOfLikes ?> likes</div>
            <?php } ?>

			<div class="comment">
				<div>
					<span class="bold ownerProfil"><?= self::$userInfos->getFirstName() . " " . self::$userInfos->getLastName(); ?></span>
                    <?= self::$pictureInfos->getPictureWording(); ?>

                    <?php if (isset($_POST["editCaption"]) == false && self::$UIDofUserLogged == self::$UID) { ?>
						<form method="post">
							<input type="submit" name="editCaption" value="Modifier la description" class="submit">
						</form>
                    <?php } else if (self::$UIDofUserLogged == self::$UID && isset($_POST["editCaption"]) == true) { ?>
						<form method="post">
							<input type="text" name="editedCaptionContent" value="<?= self::$pictureInfos->getPictureWording(); ?>" class="input">
							<input type="submit" name="saveEditedCaption" value="Sauvegarder" class="submit">
						</form>
                    <?php } ?>
				</div>

	            <?php if (self::$listOfComments != null) {
	                foreach (self::$listOfComments as $key => $val) {
	                    $Username = UserDAO::getUserByID($val["userID"]); ?>
						<p style="margin-top: 10px;">
							<span class="bold ownerProfil"><?= $val["commentID"] . " " . $Username->getFirstName() . " " . $Username->getLastName() ?></span>
	                        <?= $val["Comment"] ?>
						</p>
	                <?php }
	            } ?>
			</div>
		</div>

		<?php if (\App\models\UserAuth::getInstance()->userIsLoggedOn()) {?>
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
						<input type="text" name="comment" id="comment" placeholder="Envoyer un commentaire..." class="input">
						<button type="submit" name="submit_comment" class="input_icons"><i class="bi bi-chat-left-text"></i></button>
					</form>
				</div>
			</div>
		<?php } ?>
	</div>
</main>




