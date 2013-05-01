<?php include_once './config.php';
/*
 * Etkin Oturumun tüm bilgilerini siler
 */
session_destroy();
setcookie('kullaniciAdi', '', time() + (60 * 60 * 24 * 7 * 365));
setcookie('mail', '', time() + (60 * 60 * 24 * 7 * 365));
setcookie('id', '', time() + (60 * 60 * 24 * 7 * 365));
setcookie('dilSecimi', '', time() + (60 * 60 * 24 * 7 * 365));
setcookie('yetki', '', time() + (60 * 60 * 24 * 7 * 365));

header("Location:" . $anadizin . "");
?>
?>
