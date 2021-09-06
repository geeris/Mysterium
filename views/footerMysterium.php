<?php
    require_once "connection.php";
    
    $userLogged = $_SESSION['loggedUser'] -> userID;
    settype($userLogged, "integer");

    $query2 = "SELECT * FROM usersurvayanswer WHERE userID = $userLogged";
    $result2 = $connection -> query($query2);

    /*VOTED ANSWER*/
    $querynew = "SELECT answerID FROM usersurvayanswer WHERE userID=$userLogged AND surveyID=1";
    $resultnew = $connection -> query($querynew) -> fetch();  

    /*VOTED AWERAGE*/
    $avg = "SELECT ROUND(AVG(answerID), 1) AS avgRate FROM usersurvayanswer";
    $averageRate = $connection -> query($avg) -> fetch();

    /* ANALYTIC ANSWERS*/
    $getTotalUserNumber = "SELECT COUNT(*) AS total FROM usersurvayanswer";
    $totalUserNumber = $connection -> query($getTotalUserNumber) -> fetch();
    $totalUserNumber = $totalUserNumber -> total;
    settype($totalUserNumber, "integer");

    $arrayOfStat = array();
    for($i = 1; $i<=10; $i++)
    {
        $dynamic = "SELECT COUNT(userID)/$totalUserNumber AS oneStat FROM usersurvayanswer WHERE answerID=$i";
        $oneStat = $connection -> query($dynamic) -> fetch() -> oneStat*100;
        settype($oneStat, "float");

        array_push($arrayOfStat, $oneStat);
    }
    $i=1;
?>
        <div class="footer-copyright">
            <div class="container">
                <div class="row d-flex align-items-center mb-2">
                    <div class="col-md-6 col-sm-12 center pb-4">
                        <h3 class="uppercase highlight"> Give us your feedback </h3>
                        <form class="col s12 footerForm"> 
                            <div class="row">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="title" name="title" type="text" value="<?= previewAndUnsetSession('userTitle'); ?>" placeholder="Title">
                                        <span> <?= previewAndUnsetSessionArrayWithContent('title') ?> </span>
                                    </div>
                                </div>
                                <div class="input-field col s12 feedback">
                                    <textarea id="textarea2" name="textarea2" class="materialize-textarea" placeholder="Message" data-length="200"><?= previewAndUnsetSession('userMessage'); ?></textarea>
                                    <span> <?= previewAndUnsetSessionArrayWithContent('message') ?> </span>
                                </div>
                                <div class="input-field col s12 m-0 p-0">
                                    <!-- <input class="btn waves-effect waves-light p-0 mb-3" value="Klikni" type="submit" id="btnFeedback" name="btnFeedback" /> -->
                                    <input class="btn waves-effect waves-light p-0 mb-3" value="Send" type="button" id="btnFeedback" name="btnFeedback">
                                    <span id="resultMessage"> <?= previewAndUnsetSessionArrayWithContent('sentMessage') ?> </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-12 center">
                        <?php if($result2 -> rowCount() == 1): ?>
                            <?php if(isset($_SESSION['thankyou'])): ?>
                                 <script>window.onload = function(){M.toast({html: "<?= $_SESSION['thankyou'] ?>", displayLength: 5000, classes:'moja'})}</script>
                            <?php unset($_SESSION['thankyou']) ?>
                            <?php endif; ?>

                            <h3> Survey statistic </h3>
                            <p> <span> You voted : </span> <?= $resultnew -> answerID; ?> </p>
                            <p class="mb-4"> <span> Average rate : </span> <?= $averageRate -> avgRate; ?>% </p>
                            <p> See how others have voted(in percentage) : </p>
                            <div class="statisticVote">
                                <?php $j=0; ?>
                                <?php foreach($arrayOfStat as $one):?>
                                    <span class="oneStat">  </span>

                                <?php if($j == 0): ?>
                                    <div class="keepNumbers" id="keepNumbers">
                                    </div>
                                <?php endif; ?>
                                    <script> document.getElementById("keepNumbers").innerHTML += `<span class="number"> <?= $i++ ?> </span>`; </script>
                                    <script> document.getElementsByClassName("oneStat")[<?= $j++ ?>].setAttribute("style", "height:<?= $one ?>%;"); </script>
                                <?php endforeach; ?>
                            </div>

                        <?php else: ?>
                        <?php 
                            $getsurvey = "SELECT * from survay";
                            $survey = $connection -> query($getsurvey) -> fetch();
                        ?>
                        <h3 class="uppercase highlight"> Rate us </h3>
                        <p class="mt-3"> <?= $survey -> title ?> </p>
                        <div class="rate">
                            <form action="logic/rate.php" method="post" class="footerForm">
                                <input type="hidden" name="surveyID" value="<?= $survey -> surveyID ?>" />
                                <p class="range-field mb-0">
                                    <input type="range" name="range" id="test5" min="1" max="10" />
                                    <div class="greatBad">
                                    <span> Bad </span>
                                    <span> Great </span>
                                    </div>
                                </p>
                                <div class="input-field col s12 m-0 p-0">
                                    <input class="btn waves-effect waves-light p-0 mb-3" value="RATE" type="submit" name="btnRate"/>
                                </div>
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>