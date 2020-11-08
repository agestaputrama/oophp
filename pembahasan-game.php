<?php

abstract class Hewan{
    public $nama, $darah = 50, $jumlahKaki, $keahlian;

    public function __construct($nama)
    {
        $this->nama = $nama;  
    }

    public function atraksi(){
        $str = $this->nama." Sedang ".$this->keahlian;
        return $str;
    }

    abstract public function getInfoHewan();

    public function getInfo(){
        $str= "Nama : ".$this->nama."\n".
              "Darah : ".$this->darah."\n".
              "Jumlah Kaki : ".$this->jumlahKaki."\n".
              "Keahlian : ".$this->keahlian."\n";

        return $str;
    }
}

trait Fight{
    public $attackPower, $defencePower;

    public function serang($hewan){
        echo $this->nama." sedang menyerang ".$hewan->nama."\n";
        echo "=============================================="."\n";
        //otomatis memanggil method diserang
        $hewan->diserang($this);
    }

    public function diserang($hewan){
        echo $this->nama." sedang diserang ".$hewan->nama."\n";
        $this->darah = $this->darah - ($hewan->attackPower/$this->defencePower);

        echo "Darah ".$this->nama." tersisa :".$this->darah."\n";
    }
}

class Elang extends Hewan{
    use Fight;

    function __construct($nama){
        parent::__construct($nama);
        $this->jumlahKaki = 2;
        $this->keahlian = "Terbang Tinggi";
        $this->attackPower = 10;
        $this->defencePower = 5;

    }

    function getInfoHewan(){
        $str = "=== Elang ===" ."\n" .
                parent::getInfo(). "\n".
                "Attack Power : ".$this->attackPower."\n".
                "Defence Power : ".$this->defencePower."\n";
                return $str;
    }
}

class Harimau extends Hewan{
    use Fight;

    function __construct($nama){
        parent::__construct($nama);
        $this->jumlahKaki = 4;
        $this->keahlian = "Lari Cepat";
        $this->attackPower = 7;
        $this->defencePower = 8;
    }

    function getInfoHewan(){
        $str = "=== Harimau ===" ."\n" .
                 parent::getInfo(). "\n".
                "Attack Power : ".$this->attackPower."\n".
                "Defence Power : ".$this->defencePower."\n";
                return $str;
    }
}

$elang1 = new Elang("Elang Jawa");
$harimau1 = new Harimau("Harimau Sumatra");
echo $harimau1->serang($elang1);
echo "\n";
echo $elang1->serang($harimau1);
echo "\n";

echo $harimau1->getInfoHewan();

?>