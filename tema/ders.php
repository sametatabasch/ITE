<?php
/*
 * ders ile ilgili her içerik  bu  sayfada olacak
 */
?>
<?php
include_once './config.php';
?>
<div class="row-fluid">
    <!-- Sidebar-->
    <?php include 'tema/sidebar.php'; ?>
    <!-- /Sidebar-->
    <div class="span10 well">
        <?php
        $ders = $_GET['d'];
        if (empty($_GET['u'])) {
            ?>
            <h2><?php _e($ders) ?></h2>
            <div class="row-fluid">
                <?php
                $VT = new database();
                $uniteler = $VT->select('uniteler','dersler',"adi='$ders'",'')['uniteler'];
                $kazanimlar = $VT->select('kazanimlar','dersler',"adi='$ders'",'')['kazanimlar'];
                $uniteler = explode('-', $uniteler);
                $kazanimlar = explode('~', $kazanimlar);
                $i = 0;
                foreach ($kazanimlar as $kazanim) {
                    $kazanim = explode(';', $kazanim);
                    $kazanimlar[$i] = $kazanim;
                    $i++;
                }
                $i = 0;
                ?>
                <ul class="thumbnails" >
                    <?php
                    foreach ($uniteler as $unite):
                        if ($i % 4 == 0):
                            ?>
                            <div class="row-fluid">
                            <?php endif; ?>
                            <li class="span3">
                                <div class="thumbnail"style="background:#ffffff;position: relative;">
                                    <div class="caption" style="height: 300px;">
                                        <h5 class="text-success"><?php _e($unite) ?></h5>
                                        <p>
                                        <ul class="nav nav-list">
                                            <?php foreach ($kazanimlar[$i] as $kazanim): ?>
                                                <li><?php echo $kazanim ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        </p>
                                        
                                    </div>
                                    <a style="position: absolute;bottom: 5px;right: 5px;" class="btn btn-primary" href="?s=ders&d=<?php echo $ders ?>&u=<?php echo $unite ?>&i=konuanlatimi"><?php _e('Çalış') ?></a>
                                </div>
                            </li>
                            <?php if ($i % 4 == 3): ?>
                            </div><hr>
                        <?php endif; ?>
                        <?php
                        $i++;
                    endforeach;
                }else {
                    $unite = $_GET['u'];
                    $icerik = $_GET['i'];
                    ?>
                    <h2><?php echo $unite ?></h2>
                    <hr>
                    <div class="row-fluid">
                        <?php
                        switch ($icerik) {
                            case 'konuanlatimi':
                                include './dersicerik/1/konuanlatimi.html';
                                break;
                            case 'sunu':
                                include './dersicerik/1/sunu.html';
                                break;;
                            case 'sinav':
                                include './dersicerik/1/sinav.html';
                                break;
                            case 'oyun':
                                include './dersicerik/1/oyun.html';
                                break;
                            case 'sozluk':
                                include './dersicerik/1/sozluk.html';
                                break;
                        }
                        ?>
                    </div>            
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</div>
