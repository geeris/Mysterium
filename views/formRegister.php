<div class="container-fluid p-0 pr">
    <img src = "assets/images/slika1.jpg" alt = "Header image" class ="imageSize" />
    <div class="changeImageOnSmall"></div>
    <div class="row m-0 pa">
        <div class="col s12 p-0 logIn">
            <form action ="logic/registerUser.php" method ="post">
            <div class="input-field col s12 pl-0">
                <input id="username" type="text" name="username" placeholder="Username" value="<?php previewAndUnsetSession('username')?>" />
            </div>
            <div class="input-field col s12 mt-0 pl-0">
                <input id="email" type="text" name="email" placeholder="E-mail" value="<?php previewAndUnsetSession('email')?>" />
            </div>
            <div class="input-field col s12 mt-0 pl-0">
                <input id="password" type="password" name="password" placeholder="Password" value="<?php previewAndUnsetSession('password')?>" />
            </div>
            <div class="input-field col s12 mt-0 pl-0">
                <input id="confirm" type="password" name="confirm" placeholder="Confirm password" value="<?php previewAndUnsetSession('confirm')?>" />
                <span> <?= previewAndUnsetSessionArrayWithContent('errorReg'); ?> </span>
                <span> <?= previewAndUnsetSession('successRegister'); ?> </span>
            </div>
            <div class="input-field col s12 m-0 p-0">
                <input class="btn waves-effect waves-light p-0 mb-3" value="REGISTER" type="submit" name="btnRegister"/>
            </div>
            </form>
            <p class="notAMember"> Already have an account? <a href="index.php"> <u> Login here </u> </a> </p>
        </div>
    </div>
</div>