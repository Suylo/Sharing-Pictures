<main>
	<div class="mainNav">
		<i class="bi bi-arrow-right"></i> <a href="./?q=home"> Accueil</a> <i class="bi bi-arrow-right"></i> Paramètres
		de
        <?= self::$userInfos->getFirstName() . " " . self::$userInfos->getLastName(); ?>:
	</div>


	<div class="settings">
		<div class="images">
			<img src="assets/img/avatar.jpg" width="148" alt="Avatar" class="border-round-img">
		</div>
        <?php if (isset($_POST["edit"]) == false) { ?>
			<div class="text">
				<p>
					<span class="gray italic">Prénom</span> <?= self::$userInfos->getFirstName(); ?>
				</p>
				<p>
					<span class="gray italic">Nom</span> <?= self::$userInfos->getLastName(); ?>
				</p>
				<p>
					<span class="gray italic">Courriel</span> <?= self::$userInfos->getUserEmail() ?>
				</p>
				<p>
					<span class="gray italic">Adresse</span> <?= self::$userInfos->getAddress() ?>
				</p>
				<p>
					<span class="gray italic">Code Postal</span> <?= self::$userInfos->getPostalCode() ?>
				</p>
				<p>
					<span class="gray italic">Date d'anniversaire</span> <?= self::$userInfos->getBirthDate() ?>
				</p>
				<p>
					<span class="gray italic">Date création du compte </span> <?= self::$userInfos->getCreationDate() ?>
				</p>
				<form method="post">
					<input type="submit" name="edit" value="Modifier" class="submit">
				</form>
			</div>
        <?php } else { ?>
			<div class="modif">
				<form method="post">
					<p>
						<span class="gray italic">Prénom</span>
						<input type="text" name="firstName-edit" value="<?= self::$userInfos->getFirstName(); ?>" class="input">
					</p>
					<p>
						<span class="gray italic">Nom</span>
						<input type="text" name="lastName-edit" value="<?= self::$userInfos->getLastName(); ?>" class="input">
					</p>
					<p>
						<span class="gray italic">Courriel</span> <?= self::$userInfos->getUserEmail() ?>
					</p>
					<p>
						<span class="gray italic">Adresse</span>
						<input type="text" name="Address-edit" value="<?= self::$userInfos->getAddress() ?>" class="input">
					</p>
					<p>
						<span class="gray italic">Code Postal</span>
						<input type="text" name="postalCode-edit" value="<?= self::$userInfos->getPostalCode() ?>" class="input">
					</p>
					<p>
						<span class="gray italic">Date d'anniversaire</span>
						<input type="text" name="userBirthdate-edit" value="<?= self::$userInfos->getBirthDate() ?>" class="input">
					</p>
					<input type="submit" name="save" value="Sauvegarder" class="submit">
				</form>
			</div>
        <?php } ?>
		<div class="options">
			<h1 class="danger"><i class="bi bi-exclamation-triangle"></i> Option dangereuse</h1>
			<p>
				Afin de confirmer la suppresion de votre compte, veuillez entrer l'email de votre compte
			</p>
			<form method="post">
				<input type="text" name="confirmation" placeholder="<?= self::$userInfos->getUserEmail() ?>" class="input">
				<input type="submit" name="submitDelete" value="Supprimer votre compte" class="submit">
			</form>
			<?= self::$msg ?>
		</div>
	</div>

</main>
