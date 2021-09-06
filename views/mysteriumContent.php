<?php
    require_once "connection.php";

    if($connection)
    {
        try{

            $wantedNumberOfMysteries = 5;

            $query = "SELECT m.mysteryID AS mysteryID, m.title AS title, c.title AS category, m.timestamp AS timestamp, m.content AS content, image FROM mystery m INNER JOIN category c ON m.categoryID = c.categoryID ORDER BY timestamp";
            $result = $connection -> query($query) ->  fetchAll();

            $query5 = "SELECT m.mysteryID AS mysteryID, m.title AS title, c.title AS category, m.timestamp AS timestamp, m.content AS content, image FROM mystery m INNER JOIN category c ON m.categoryID = c.categoryID ORDER BY timestamp LIMIT $wantedNumberOfMysteries OFFSET 0";
            $result5 = $connection -> query($query5) ->  fetchAll();

            $numberOfRows = $connection -> query($query) -> rowCount();
            
            $pages = ceil($numberOfRows / $wantedNumberOfMysteries);
            //var_dump($pages);
            

            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
                $offset = ($page-1) * $wantedNumberOfMysteries;
 
                //var_dump($offset);

                $query = 
                "SELECT m.mysteryID AS mysteryID, m.title AS title, c.title AS category, m.timestamp AS timestamp, m.content AS content, image FROM mystery m INNER JOIN category c ON m.categoryID = c.categoryID ORDER BY timestamp LIMIT $wantedNumberOfMysteries OFFSET $offset";
                $result5 = $connection -> query($query) -> fetchAll();
            }
            else{
            
            }
            //header("refresh: 5; url=title.php");
        }
        catch(PDOException $ex){
            echo $ex;
        }
    }

    /*LEFT CONTENT*/

    $getTop3Mysteries = "SELECT COUNT(m.title) AS number, m.mysteryID AS mystery, m.title AS title, m.image AS image FROM usermystery um INNER JOIN mystery m ON um.mysteryID = m.mysteryID WHERE interesting = 1 GROUP BY title ORDER BY number DESC LIMIT 3";
    $top3Mysteries = $connection -> query($getTop3Mysteries) -> fetchAll();

    $getTopOne = "SELECT title, categoryID FROM category";
    $topOne = $connection -> query($getTopOne) -> fetchAll();
?>

