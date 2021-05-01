<main>

    <div class="title">
	    <h2>List des photos contenant le mot : "<?= self::$query ?>"</h2>
        <?php if (empty(self::$listOfPicturesByDesc)){ ?>
	    <p>&gt; Aucune photos ne contient cette description, veuillez réessayer. Toutes les photos ont donc été affichés.</p>
	    <div class="listPictures" id="photos">
            <?php foreach (self::$listOfAllPictures as $key => $val) { ?>
			    <a href="?q=detail&idP=<?= $val->getPictureID() ?>&idU=<?= $val->getUserId(); ?>"><img src="<?= $val->getPictureURL(); ?>" alt="<?= $val->getPictureWording(); ?>"></a>
            <?php }?>
	    </div>
    </div>
        <?php } else { ?>
			<div class="listPictures" id="photos">
				<?php foreach (self::$listOfPicturesByDesc as $key => $val) { ?>
					<a href="?q=detail&idP=<?= $val->getPictureID() ?>&idU=<?= $val->getUserId(); ?>"><img src="<?= $val->getPictureURL(); ?>" alt="<?= $val->getPictureWording(); ?>"></a>
            <?php } ?>
			</div>
        <?php } ?>
</main>