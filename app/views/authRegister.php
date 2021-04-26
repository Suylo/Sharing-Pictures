<main>
	<div class="mainNav">
		<i class="bi bi-arrow-right"></i> Inscription :
	</div>

	<div class="title">
		<h2 class="bold">INSCRIPTION SUR SHARING-PICTURES</h2>
		<form action="./?q=register" method="POST">
			<input type="text" name="firstName" id="reg_Name" placeholder="Prénom"> <br>
			<input type="text" name="lastName" id="reg_Name" placeholder="Nom"> <br>
			<input type="text" name="userEmail" placeholder="Email"><br>
			<input type="password" name="userPassword" placeholder="Mot de passe"><br>
			<input type="submit"/>
		</form>
        <?= $message ?>
	</div>
</main>