<div class="container-fluid backgroundDark nestanibgdark">
    <div class="container">
        <div class="row mysteriumContent pt-5">
            <div class="col l5 s12 backgroundDark m-0 p-0 mb-5">
                <h2 class="uppercase mb-4"> Top mysteries </h2>
                <?php if($top3Mysteries): ?>
                    <?php foreach($top3Mysteries as $one): ?>
                        <?php
                            $mystery = $one -> mystery;

                            $numberInt = "SELECT COUNT(*) as interesting FROM usermystery WHERE mysteryID = $mystery AND interesting = 1";
                            $numberIntResult = $connection -> query($numberInt) -> fetch();
                        ?>
                        
                        <div class="row miniContent">
                            <a href="<?= $_SERVER["PHP_SELF"] . "?view=mysterium&content=category&mystery=" . $one -> title ?>"> 
                            <h3 class="pt-3 mb-0 uppercase highlight"> <?= $one -> title ?> </h3> 
                            
                            </a>

                            <div class="d-flex justify-content-around">
                                <p class="pstyle highlight uppercase"> Interesting <span class="likeCol"> <?php if($numberIntResult -> interesting != 0)  echo $numberIntResult -> interesting ?> </span> </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                        <p class="infoNoMys"> There are no records of user's feedback for any mystery yet </p>
                    <?php endif; ?>

                <?php foreach($topOne as $topM): ?>
                    <h2 class="mb-4 mt-5 uppercase"> Top of <?= $topM -> title ?> </h2>
                    <?php 
                        $currentMystery = $topM -> categoryID;
                        
                        $getMysteryTop = "SELECT COUNT(m.title) AS number, m.mysteryID AS mystery, m.title AS title FROM usermystery um INNER JOIN mystery m ON um.mysteryID = m.mysteryID  WHERE interesting = 1 AND m.categoryID = $currentMystery GROUP BY title ORDER BY number DESC LIMIT 2";
                        $mysteryTop = $connection -> query($getMysteryTop) -> fetchAll();
                    ?>
                    
                    <?php if($mysteryTop): ?>
                        <?php foreach($mysteryTop as $top): ?>
                        <div class="row miniContent">
                            <a href="<?= $_SERVER["PHP_SELF"] . "?view=mysterium&content=category&mystery=" . $top -> title ?>"> 
                            <h3 class="pt-3 uppercase highlight"> <?= $top -> title ?> </h3>
                            </a>
                            <div class="d-flex justify-content-around">
                                <p class="pstyle highlight uppercase"> Interesting <span class="likeCol"> <?php if($numberIntResult -> interesting != 0)  echo $numberIntResult -> interesting ?> </span> </p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p class="infoNoMys"> There are no records of user's feedback for mysteries from this category yet </p>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
            <div class="col l7 s12 m-0 p-0">
                <?php foreach($result5 as $mystery):?>
                    <div class="mystery" data-id="<?= $mystery -> mysteryID ?>">
                        <div class="imageMystery">
                        <img src="assets/images/lockedDoors/<?= $mystery -> image ?>" alt ="<?= $mystery -> title ?>" />
                        <span class="categoryMark"> <?= $mystery -> category ?> </span>
                        </div>
                        <h3 class="highlight uppercase"> <?= $mystery -> title ?>   </h3>
                        <p> <?= $mystery -> content ?> </p>

                        <?php
                            $mysteryID = $mystery -> mysteryID;
                            //settype($mysteryID, "integer");
                            $numberInt = "SELECT COUNT(*) as interesting FROM usermystery WHERE mysteryID = $mysteryID AND interesting = 1";
                            $numberIntResult = $connection -> query($numberInt) -> fetch();
                            
                            $numberBor = "SELECT COUNT(*) as boring FROM usermystery WHERE mysteryID = $mysteryID AND interesting = 0";
                            $numberBorResult = $connection -> query($numberBor) -> fetch();

                            $currentUserID = $_SESSION['loggedUser'] -> userID;
                            $previouslyChosen = "SELECT interesting FROM usermystery WHERE mysteryID = $mysteryID AND userID = $currentUserID";
                            $getPreviouslyChosen = $connection -> query($previouslyChosen) -> fetch();
                            if(!$getPreviouslyChosen){
                                $here = null;
                            }
                            else
                            {
                                $here = $getPreviouslyChosen -> interesting;
                            }
                        ?>
                        <div class="d-flex justify-content-around">
                            <?php if(isset($here) && $here == 1): ?>
                                    <a href="#" class="intBor highlight uppercase backgroundClick" data-like="1"> Interesting <span class="likeCol"> <?php if($numberIntResult -> interesting != 0)  echo $numberIntResult -> interesting ?> </span> </a>
                                <?php else: ?>
                                    <a href="#" class="intBor highlight uppercase" data-like="1"> Interesting <span class="likeCol"> <?php if($numberIntResult -> interesting != 0)  echo $numberIntResult -> interesting ?> </span> </a>
                            <?php endif; ?>
                            <?php if(isset($here) && $here == 0): ?>
                                    <a href="#" class="intBor highlight uppercase backgroundClick" data-like="0"> Boring <span class="likeCol"> <?php if($numberBorResult -> boring != 0)  echo $numberBorResult -> boring ?> </span> </a>
                                <?php else: ?>
                                    <a href="#" class="intBor highlight uppercase" data-like="0"> Boring <span class="likeCol"> <?php if($numberBorResult -> boring != 0)  echo $numberBorResult -> boring ?> </span> </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="d-flex justify-content-center">
                    <?php for($i=0; $i<$pages; $i++): ?>
                        <?php 
                            $class = false;
                            $a = $i+1;
                            if(isset($_GET['page']))
                            {   
                                $current = $_GET['page'];
                                if($current == $a)
                                {
                                    $class = true;
                                }
                            }
                            if(!isset($_GET['page']) && $a == 1)
                            {
                                $class = 2;
                            }
                        ?>
                        <?php if($class): ?>
                                <a class="page pageCol" href="<?= $_SERVER["PHP_SELF"] . "?view=mysterium&page=" . ($i + 1) ?>"> <?= $i+1 ?> </a>
                            <?php elseif($class == 2): ?>
                                <a class="page pageCol" href="<?= $_SERVER["PHP_SELF"] . "?view=mysterium&page=" . ($i + 1) ?>"> <?= $i+1 ?> </a>
                            <?php else: ?>
                                <a class="page" href="<?= $_SERVER["PHP_SELF"] . "?view=mysterium&page=" . ($i + 1) ?>"> <?= $i+1 ?> </a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</div>