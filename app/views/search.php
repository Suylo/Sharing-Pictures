<main>

    <div class="title">
        <h2>List des photos contenant le mot : "<?= self::$query ?>"</h2>
        <?php if (empty(self::$listOfPicturesByDesc)){ ?>
        <p>&gt; Aucune photo(s) ne contient cette description, veuillez réessayer. Toutes les photos ont donc été
            affichées.</p>
        <div class="listPictures" id="photos">
            <?php foreach (self::$listOfAllPictures as $key => $val) { ?>
                <a href="./pictures-p<?= $val->getPictureID() ?>-u<?= $val->getUserId(); ?>"><img
                            src="<?= $val->getPictureURL(); ?>" alt="<?= $val->getPictureWording(); ?>"></a>
            <?php } ?>
        </div>
    </div>
    <?php } else { ?>
        <div class="listPictures" id="photos">
            <?php foreach (self::$listOfPicturesByDesc as $key => $val) { ?>
                <a href="./pictures-p<?= $val->getPictureID() ?>-u<?= $val->getUserId(); ?>"><img
                            src="<?= $val->getPictureURL(); ?>" alt="<?= $val->getPictureWording(); ?>"></a>
            <?php } ?>
        </div>
    <?php } ?>
</main>