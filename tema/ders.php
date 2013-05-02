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
                $uniteler = $VT->getresult("SELECT uniteler FROM dersler WHERE adi='$ders'");
                $kazanimlar = $VT->getresult("SELECT kazanimlar FROM dersler WHERE adi='$ders'");
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
                                <div class="thumbnail"style="background:#ffffff;">
                                    <div class="caption">
                                        <h5 class="text-success"><?php _e($unite) ?></h5>
                                        <p>
                                        <ul class="nav nav-list">
                                            <?php foreach ($kazanimlar[$i] as $kazanim): ?>
                                                <li><?php echo $kazanim ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        </p>
                                        <p><a class="btn btn-primary" href="?s=ders&d=<?php echo $ders ?>&u=<?php echo $unite ?>"><?php _e('Çalış') ?></a></p>
                                    </div>
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
                    ?>
                    <h2><?php echo $unite ?></h2>
                    <div class="row-fluid"></div>            
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</div>
