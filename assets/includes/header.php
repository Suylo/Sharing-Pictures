<?php
use App\models\UserAuth;
use App\models\UserDAO;
?>
<header>
    <div class="titleHead">
        <h1>Sharing-Pictures</h1>
    </div>
    <div class="searchHead">
        <label>
            <input type="search" name="search" id="search" placeholder="Rechercher...">
            <a href="#" title="Clique ici pour rechercher!"><i class="bi bi-search"></i></a>
        </label>
    </div>
    <nav>
        <ul id="menu">
	        <?php

            if (UserAuth::getInstance()->userIsLoggedOn()) {
                include 'app/controllers/header.php';?>

	            <li><a href="?q=profile&UID=<?= $userID ?>"><i class="bi bi-person"></i>Bienvenue <span class="bold"><?= $firstname ?></span></a></li>
	            <li><a href="?q=logout" class="userLogout">Se déconnecter</a></li>
	        <?php } else { ?>
	            <li><a href="?q=login"><i class="bi bi-person"></i> Connexion</a></li>
	            <li><a href="?q=register"><i class="bi bi-person-plus-fill"></i> Inscription</a></li>
	        <?php } ?>
        </ul>
    </nav>
</header>

<aside id="leftNavBar">
	<ul id="leftMenu">
		<?php if (UserAuth::getInstance()->userIsLoggedOn()) { ?>


			<li><a href="?q=home"><i class="bi bi-house-door"></i> Accueil</a></li>
			<li><a href="?q=gallery"><i class="bi bi-images"></i> Galerie</a></li>

			<li><a href="?q=profile&UID=<?= $userID ?>#my-pictures"><i class="bi bi-file-image"></i> Mes Photos</a></li>
			<li><a href="?q=my-groups"><i class="bi bi-collection"></i> Mes Groupes</a></li>
			<li><a href="?q=settings"><i class="bi bi-gear"></i> Paramètres</a></li>
		<?php } else { ?>
			<li><a href="?q=home"><i class="bi bi-house-door"></i> Accueil</a></li>
			<li><a href="?q=gallery"><i class="bi bi-images"></i> Galerie</a></li>
		<?php } ?>
	</ul>
</aside>