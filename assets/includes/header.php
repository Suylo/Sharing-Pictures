<?php
use App\models\UserAuth;
?>
<header>
    <div class="titleHead">
        <h1>Sharing-Pictures</h1>
    </div>
    <div class="searchHead">
        <form method="get" action="?q=search">
            <input type="search" name="query" id="search" placeholder="Rechercher...">
	        <button type="submit" name="q" value="search" class="input_icons"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <nav>
        <ul id="menu">
	        <?php

            if (UserAuth::getInstance()->userIsLoggedOn()) {
                include 'app/controllers/header.php';?>

	            <li><a href="./user-<?= $userID ?>"><i class="bi bi-person"></i>Bienvenue <span class="bold"><?= $firstname ?></span></a></li>
	            <li><a href="./logout" class="userLogout">Se déconnecter</a></li>
	        <?php } else { ?>
	            <li><a href="./login"><i class="bi bi-person"></i> Connexion</a></li>
	            <li><a href="./register"><i class="bi bi-person-plus-fill"></i> Inscription</a></li>
	        <?php } ?>
        </ul>
    </nav>
</header>

<aside id="leftNavBar">
	<ul id="leftMenu">
		<?php if (UserAuth::getInstance()->userIsLoggedOn()) { ?>


			<li><a href="./home"><i class="bi bi-house-door"></i> Accueil</a></li>
			<li><a href="./gallery"><i class="bi bi-images"></i> Galerie</a></li>

			<li><a href="./user-<?= $userID ?>#my-pictures"><i class="bi bi-file-image"></i> Mes Photos</a></li>
			<li><a href="./groups"><i class="bi bi-collection"></i> Groupes</a></li>
			<li><a href="./settings"><i class="bi bi-gear"></i> Paramètres</a></li>
		<?php } else { ?>
			<li><a href="./home"><i class="bi bi-house-door"></i> Accueil</a></li>
			<li><a href="./gallery"><i class="bi bi-images"></i> Galerie</a></li>
		<?php } ?>
	</ul>
</aside>