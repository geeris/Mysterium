<?php
    $titleOfMystery = $_GET['mystery'];
    $query = "SELECT * FROM mystery WHERE title =" . "'$titleOfMystery'";
    $mystery = $connection -> query($query);
    $mystery = $mystery -> fetch();
?>

<div class="container-fluid backgroundDark">
    <div class="container">
        <div class="row pt-5">
            
            <div class="col s12 m-0 p-0 mysteriumContent">
                
                <div class="mystery mysteryPreview" data-id="<?= $mystery -> mysteryID ?>">
                    <img src="assets/images/lockedDoors/<?= $mystery -> image ?>" alt ="<?= $mystery -> title ?>" />
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
                            <a href="#" class="intBor highlight uppercase backgroundClick" data-like="1"> Interesting <span> <?php if($numberIntResult -> interesting != 0)  echo $numberIntResult -> interesting ?> </span> </a>
                            <?php else: ?>
                                <a href="#" class="intBor highlight uppercase" data-like="1"> Interesting <span> <?php if($numberIntResult -> interesting != 0)  echo $numberIntResult -> interesting ?> </span> </a>
                        <?php endif; ?>
                        <?php if(isset($here) && $here == 0): ?>
                            <a href="#" class="intBor highlight uppercase backgroundClick" data-like="0"> Boring <span> <?php if($numberBorResult -> boring != 0)  echo $numberBorResult -> boring ?> </span> </a>
                            <?php else: ?>
                                <a href="#" class="intBor highlight uppercase" data-like="0"> Boring <span> <?php if($numberBorResult -> boring != 0)  echo $numberBorResult -> boring ?> </span> </a>
                        <?php endif; ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>