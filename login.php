<?php
include_once './config.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$VT=new database;
$mail = $_POST['mail'];
$sifre = md5($_POST['pass']);

if ($VT->num_rows("SELECT * FROM ogrenci WHERE (mail='$mail' OR kullaniciAdi='$mail' ) AND sifre='$sifre'") > 0) {
    $sonuclar = $VT->select('*','ogrenci',"(mail='$mail' OR kullaniciAdi='$mail' ) AND sifre='$sifre'",'');
    if (isset($_POST['remeber'])) {
        $_SESSION['kullaniciAdi'] = $sonuclar['kullaniciAdi'];
        $_SESSION['mail'] = $sonuclar['mail'];
        $_SESSION['id'] = $sonuclar['id'];
        $_SESSION['dilSecimi']= $sonuclar['dilSecimi'];
        $_SESSION['yetki']=$sonuclar['yetki'];
        echo $sonuclar['yetki'];//script e gönderilen veri bu veriye göre sayfa yönlenecek
    } else {
        setcookie('kullaniciAdi', $sonuclar['kullaniciAdi'], time() + (60 * 60 * 24 * 7 * 365));
        setcookie('mail', $sonuclar['mail'], time() + (60 * 60 * 24 * 7 * 365));
        setcookie('id', $sonuclar['id'], time() + (60 * 60 * 24 * 7 * 365));
        setcookie('dilSecimi', $sonuclar['dilSecimi'], time() + (60 * 60 * 24 * 7 * 365));
        setcookie('yetki', $sonuclar['yetki'], time() + (60 * 60 * 24 * 7 * 365));
        echo $sonuclar['yetki'];//script e gönderilen veri bu veriye göre sayfa yönlenecek
    }
    $girisTarihi = date('Y-m-d G:i:s');
    $VT->update($sonuclar['yetki'],array('sonGiris' => $girisTarihi),"id=".$sonuclar['id']);
} else {
    echo 'Giriş Başarısız';
}
?>
