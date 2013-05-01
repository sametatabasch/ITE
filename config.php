<?php session_start(); date_default_timezone_set('Europe/Istanbul');error_reporting(E_ALL);
include './class/veritabani.class.php';
/**
 * gettex fonksiyonu için echo eklemesi
 * @param String $mesaj Çevirisi yapılacak metin
 */
function _e($mesaj) {
    echo _($mesaj);
}
/**
 * sitenin bununduğu dizin
 */
$anadizin="./";
/**
 * Gettex localization ayarlarını yapan fonksiyon
 * 
 * @param String $dil Dil değişkeni öntanımlı tr_TR
 * @param String $katalog gettext katalog adı öntanımlı ite
 */
function setGettext($dil = 'tr_TR', $katalog = 'ite') {
    if(!empty($_SESSION['dilSecimi'])) $dil=$_SESSION['dilSecimi'];
    putenv('LC_ALL=' . $dil);
    setlocale(LC_ALL, $dil);
// burada hangi kataloğumuzu kullanacağımızı
// ve dil dosyaların hangi dizinde olduğunu
// yani: /lang/en_US/LC_MESSAGES/projemiz.po
    bindtextdomain($katalog, "./lang");
// burada da kataloğumuzun adını belirtiyoruz.
    textdomain($katalog);
}
setGettext();//öntanımlı ayarları etkinleştir
/**
 * oturumKontrol açılmış oturum olup olmadığına bakar oturum varsa true yoksa false değerini döner
 * @return boolean
 */
function oturumKontrol()
{
    if(!empty($_COOKIE['mail'])){
        $_SESSION['kullaniciAdi'] = $_COOKIE['kullaniciAdi'];
        $_SESSION['mail'] = $_COOKIE['mail'];
        $_SESSION['id'] = $_COOKIE['id'];
        $_SESSION['dilSecimi']= $_COOKIE['dilSecimi'];
        $_SESSION['yetki']=$_COOKIE['yetki'];
    }
    if(empty($_SESSION['mail'])) {
        return false;
    }else {
        return true;
    }
};
/**
 * 
 * @param String $mail
 * @param int $boyut
 * @param String $class
 * @return \strıng
 */
function gravatar($mail,$boyut,$class)
{
		
	if(empty($mail))
	{
		$grav_url = "./img/profil/1.png";
	}else
	{
            $VT=new database;
            if($VT->getresult("SELECT cinsiyet FROM ".$_SESSION['yetki']." WHERE id=".$_SESSION['id']."")=='bayan'){
                $default ="http://gencbilisim.net/ite/img/profil/1.png";
            }  else {
                $default ="http://gencbilisim.net/ite/img/profil/6.png";
            }
		
		$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $mail ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $boyut;
	}
	$resim='<img src="'.$grav_url.'" class="'.$class.'" />'; 
	return $resim;
};
/**
 * veri tabanı sınıfı için değişken
 */
?>
