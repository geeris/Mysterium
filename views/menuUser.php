<?php 
    require_once "connection.php";
    $role = $_SESSION['loggedUser'] -> role;
    $query = "SELECT m.href AS href, m.name AS name, m.icon AS icon, mt.title AS title FROM menu m INNER JOIN menutype mt ON m.menuTypeID = mt.menuTypeID WHERE mt.title = '$role'";

    $result = $connection -> query($query) -> fetchAll();
?>

<nav class="primarColor stayHere">
    <div class="nav-wrapper container">
        <a href="#!" class="brand-logo uppercase"><h1>Mysterium</h1></a>
        <ul id="addBecomeFixed">
            <?php foreach($result as $link): ?>
            <li class="menuUser"><a href="<?= $link -> href ?>"> <i class="material-icons left"> <?= $link -> icon ?> </i> <span class="disappear"> <?= $link -> name ?> </span> </a></li>
            <!-- <li class="menuUser"><a href="index.php?view=mysterium&content=category"><i class="material-icons left">storage</i> <span class="disappear"> Categories </span> </a></li> -->
            <?php endforeach; ?>
            <li class="menuUser"><a href="logic/logout.php"><i class="material-icons left">power_settings_new</i> <span class="disappear"> Logout </span> </a></li>
        </ul>
    </div>
</nav>