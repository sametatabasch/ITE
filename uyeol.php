<?php

include ('./config.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$VT = new database();
$kullaniciAdi = $_POST['uyeOl_kullaniciAdi'];
$mail = $_POST['uyeOl_mail'];
$sifre = md5($_POST['uyeOl_pass']);
$yetki = $_POST['uyeOl_yetki'];

$kayitTarihi = date('Y-m-d G:i:s');
$arr = array(
    'kullaniciAdi' => $kullaniciAdi,
    'sifre' => $sifre,
    'mail' => $mail,
    'dersAktivitesi' => '',
    'dilSecimi' => 'tr_TR',
    'cinsiyet' => '',
    'okulAdi' => '',
    'adiSoyadi' => '',
    'sinifi' => '',
    'sonGiris' => $kayitTarihi,
    'kayitTarihi' => $kayitTarihi,
    'yetki' => $yetki
);
if ($VT->insert($yetki, $arr)) {

    $sonuclar = $VT->select('*','ogrenci',"mail='$mail' AND sifre='$sifre'",'');

    $_SESSION['kullaniciAdi'] = $sonuclar['kullaniciAdi'];
    $_SESSION['mail'] = $sonuclar['mail'];
    $_SESSION['id'] = $sonuclar['id'];
    $_SESSION['dilSecimi'] = $sonuclar['dilSecimi'];
    $_SESSION['yetki'] = $sonuclar['yetki'];
    $girisTarihi = date('Y-m-d G:i:s');
    $VT->update($sonuclar['yetki'], array('sonGiris' => $girisTarihi), "id=" . $sonuclar['id']);
    echo '1';
} else {
    echo '0';
}
?>
