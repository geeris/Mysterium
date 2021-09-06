<?php 
    require_once "connection.php";
    $query = $query = "SELECT m.href AS href, m.icon AS icon, mt.title AS title, m.social AS isSocial FROM menu m INNER JOIN menutype mt ON m.menuTypeID = mt.menuTypeID WHERE mt.title = 'footer'";

    $result = $connection -> query($query) -> fetchAll();
?>
    
    <footer class="page-footer p-0">
        <?php 
        if(isset($_GET['view']) && ($_GET['view'] != 'register') && isset($_SESSION['loggedUser']) && ($_SESSION['loggedUser'] -> role != "administrator"))
            include_once("views/footerMysterium.php");
        ?>
        <div class="footerDark">
            <div class="container">
                <div class="row">
                    <div class="col m6 s12 footerLine m-0">
                        Copyright &copy; Gabrijela Matović 2020
                    </div>
                    <div class="col m6 s12 footerLine">
                        
                        <?php foreach($result as $link): ?>
                            <?php if($link -> isSocial == 0 && $link -> href != '#modalAuthor'): ?>
                        <a target="_blank" class="grey-text text-lighten-4 mr-2" href="<?= $link -> href ?>"> <i class=" <?= $link -> icon ?> social"></i> </a>
                            
                            <?php endif; ?>
                            <?php if($link -> href == '#modalAuthor'): ?>
                        <a class="grey-text modal-trigger text-lighten-4 mr-2"  href="<?= $link -> href ?>"> <i class=" <?= $link -> icon ?> social"></i> </a>
                            <?php endif; ?>
                        
                        <!-- <a class="grey-text text-lighten-4" href="#!"><i class="fas fa-code social"></i></a> -->
                            
                        <?php endforeach; ?>

                        <span class="mr-3 ml-3 slash"> &#124; </span>

                        <?php foreach($result as $link): ?>
                            <?php if($link -> isSocial == 1): ?>    
                        <a class="grey-text text-lighten-3 mr-3" target="_blank" href="<?= $link -> href ?>"><i class=" <?= $link -> icon ?> social"></i></a>
                        <!-- <a class="grey-text text-lighten-3 mr-3" href="#!"><i class="fab fa-facebook-square social"></i></a>
                        <a class="grey-text text-lighten-3" href="#!"><i class="fab fa-instagram social"></i></a> -->
                            <?php endif;?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- /* MODAL AUTHOR */ -->
    <div id="modalAuthor" class="modal">
        <div class="modal-content row">
            <h4 class="center highlight mb-4 uppercase">Author</h4>
           <div class="col s12 center">
                <img src="assets/images/author.jpg" class="imageAuthor" alt="Author" />
                <h5 class="highlight uppercase"> Gabrijela Matovic 21/18 </h5>
                <div class="d-flex justify-content-center align-items-center">
                    <i class="material-icons emailIcon">email</i>
                    <p class="small">  geeris77@gmail.com</p>   
                </div>
            </div>
        </div>
    </div>
    
  </div>
    </footer>

    
    
    <!-- <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="assets/js/main.min.js"></script>
</body>
</html>