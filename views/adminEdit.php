<?php 
    include_once("connection.php");

    $getCategories = "SELECT * FROM category";
    $categories = $connection -> query($getCategories) -> fetchAll();

    $getTitles = "SELECT * FROM mystery";
    $titles = $connection -> query($getTitles) -> fetchAll();
?>

<div class="container-fluid backgroundDark nestanibgdark">
    <div class="container">
        <div class="row mysteriumContent pt-5">
            <div class="col s12">
                <h2 class="uppercase mb-2"> Edit category </h2>
                <p> Choose category you want to change from dropdown menu and just fill fields you want to change </p>
                <form class="col s12 mb-5"  enctype="multipart/form-data" action="logic/editCategory.php" method="post" onSubmit="return checkEditC();">
                    <div class="row">
                        <div class="input-field col s12 mb-3">
                            <select id="editc" name="editc">
                                <option value="0" disabled selected>Choose category to change</option>
                                <?php foreach($categories as $category): ?>
                                    <option value="<?= $category -> categoryID ?>"> <?= $category -> title ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <span>  </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l6 s12">
                        <input placeholder="New category name" id="first_name" name="categoryName" type="text">
                        <span> <?= previewAndUnsetSessionArrayWithContent('categorye'); ?>
                                <?= previewAndUnsetSession('category'); ?>  </span>
                    </div>
                    <div class="input-field col l6 s12 keepFile">
                        <div class="file-field input-field">
                            <div class="btn btnAdd">
                                <span>New file</span>
                                <input type="file" name="fileEdit">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path" type="text">
                                <span> <?= previewAndUnsetSessionArrayWithContent('filece'); ?>
                                <?= previewAndUnsetSession('filec'); ?>  </span>
                            </div>
                        </div>
                    </div>
                    <div class="input-field col s12 m-0 p-0">
                        <!-- <input class="btn waves-effect waves-light p-0 mb-3" value="Klikni" type="submit" id="btnFeedback" name="btnFeedback" /> -->
                        <input class="btn btnAddMC waves-effect ml-2 waves-light p-0 mb-3" value="Edit" type="submit" id="btnEditc" name="btnEditc" />
                    </div>
                </form>
            </div>
        </div>
        <div class="row mysteriumContent pt-5 pb-5">
            <div class="col s12">
                <h2 class="uppercase mb-2"> Edit mystery </h2>
                <p> Choose mystery you want to change from dropdown menu and just fill fields you want to change </p>
                <form class="col s12" enctype="multipart/form-data" action="logic/editMystery.php" method="post" onSubmit="return checkEditM();">
                    <div class="row">
                        <div class="input-field col s12">
                            <select id="editm" name="editm">
                                <option value="0" disabled selected>Choose mystery to change</option>
                                <?php foreach($titles as $title): ?>
                                    <option value="<?= $title -> mysteryID ?>"> <?= $title -> title ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l6 s12">
                            <input placeholder="New mystery name" id="first_name" name="mysteryName" type="text">
                            <span> <?= previewAndUnsetSessionArrayWithContent('mysterye'); ?>
                                <?= previewAndUnsetSession('mystery'); ?> </span>
                        </div>
                        <div class="input-field col l6 s12">
                            <select id="mysSelect" name="mysSelect">
                                <option value="0" disabled selected>Choose new category</option>
                                <?php foreach($categories as $category): ?>
                                    <option value="<?= $category -> categoryID ?>"> <?= $category -> title ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <span> <?= previewAndUnsetSessionArrayWithContent('newce'); ?>
                                <?= previewAndUnsetSession('newc'); ?> </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 keepFile">
                            <div class="file-field input-field">
                                <div class="btn btnAdd">
                                    <span>New file</span>
                                    <input type="file" name="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 keepTextarea">
                            <textarea id="textarea2" name="textam" class="materialize-textarea" placeholder="Enter mystery" data-length="60585"></textarea>
                            <span> <?= previewAndUnsetSessionArrayWithContent('textame'); ?>
                                <?= previewAndUnsetSession('textam'); ?> </span>
                        </div>
                    </div>
                    <div class="input-field col s12 m-0 p-0">
                        <input class="btn btnAddMC waves-effect waves-light p-0 mb-3" value="Edit" type="submit" id="btnEditm" name="btnEditm" />
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

