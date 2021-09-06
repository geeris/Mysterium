<?php
    require_once "../connection.php";
    session_start();

if(isset($_POST['btnRate']))
{
    if(isset($_SESSION["loggedUser"]) && isset($_POST['range']) && isset($_POST['surveyID']))
    {
    $user = $_SESSION["loggedUser"] -> userID;    

    $answer = $_POST['range'];
    $survey = $_POST['surveyID'];

    $query = "SELECT answerID FROM survayanswer WHERE answer = $answer AND surveyID = $survey";
    $result = $connection -> query($query) -> fetch();
    $result = $result -> answerID;
    settype($result, "integer");

    echo $user;
    $query = "INSERT INTO usersurvayanswer VALUES (:user, :survey, :answer)";
    $prepareQuery = $connection -> prepare($query);

    $prepareQuery -> bindParam(":user", $user);
    $prepareQuery -> bindParam(":survey", $survey);
    $prepareQuery -> bindParam(":answer", $answer);

    try
    {
        $prepareQuery -> execute();

        if($prepareQuery)
        {
            $_SESSION['thankyou'] = "Thank you! Your vote has been recorded successfully.";
                $previous = getEnv("http_referer");
                header("Location: $previous");
        }
    }
    catch(pdoexception $ex){

    }
    }
    else{
        session_destroy();
        header("Location: ../index.php");
    }
}
else{
    session_destroy();
    header("Location:../index.php");
}
?>