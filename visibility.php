<?php 
    class Produk{
        public $judul, 
                $penulis,
                $penerbit;
        protected $diskon = 0;
        private $harga;
        
        public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
            $this->judul = $judul;
            $this->penulis = $penulis;
            $this->penerbit = $penerbit;
            $this->harga = $harga;
        }                

        public function getLabel(){
            return "$this->penulis, $this->penerbit";
        }

        public function getInfoProduk(){
            $str = "{$this->judul} | {$this->getLabel()}  (Rp. {$this->harga})";
            return $str;
        }

        public function getHarga(){
            return $this->harga - ($this->harga * $this->diskon / 100);
        }
    }

    class Komik extends Produk{
        public $halaman;

        public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,
                                    $halaman = 0){
            parent::__construct($judul, $penulis, $penerbit, $harga);
            $this->halaman = $halaman;
        }

        public function getInfoProduk(){
            $str = "Komik : " . parent::getInfoProduk() . " - {$this->halaman} halaman";
            return $str;
        }
    }

    class Game extends Produk{
        public $waktuMain;

        public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,
                                    $waktuMain = 0){
            parent::__construct($judul, $penulis, $penerbit, $harga);
            $this->waktuMain = $waktuMain;
        }

        public function getInfoProduk(){
            $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} jam";
            return $str;
        }

        public function setDiskon($diskon){
            $this->diskon = $diskon;
        }
    }

    class CetakInfoProduk{
        public function cetak( Produk $produk ){
            $str = "{$produk->judul} | {$produk->getLabel()} (Rp. $produk->harga)";
            return $str;
        }
    }


    $produk1 = new Komik("naruto", "masashi kishimoto", "shonen jump", 39000, 100);
    $produk2 = new Game("uncharted", "neil duckman", "sony computer", 250000, 50);
    
    $printer = new CetakInfoProduk();

    
    // Komik : naruto | masashi kishimoto, shonen jump (Rp. 39000) - 100 halaman
    // Game : uncharted | neil duckman, sony computer (Rp. 250000) ~ 50 jam
    echo $produk1->getInfoProduk();
    echo "<br>";
    echo $produk2->getInfoProduk();
    echo "<hr>";

    $produk2->setDiskon(0);
    echo $produk2->getHarga();
?>