<main>
	<div class="mainNav">
		<i class="bi bi-arrow-right"></i> Accueil
	</div>

	<div class="title">
		<h1 class="bold">Bienvenue sur Sharing-Pictures</h1>
		<p>
			Sur ce site, il est possible de <span class="bold">partager vos photos</span>,
			<span class="bold">télécharger des photos</span>,
			<span class="bold">créer des groupes afin de partager des photos spécifiques</span>, et
			<span class="bold">aimer/commenter les photos de vos proches !</span>
		</p>

	</div>

    <?php

    use App\models\UserAuth;

    if (UserAuth::getInstance()->userIsLoggedOn()) {
        echo '<br><h1>Vous êtes connecté !</h1>';
    } else {
        echo '<br><h1>Vous n\'êtes pas connecté</h1>';

    }
    ?>

	<!--<a href="<?php //UserAuth::getInstance()->userLogout();?>">Deconnexion</a>-->

</main>


