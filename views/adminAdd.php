<?php 
    include_once("connection.php");

    $getCategories = "SELECT * FROM category";
    $categories = $connection -> query($getCategories) -> fetchAll();
?>

<div class="container-fluid backgroundDark nestanibgdark">
    <div class="container">
        <div class="row mysteriumContent pt-5">
            <div class="col s12">
                <h2 class="uppercase mb-3"> Add category </h2>
                <form class="col s12 mb-5" enctype="multipart/form-data" method="post" action="logic/addCategory.php" onSubmit="return checkCategory();">
                    <!-- <input type="file" name="file" id="file" /> -->
                    <div class="row">
                        <div class="input-field col l6 s12">
                        <input placeholder="Category name" id="categoryName" name="categoryName" type="text" value="<?= previewAndUnsetSession('catNa'); ?>" />
                        <span> <?= previewAndUnsetSessionArrayWithContent('category'); ?> <?= previewAndUnsetSessionArrayWithContent('message'); ?>
                                <?= previewAndUnsetSession('success'); ?> 
                        </span>
                    </div>
                    <div class="input-field col l6 s12 keepFile">
                        <div class="file-field input-field">
                            <div class="btn btnAdd">
                                <span>File</span>
                                <input type="file" name="file">
                            </div>
                            <div class="file-path-wrapper fileName">
                                <input class="file-path" type="text" id="fileName" name="fileName" />
                            </div>
                                <span class="file"> <?= previewAndUnsetSessionArrayWithContent('file'); ?> </span>
                        </div>
                    </div>
                    <div class="input-field col s12 m-0 p-0">
                        <input class="btn btnAddMC waves-effect ml-2 waves-light p-0 mb-3" value="Add" type="submit" id="btnAddCategory" name="btnAddCategory" />
                    </div>
                </form>
            </div>
        </div>
        <div class="row mysteriumContent pt-5 pb-5">
            <div class="col s12">
                <h2 class="uppercase mb-3"> Add mystery </h2>
                <form class="col s12" enctype="multipart/form-data" method="post" action="logic/addMystery.php" onSubmit="return checkMystery();">
                    <div class="row">
                        <div class="input-field col l6 s12">
                            <input placeholder="Mystery name" value="<?= previewAndUnsetSession('   '); ?>" id="mysteryName" name="mysteryName" type="text" />
                            <span> <?= previewAndUnsetSessionArrayWithContent('mystery'); ?> <?= previewAndUnsetSessionArrayWithContent('messageMystery'); ?> </span>
                        </div>
                        <div class="input-field col l6 s12">
                            <select id="selectCategory" name="selectCategory">
                                <option value="0" disabled selected>Choose category</option>
                                <?php foreach($categories as $category): ?>
                                    <?php if(isset($_SESSION['chCat'])): ?>
                                        <?php if($category -> categoryID == $_SESSION['chCat']): ?>
                                            <option selected value="<?= $category -> categoryID ?>"> <?= $category -> title ?> </option>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <option value="<?= $category -> categoryID ?>"> <?= $category -> title ?> </option>
                                        
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php unset($_SESSION['chCat']) ?>
                            </select>
                            <span id="sel"> <?= previewAndUnsetSessionArrayWithContent('cat'); ?> </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 keepFile">
                            <div class="file-field input-field">
                                <div class="btn btnAdd">
                                    <span>File</span>
                                    <input type="file" name="fileMys">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path" id="fileCat" type="text">
                                </div>
                                <span id="filem">  <?= previewAndUnsetSessionArrayWithContent('fileMys'); ?>  </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 keepTextarea">
                            <textarea id="textarea2" name="textarea" class="materialize-textarea" placeholder="Enter mystery" data-length="60585"></textarea>
                            <span> <?= previewAndUnsetSession('successMys'); ?> <?= previewAndUnsetSessionArrayWithContent('texta'); ?> </span>
                        </div>
                        
                    </div>
                    <div class="input-field col s12 m-0 p-0">
                        <input class="btn btnAddMC waves-effect waves-light p-0 mb-3" value="Add" type="submit" id="btnAddMystery" name="btnAddMystery" />
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

