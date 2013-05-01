<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
include_once 'config.php';
?>
<html>
    <?php include 'tema/head.php'; ?>
    <body>
        <div class="container-fluid  ">
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
                    <?php if(isset($_GET['duzenle'])): ?>
                    <div class="row-fluid">
                        <div class="span10 well">
                            <h4>Bilgiler</h4>
                            <div class="control-group">
                                <div class="controls-row">

                                </div>
                            </div>
                        </div>
                        <div class="span2 well">
                            <img src="./img/profil/1.png" class="image img-polaroid"/>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12 well">
                            Diğer Bilgiler
                        </div>
                    </div>
                    <?php else: /*Düzenleme kısmı*/?>
                    <div class="row-fluid">
                        <div class="span10 well">
                            <h4>Bilgiler</h4>
                            <div class="control-group">
                                <div class="controls-row">

                                </div>
                            </div>
                        </div>
                        <div class="span2 well">
                            <img src="./img/profil/1.png" class="image img-polaroid"/>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12 well">
                            Diğer Bilgiler
                        </div>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php include './tema/footer.php'; ?>
        </div>
        <?php include './tema/scriptler.php'; ?>
    </body>
</html>
