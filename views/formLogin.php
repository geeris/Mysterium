<div class="container-fluid p-0 pr">
    <img src = "assets/images/slika1.jpg" alt = "Header image" class ="imageSize" />
    <div class="changeImageOnSmall"></div>
    <div class="row m-0 pa">
        <div class="col s12 p-0 logIn">
            <form method="post" action="logic/loginUser.php" onSubmit="return checkLogin();">
            <div class="input-field col s12 pl-0">
                <input id="username" type="text" name="username" placeholder="Username" value="<?php previewAndUnsetSession('username')?>" />
                <span>
                    <?= previewAndUnsetSessionArrayWithContent('errorUsername'); ?>
                </span>
            </div>
            <div class="input-field col s12 mt-0 pl-0">
                <input id="password" type="password" name="password" placeholder="Password" value="<?php previewAndUnsetSession('password')?>" /> 
                <span> 
                    <?= previewAndUnsetSessionArrayWithContent('errorPassword'); ?>
                    <?= previewAndUnsetSessionArrayWithContent('errorLogin');
                        if(isset($_SESSION['errorLogin']))
                        echo $_SESSION['errorLogin'];
                     ?>
                </span>
            </div>
            <div class="input-field col s12 m-0 p-0">
                <input class="btn waves-effect waves-light p-0 mb-3" type="submit" value="Login" name="btnLogin">  
            </div>
            </form>
            <p class="notAMember"> Not a member? <a href="index.php?view=register"> <u> Sign up here</u> </a> </p>
        </div>
    </div>
</div>