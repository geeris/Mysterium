<?php 
    $query = "SELECT title, icon FROM category";
    $result = $connection -> query($query);

    if($result -> rowCount() > 0)
        $result = $result -> fetchAll();

    $query2 = "SELECT m.title AS title, c.title AS category, m.timestamp AS timestamp, m.content AS content FROM mystery m INNER JOIN category c ON m.categoryID = c.categoryID";
    $result2 = $connection -> query($query2) -> fetchAll();
?>

<div class="container-fluid backgroundDark pb-5 pt-5">
    <div class="container pt-3">
         
                <?php 
                    foreach($result as $category):     
                ?>
        <div class="row centerCols">
                <div class="col-md-5 col-xs-12 categoriesContent">
                    <img src="assets/images/icons/<?= $category -> icon ?>" class="icons" />
                </div>
                <div class=" col-md-7 col-xs-12 categoriesContent">
                    <h2 class="uppercase highlight"> <?= $category -> title ?> </h2>
                    <ol class="keepMysteriesList"> 
                        <?php foreach($result2 as $mystery): ?>
                        <?php if ($category -> title == $mystery -> category): ?>
                            <li>    <a href="<?= $_SERVER["PHP_SELF"] . "?view=mysterium&content=category&mystery=" . $mystery -> title ?>">  <?= $mystery -> title ?>    </a>  </li>
                        <?php endif; ?>
                        <?php  endforeach; ?>
                    </ol>
                </div>
        </div>
                <?php endforeach; ?>
            
    </div>
</div>