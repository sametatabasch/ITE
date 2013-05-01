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
            <?php
            if(oturumKontrol()){
                empty($_GET['s']) ? $sayfa = $_SESSION['yetki'] : $sayfa = $_GET['s'] ;
            }
            switch ($sayfa) {
                case 'ogrenci':
                    include './tema/ogrenci.php';
                    break;
                default :
                    include './tema/default.php';
            }
            ?>
            <?php include './tema/footer.php'; ?>
        </div>
        <?php include './tema/scriptler.php'; ?>
    </body>
</html>
