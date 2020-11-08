<?php

trait Hewan{
    public $nama;
    public $darah = 50;
    public $jumlahKaki;
    public $keahlian; 

    public function atraksi(){
        //menampilkan string nama dan keahlian
        echo $this->nama." sedang ".$this->keahlian."<br><br>";
    }
}

trait Fight{
    use hewan;
    public $attackPower;    
    public $defencePower;
    
    public function serang($lawan){
        // “harimau_1 sedang menyerang elang_3” atau “elang_3 sedang menyerang harimau_2”.

        echo $this->nama." sedang menyerang ".$lawan->nama."<br><br>";
    }

    public function diserang($lawan){
        // “harimau_1 sedang diserang” atau “elang_3 sedang diserang”,
        echo $this->nama." sedang diserang, Sisa darah : ".($this->darah - $lawan->attackPower)/$this->defencePower."<br><br>";
    }

}

class Elang{

    use Fight;

    function __construct($nama, $jumlahKaki, $keahlian, $attackPower, $defencePower)
    {
        $this->nama = $nama;
        $this->jumlahKaki =  $jumlahKaki;
        $this->keahlian = $keahlian;
        $this->attackPower = $attackPower;
        $this->defencePower = $defencePower;
    }

    public function getInfoHewan(){
        echo "Jenis Hewan : ".$this->nama."<br>";
        echo "Jumlah Kaki : ".$this->jumlahKaki."<br>";
        echo "Keahlian : ".$this->keahlian."<br>";
        echo "Darah :".$this->darah."<br>";
        echo "Attck Power : ".$this->attackPower."<br>";
        echo "Defence Power : ".$this->defencePower."<br><br>";
        }
}

class Harimau{

    use Fight;

    function __construct($nama, $jumlahKaki, $keahlian, $attackPower, $defencePower)
    {
        $this->nama = $nama;
        $this->jumlahKaki =  $jumlahKaki;
        $this->keahlian = $keahlian;
        $this->attackPower = $attackPower;
        $this->defencePower = $defencePower;
    }
        
    public function getInfoHewan(){
            echo "Jenis Hewan : ".$this->nama."<br>";
            echo "Jumlah Kaki : ".$this->jumlahKaki."<br>";
            echo "Keahlian : ".$this->keahlian."<br>";
            echo "Darah :".$this->darah."<br>";
            echo "Attck Power : ".$this->attackPower."<br>";
            echo "Defence Power : ".$this->defencePower."<br><br>";
    }
}

$elang = new Elang("Elang", "2", "Terbang Tinggi", "10", "5");
$harimau = new Harimau("Harimau", "4", "Lari Cepat", "7", "8");

$elang->getInfoHewan();
$elang->atraksi();
$elang->serang($harimau);
$elang->diserang($harimau);

$harimau->getInfoHewan();
$harimau->atraksi();
$harimau->serang($elang);
$harimau->diserang($elang);
?>