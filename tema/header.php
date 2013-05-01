<?php
/*
 * Sitenin Header bölümü buradan düzenlenecek
 */
?>
<div id="header" class="row-fluid header">
    <div class="span1 logo yesil">
        LOGO
    </div>
    <div class="span11 gri">
        <?php if (!oturumKontrol()): ?>
            <a id="loginOgrenci" class="btn btn-primary btn-large pull-right margin5" href="#giris_modal" role="button" data-toggle="modal"><?php _e('Giriş Yap') ?></a>
            <!-- Modal -->
            <div id="giris_modal"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel"><?php _e('Öğrenci Giriş') ?></h3>
                </div>
                <div class="modal-body">
                    <form id="login_form" method="post" action="" class="modal-form">
                        <p id="login_error" class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert" onclick='$("#login_error").hide();'>&times;</button>
                            <?php _e('Lütfen gerekli alanları doldurunuz') ?></p>
                        <p class="text-center">
                        <input type="text" id="mail" name="mail" type="email" required placeholder="<?php _e('Kullanıcı Adı / Mail') ?>" class="input-xlarge" />
                        </p>
                        <p class="text-center">
                        <input type="password" id="pass" name="pass" placeholder="<?php _e('Şifre') ?>" class="input-xlarge"/>
                        </p>
                        <p class="checkbox">
                        <input type="checkbox" name="remember"/><?php _e('Beni hatırla') ?>
                        </p>
                        <input type="submit" value="<?php _e('Kaydet') ?>" class="hide"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php _e('Vazgeç') ?></button>
                    <button class="btn btn-primary" onclick="$('#login_form').submit();"><?php _e('Giriş') ?></button>
                </div>
            </div>
            <a id="uyeOl" href="#uyeOl_modal" class="btn btn-success btn-large pull-right margin5" role="button" data-toggle="modal"><?php _e('Üye ol') ?></a>
            <!-- Modal -->
            <div id="uyeOl_modal"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel"><?php _e('Yeni Üye Formu') ?></h3>
                </div>
                <div class="modal-body">
                    <form id="uyeOl_form" method="post" action="" class="modal-form form-horizontal">
                        <p id="uyeOl_error" class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert" onclick='$("#login_error").hide();'>&times;</button>
                            <?php _e('Lütfen gerekli alanları doldurunuz') ?>
                        </p>
                        <p class="text-center">
                        <input type="text" id="uyeOl_kullaniciAdi" name="uyeOl_kullaniciAdi" placeholder="<?php _e('Kullanıcı Adı') ?>" class="input-medium" />
                        </p>
                        <p class="text-center">
                        <input type="text" id="uyeOl_mail" name="uyeOl_mail" type="email" placeholder="<?php _e('Mail adresiniz') ?>" class="input-medium"  />
                        </p>
                        <p class="text-center">
                        <input type="password" id="uyeOl_pass" name="uyeOl_pass" placeholder="<?php _e('Şifre') ?>" class="input-medium" />
                        </p>
                        <div class="controls-row">
                            <p class="radio pull-left margin5">
                            <input type="radio" name="uyeOl_yetki" id="uyeOl_ogrenci" value="ogrenci" checked /> <?php _e('Öğrenci') ?>
                            </p>
                            <p class="radio pull-left margin5">
                            <input type="radio" name="uyeOl_yetki" id="uyeOl_ogretmen" value="ogretmen" /> <?php _e('Öğretmen') ?>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php _e('Vazgeç') ?></button>
                    <button class="btn btn-primary" onclick="$('#uyeOl_form').submit();"><?php _e('Üye Ol') ?></button>
                </div>
            </div>
        <?php else: ?>
            <a id="cikis" class="btn btn-primary btn-large pull-right margin5" href="./logout.php" ><?php _e('Çıkış Yap') ?></a>
        <?php endif; ?>
    </div>
</div><!--/header row -->