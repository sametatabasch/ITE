<?php

/**
 * veritabanı işlemlerini yapmak için kullanılacak sınıf
 *
 * @author Samet ATABAŞ
 */
class database {

    /**
     * kullanılacak değişkenler 
     *
     * @var string $sunucu
     * @var string $kullaniciAdi
     * @var string $sifre
     * @var string $veritabaniAdi
     * @var bool $connection
     * @var bool $selectDb
     */
    private $sunucu = '54.235.67.244';
    private $kullaniciAdi = 'ite';
    private $sifre = '3308378';
    private $veritabaniAdi = 'ite_veritabani';
    private $connection;
    private $selectDb;

    /**
     * veri tabanı bağlantısını kuracak fonksiyon 
     *
     * @param string $charSet
     */
    private function baglan($charSet = 'utf8') {
        try {
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.$charSet,
            );
            $this->connection  = new PDO("mysql:host=$this->sunucu;dbname=$this->veritabaniAdi",$this->kullaniciAdi,$this->sifre,$options);

        } catch ( PDOException $e ) {
            echo 'Hata: ' . $e->getMessage();
        }
    }

    /**
     * Veritabanı bağlantısını sonlandıran fonksiyon
     *
     * @return void
     */
    public function baglantiyisonlandir() {
        $this->connection= null;
    }

    function __construct($charSet = 'utf8') {
        $this->baglan($charSet);
    }

    /**
     * Mysql SELECT işlemini yapacak fonksiyon
     *
     * @param string $alanlar
     * @param string $tablo
     * @param string $kosul
     * @param string $ek
     *
     * @return array|bool
     */
    public function select($alanlar, $tablo, $kosul, $ek) {
        $sql = "SELECT $alanlar FROM $tablo ";
        if (!empty($kosul)) {
            $sql.="WHERE " . $kosul;
        }
        if (!empty($ek)) {
            $sql.=$ek;
        }
        try{
            return $this->connection->query($sql)->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo 'Hata: ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Mysql UPDATE işlemini yapacak fonksiyon
     *
     * @param string $tablo
     * @param array $set
     * @param string $kosul
     *
     * @return bool
     */
    public function update($tablo, $set = array(), $kosul) {
        $s='';
        foreach ($set as $alan => $veri) {
            if (empty($s)) {
                $s = $alan . '=\'' . $this->string_temizle($veri) . '\'';
            } else {
                $s.=',' . $alan . '=\'' . $this->string_temizle($veri) . '\'';
            }
        }
        $sql = "UPDATE $tablo SET $s WHERE $kosul";
        try{
            return $this->connection->query($sql);
        }catch (PDOException $e){
            echo 'Hata: ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Mysql INSERT INTO işlemini yapacak fonksiyon
     *
     * @param string $tablo 
     * @param array $arr[alan]=veri 
     *
     * @return bool
     */
    public function insert($tablo, $arr = array()) {
        if (is_array($arr)) {
            foreach ($arr as $alan => $veri) {
                $alanlar[] = $alan;
                $veriler[] = $veri;
            }
            $a='';
            foreach ($alanlar as $alan) {
                if (empty($a)) {
                    $a = $alan;
                } else {
                    $a.=',' . $alan;
                }
            }
            $v='';
            foreach ($veriler as $veri) {
                if (empty($v)) {
                    $v = '\'' . $veri . '\'';
                } else {
                    $v.=',\'' . $veri . '\'';
                }
            }
            $sql = "INSERT INTO $tablo($a) VALUES($v) ";
            try{
                return $this->connection->query($sql)->fetch(PDO::FETCH_ASSOC);
            }catch (PDOException $e){
                echo 'Hata: ' . $e->getMessage();
                return false;
            }
        } else {
             die('Veriler Yanlış Girilmiş Lütfen Verileri Kontrol Ediniz');
        }
    }

    /**
     * Mysql num rows işlemini yapacak fonksiyon 
     *
     * @param string $sql
     *
     * @return integer | bool 
     */
    public function num_rows($sql) {
        return $this->connection->query($sql)->rowCount();
    }

    /**
     * @param $string string
     * @return string
     */
    public function string_temizle($string) {
        if (get_magic_quotes_gpc()) {
            $string = nl2br(htmlspecialchars(stripcslashes($string)));
        } else {
            $string = nl2br(htmlspecialchars($string));
        }
        return $string;
    }

}