<?php
/*
 * sayfa sonunda çalıştırılacak scriptler bu sayfada düzenlenecek
 */
?>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $("#gravatar").popover({
        html : true,
        content :'<?php _e('E-posta adresinize kayıtlı bir gravatarınız varsa bunun yerine kullanılacaktır. Gravatar hakkında bilgi için <a href="http://www.bibardak.com/gravatar-ile-e-posta-adresiniz-nerdeyse-avatariniz-orda.html" target="_blank">buraya</a> tıklayın. ')?>'
        
    });
    $("#sifre").tooltip();
    $("#login_error").hide();
    $("#uyeOl_error").hide();
</script>
<script>
    /*öğrenci giriş formunu denetleyen kodlar*/
    $("#login_form").bind("submit", function() {

        if ($("#mail").val().length < 1 || $("#pass").val().length < 1) {
            $("#login_error").show();
            return false;
        }
        $.ajax({
            type: "POST",
            cache: false,
            url: "./login.php",
            data: $('#login_form').serializeArray(),
            success: function(data) {
                $('#giris_modal').modal('hide');
                window.location.replace('./index.php?s=' + data+'');
            }
        });
        return false;
    });
    /*Üye ol formunu denetleyen ve gönderen kodlar*/
    $("#uyeOl_form").bind("submit", function() {

        if ($("#uyeOl_mail").val().length < 1 || $("#uyeOl_pass").val().length < 1 || $("#uyeOl_kullaniciAdi").val().length < 1) {
            $("#uyeOl_error").show();
            return false;
        }
        /*buraya yükleniyor tarzı  birşey yapmak lazım*/
        $.ajax({
            type: "POST",
            cache: false,
            url: "./uyeol.php",
            data: $('#uyeOl_form').serializeArray(),
            success: function(data) {
                if (data == "1") {
                    $('#uyeOl_modal').modal('hide');
                    alert('Kayıt Başarılı Şimdi Profilinizi Güncelleyin');
                    window.location.replace('./?duzenle=1');
                } else {
                    alert(data);
                }
            }

        });
        return false;
    });

</script>