<!DOCTYPE html>
<?php
include_once 'config.php';
?>
<html>
    <?php include 'tema/head.php'; ?>
    <body>
    <div class="container-fluid">
        <!--Header-->
        <?php include 'tema/header.php'; ?>
        <!--/Header-->
        <!-- Menü-->
        <?php include 'tema/menu.php'; ?>
        <!-- /Menü-->
        <div class="row-fluid">
            <!-- Sidebar-->
            <?php include 'tema/sidebar.php'; ?>
            <!-- /Sidebar-->
            <div class="span10 well">
                <?php if (empty($_POST['editor1'])): ?>
                    <form id="editor" name="editor" method="post" class="">
                        <textarea name="editor1"></textarea>
                        <input type="submit" value="Kaydet" class="btn btn-primary" style="margin-top: 5px;"/>
                    </form>
                    <script>
                        CKEDITOR.replace('editor1', {
                            filebrowserBrowseUrl: './ckfinder/ckfinder.html',
                            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?Type=Images',
                            filebrowserFlashBrowseUrl: './ckfinder/ckfinder.html?Type=Flash',
                            filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                        });
                    </script>
                    <?php
                else:
                    echo $_POST['editor1'];
                endif;
                ?>
            </div>
        </div>
        <?php include './tema/footer.php'; ?>
    </div>
    <?php include './tema/scriptler.php';?>
</body>
</html>