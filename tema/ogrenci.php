<?php
include_once './config.php';
$VT = new database;
$sql = "SELECT * FROM " . $_SESSION['yetki'] . " WHERE id=" . $_SESSION['id'];
$veriler = $VT->fetch_array($sql);
?>
<div class="row-fluid">
    <!-- Sidebar-->
    <?php include 'tema/sidebar.php'; ?>
    <!-- /Sidebar-->
    <div class="span10 well">
        <?php if (!empty($_GET['duzenle'])): if (!$_POST): ?>
                <div class="row-fluid">
                    <div class="span10 well">
                        <h4><?php _e('Bilgiler') ?></h4>
                        <div class="controls-row">
                            <form id="profilGuncelle-form" name="profilGuncelle_form" method="post" action="" class="form-horizontal form">
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="adiSoyadi" class="control-label ">
                                            <?php _e('Adı Soyadı:') ?>
                                        </label>
                                        <div class="controls">
                                            <input id="adiSoyadi" type="text" name="adiSoyadi" class="input-large" value="<?php echo $veriler['adiSoyadi'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sinifi" class="control-label ">
                                            <?php _e('Sınıfı:') ?>
                                        </label>
                                        <div class="controls">
                                            <select name="sinifi" class="selection input-mini">
                                                <option value="2" <?php if ($veriler['sinifi'] == 2) echo 'selected' ?> >2</option>
                                                <option value="3" <?php if ($veriler['sinifi'] == 3) echo 'selected' ?> >3</option>
                                                <option value="4" <?php if ($veriler['sinifi'] == 4) echo 'selected' ?> >4</option>
                                                <option value="5" <?php if ($veriler['sinifi'] == 5) echo 'selected' ?> >5</option>
                                                <option value="6" <?php if ($veriler['sinifi'] == 6) echo 'selected' ?> >6</option>
                                                <option value="7" <?php if ($veriler['sinifi'] == 7) echo 'selected' ?> >7</option>
                                                <option value="8" <?php if ($veriler['sinifi'] == 8) echo 'selected' ?> >8</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="okulAdi" class="control-label">
                                            <?php _e('Okul Adı:') ?>
                                        </label>
                                        <div class="controls">
                                            <input id="okulAdi" type="text" name="okulAdi" class="input-large" value="<?php echo $veriler['okulAdi'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="cinsiyet" class="control-label ">
                                            <?php _e('Cinsiyet:') ?>
                                        </label>
                                        <div class="controls">
                                            <select name="cinsiyet" class="selection input-medium">
                                                <option value="bay" <?php if ($veriler['cinsiyet'] == 'bay') echo 'selected' ?> ><?php _e('Bay') ?></option>
                                                <option value="bayan" <?php if ($veriler['cinsiyet'] == 'bayan') echo 'selected' ?> ><?php _e('Bayan') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label for="dilSecimi" class="control-label ">
                                            <?php _e('Dil:') ?>
                                        </label>
                                        <div class="controls">
                                            <select name="dilSecimi" class="selection input-medium">
                                                <option value="tr_TR" <?php if ($veriler['dilSecimi'] == 'tr_TR') echo 'selected' ?> ><?php _e('Türkçe') ?></option>
                                                <option value="en_US.utf8" <?php if ($veriler['dilSecimi'] == 'en_US.utf8') echo 'selected' ?> ><?php _e('English') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="kullaniciAdi" class="control-label">
                                            <?php _e('Kullanıcı Adı:') ?>
                                        </label>
                                        <div class="controls">
                                            <input id="kullaniciAdi" type="text" name="kullaniciAdi" class="input-large" value="<?php echo $veriler['kullaniciAdi'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="mail" class="control-label">
                                            <?php _e('Mail:') ?>
                                        </label>
                                        <div class="controls">
                                            <input id="mail" type="text" name="mail" class="input-large" value="<?php echo $veriler['mail'] ?>"/>
                                            <!--tooltip yada benceri olan şeyden eklenecek benzeri daha iyi gibi. Giriş yaparken ve iletişim için kullanacağınız mail adresi-->
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sifre" class="control-label">
                                            <?php _e('Şifre:') ?>
                                        </label>
                                        <div class="controls">
                                            <input id="sifre" type="password" name="sifre" class="input-large" data-placement="right" data-trigger="focus" data-original-title="<?php _e('Değişiklik yapmayacaksanız boş bırakın') ?>"/>
                                        </div>
                                    </div>
                                    <input type="submit" value="<?php _e('Kaydet') ?>" class="btn btn-primary pull-right"/> 
                                </div>
                            </form>

                        </div>
                    </div>
                    <div id="gravatar" class="span2 well" data-placement="bottom" data-toggle="popover" data-trigger="click" data-original-title="Gravatar" >
                        <!--tooltip yada benzeri ile gravatar açıklanmalı -->
                        <?php echo gravatar($_SESSION['mail'], 250, "image img-polaroid") ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12 well">
                        <?php _e('Diğer Bilgiler') ?>
                    </div>
                </div>

                <?php
            else:
                //$VT= new database;
                $adiSoyadi = $_POST['adiSoyadi'];
                $sinifi = $_POST['sinifi'];
                $okulAdi = $_POST['okulAdi'];
                $cinsiyet = $_POST['cinsiyet'];
                $dilSecimi = $_POST['dilSecimi'];
                $kullaniciAdi = $_POST['kullaniciAdi'];
                $mail = $_POST['mail'];
                $_POST['sifre'] == '' ? $sifre = $VT->getresult("SELECT sifre FROM " . $_SESSION['yetki'] . " WHERE id=" . $_SESSION['id']) : $sifre = md5($_POST['sifre']);
                $arr = array(
                    'adiSoyadi' => $adiSoyadi,
                    'sinifi' => $sinifi,
                    'okulAdi' => $okulAdi,
                    'cinsiyet' => $cinsiyet,
                    'dilSecimi' => $dilSecimi,
                    'kullaniciAdi' => $kullaniciAdi,
                    'mail' => $mail,
                    'sifre' => $sifre
                );
                if ($VT->update($_SESSION['yetki'], $arr, "id=" . $_SESSION['id'])) {

                    header("Location:./");
                }
            endif;
        else: /* Düzenleme kısmı */
            ?>
            <div class="row-fluid">
                <div class="span10 well">
                    <h4><?php _e('Bilgiler') ?></h4>
                    <div class="control-group">
                        <div class="controls-row">
                            <div class="span6"> 
                                <label><?php
                                    _e("Adi Soyadı:");
                                    echo $veriler['adiSoyadi'];
                                    ?></label>
                                <label><?php
                                    _e("Okulu:");
                                    echo $veriler['okulAdi'];
                                    ?></label>
                                <label><?php
                                    _e("Sınıfı:");
                                    echo $veriler['sinifi'];
                                    ?></label>
                                <label><?php
                                    _e("Son Giriş:");
                                    echo $veriler['sonGiris'];
                                    ?></label>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="span2 well">
                    <?php echo gravatar($_SESSION['mail'], 250, "image img-polaroid") ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 well">
                    <?php _e('Diğer Bilgiler') ?>
                </div>
            </div>
            <div class="row-fluid">
                <?php
                switch ($veriler['sinifi']) {
                    case 2:
                        $dersler = array(1, 2, 3);
                        break;
                    case 3:
                        $dersler = array(1, 2, 3);
                        break;
                    case 4:
                        $dersler = array(1, 2, 4, 5);
                        break;
                    case 5:
                        $dersler = array(1, 2, 4, 5);
                        break;
                    case 6:
                        $dersler = array(1, 2, 4, 5);
                        break;
                    case 7:
                        $dersler = array(1, 2, 4, 5);
                        break;
                    case 8:
                        $dersler = array(1, 2, 5, 6);
                        break;
                }
//              $VT= new database();
               $dersler = $VT->fetch_array("SELECT * FROM dersler");
                   echo '<pre>';
                   print_r($dersler);
                   echo '</pre>';
               
                ?>
                <div class="span12 well">

                    <h4><?php _e('Dersler') ?></h4>
                    <ul class="thumbnails" >
                        <li class="span3">
                            <div class="thumbnail"style="background:#ffffff;">
                                <div class="caption">
                                    <h2 class="text-success"><?php _e('Matematik') ?></h2>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                    <p><a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a></p>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <div class="thumbnail" style="background:#ffffff;">
                                <div class="caption">
                                    <h2 class="text-success"><?php _e('Türkçe') ?></h2>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                    <p><a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a></p>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <div class="thumbnail"  style="background:#ffffff;">
                                <div class="caption">
                                    <h2 class="text-success"><?php _e('Fizik') ?></h2>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                    <p><a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a></p>
                                </div>
                            </div>
                        </li>
                        <li class="span3">
                            <div class="thumbnail" style="background:#ffffff;">
                                <div class="caption">
                                    <h2 class="text-success"><?php _e('Kimya') ?></h2>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                    <small>Son giriş: </small>
                                    <p><a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
</div>