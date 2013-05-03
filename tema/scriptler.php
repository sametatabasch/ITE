<?php
/*
 * sayfa sonunda çalıştırılacak scriptler bu sayfada düzenlenecek
 */
?>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="./fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="./fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<script type="text/javascript" src="./fancybox/source/jquery.fancybox.pack.js?v=2.1.4"></script>
<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="./fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="./fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="./fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

<link rel="stylesheet" href="./fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="./fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
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
$(document).ready(function() {
	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
});
$(document).ready(function() {
	$('.fancybox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});
});
</script>
