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
     * @return bool
     */
    private function baglan($charSet = 'utf8') {
        $this->connection = mysql_connect($this->sunucu, $this->kullaniciAdi, $this->sifre);
        if ($this->connection) {
            mysql_set_charset($charSet, $this->connection);
            $this->selectDb = mysql_select_db($this->veritabaniAdi, $this->connection);
            if (!$this->selectDb) {
                die('HATA : Veri tabanı seçilemedi' . mysql_error());
            }
        } else {
            die('HATA : Bağlantı kurulamadı' . mysql_error());
        }
    }

    /**
     * Veritabanı bağlantısını sonlandıran fonksiyon
     *
     * @return void
     */
    public function baglantiyisonlandir() {
        mysql_close($this->connection);
    }

    function __construct($charSet = 'utf8') {
        $this->baglan($charSet);
    }

//    function __destruct() {
//        $this->baglantiyisonlandir();
//        
//    }

    /**
     * Mysql SELECT işlemini yapacak fonksiyon
     *
     * @param string $alanlar
     * @param string $tablo
     * @param string $kosul
     * @param string $ek
     *
     * @return array
     */
    public function select($alanlar, $tablo, $kosul, $ek) {
        $sql = "SELECT $alanlar FROM $tablo ";
        if (!empty($kosul)) {
            $sql.="WHERE " . $kosul;
        }
        if (!empty($ek)) {
            $sql.=$ek;
        }
        $sorgu = mysql_query($sql);
        if (!$sorgu) {
            die('Sorgu çalıştırılamadı' . mysql_error());
        }
        return mysql_fetch_array($sorgu);
    }

    /**
     * Mysql UPDATE işlemini yapacak fonksiyon
     *
     * @param string $tablo
     * @param array $veriler
     * @param string $kosul
     *
     * @return bool
     */
    public function update($tablo, $set = array(), $kosul) {
        $s;
        foreach ($set as $alan => $veri) {
            if (empty($s)) {
                $s = $alan . '=\'' . $this->string_temizle($veri) . '\'';
            } else {
                $s.=',' . $alan . '=\'' . $this->string_temizle($veri) . '\'';
            }
        }
        $sql = "UPDATE $tablo SET $s WHERE $kosul";
        $sorgu = mysql_query($sql);
        if ($sorgu) {
            return true;
        } else {
            echo mysql_error();
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
            $a;
            foreach ($alanlar as $alan) {
                if (empty($a)) {
                    $a = $alan;
                } else {
                    $a.=',' . $alan;
                }
            }
            $v;
            foreach ($veriler as $veri) {
                if (empty($v)) {
                    $v = '\'' . $veri . '\'';
                } else {
                    $v.=',\'' . $veri . '\'';
                }
            }
            $query = "INSERT INTO $tablo($a) VALUES($v) ";
            $sql = mysql_query($query);
            if ($sql) {
                return true;
            } else {
                
                    echo mysql_error();
                    return false;
                
            }
        } else {
            return die('Veriler Yanlış Girilmiş Lütfen Verileri Kontrol Ediniz');
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
        return mysql_num_rows(mysql_query($sql));
    }

    /**
     * Mysql num rows işlemini yapacak fonksiyon 
     *
     * @param string $sql
     * @param integer $rowNo
     *
     * @return array | bool 
     */
    public function getresult($sql, $rowNo = 0) {
        return mysql_result(mysql_query($sql), $rowNo);
    }

    /**
     * mysql_fetch_array fonksiyonu
     *
     * @param string $sql
     *
     * @return array
     */
    public function fetch_array($sql) {
        $sorgu = mysql_query($sql);
        if (!$sorgu) {
            echo mysql_error();
        }
        $sonuclar = array();
        while ($sonuc = mysql_fetch_array($sorgu)) {
            array_push($sonuclar, $sonuc);
        }
        if(count($sonuclar)==1){
            $sonuclar=$sonuclar[0];
        }
        return $sonuclar;
        //return mysql_fetch_array(mysql_query($sql));
    }

    public function fetch_assoc($sql) {
        $sorgu = mysql_query($sql);
        if (!$sorgu) {
            echo mysql_error();
        }
        $sonuclar = array();
        while ($sonuc = mysql_fetch_assoc($sorgu)) {
            array_push($sonuclar, $sonuc);
        }
        if(count($sonuclar)==1){
            $sonuclar=$sonuclar[0];
        }
        return $sonuclar;
        //return mysql_fetch_assoc(mysql_query($sql));
    }

    /**
     * 
     * @param type $string
     * @return type
     */
    public function string_temizle($string) {
        if (get_magic_quotes_gpc()) {
            $string = mysql_real_escape_string(nl2br(htmlspecialchars(stripcslashes($string))));
        } else {
            $string = mysql_real_escape_string(nl2br(htmlspecialchars($string)));
        }
        return $string;
    }

}

?>