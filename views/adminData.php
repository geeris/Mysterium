<?php
    include_once("connection.php");

    $getMails = "SELECT f.userID AS userID, u.email AS email, u.username AS username, f.timestamp, f.title AS title, f.message AS message FROM feedback f INNER JOIN user u ON f.userID = u.userID ORDER BY timestamp DESC";
    $mails = $connection -> query($getMails) -> fetchAll();
?>

<div class="container-fluid backgroundDark nestanibgdark">
    <div class="container">
        <div class="row mysteriumContent pt-5 pb-5">
            <h2 class="mb-2 uppercase "> Mails </h2>
            <div class="col s12 backgroundDark m-0 p-0 d-flex flex-wrap justify-content-between">
            
            <?php foreach($mails as $mail): ?>
                <div class="data">
                    <div class="info d-flex justify-content-between">
                        <?php 
                            $timestamp = $mail -> timestamp;
                            $date = date("d-m-Y H:i", $timestamp);
                        ?>
                        <p> <?= $mail -> username ?> </p>
                        <p> at <?= $date ?>h </p>
                    </div>
                    <div class="info">
                        <p> <?= $mail -> email ?> </p>
                    </div>
                    <div class="bodybody">
                        <p class="mb-3">  <?= $mail -> title ?> </p>
                        <p class="messageMail"> <?= $mail -> message ?> </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>