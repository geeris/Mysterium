<?php
    include_once("connection.php");

    $getMysteries = "SELECT m.title AS title, m.mysteryID AS id, c.title AS category, m.image AS image FROM mystery m INNER JOIN category c ON m.categoryID = c.categoryID";
    $mysteries = $connection -> query($getMysteries) -> fetchAll();

    $getCategories = "SELECT * FROM category";
    $categories = $connection -> query($getCategories) -> fetchAll();
?>

<div class="container-fluid backgroundDark nestanibgdark">
    <div class="container">
        <div class="row mysteriumContent pt-5 pb-5">
            <h2 class="uppercase mb-4"> Delete categories </h2>
        <?php foreach($categories as $category): ?>
            <div class="col l3 deleteBlockResponsive categoryForDelete backgroundDark m-0 p-0">
                <a class="delete dc updateTop" href="logic/delete.php" data-cid = "<?= $category -> categoryID ?>"> <i class="material-icons lala">close</i> </a>
                <h3 class="highlight uppercase valign-wrapper"> <?= $category -> title ?> </h3>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row mysteriumContent pb-5">
            <h2 class="uppercase mb-4"> Delete mysteries </h2>
        <?php foreach($mysteries as $mystery): ?>
            <div class="col l3 deleteBlockResponsive mysteryForDelete backgroundDark m-0 p-0">
                <div class="imageMystery mysteryDelete">
                    <img src="assets/images/lockedDoors/<?= $mystery -> image ?>" alt ="<?= $mystery -> title ?>" />
                    <span class="categoryMark"> <?= $mystery -> category ?> </span>
                    <a class="delete dm" href="logic/delete.php" data-mid = "<?= $mystery -> id ?>"> <i class="material-icons lala">close</i> </a>
                </div>
                <h3 class="highlight uppercase valign-wrapper"> <?= $mystery -> title ?> </h3>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
                