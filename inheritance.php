<?php 
    class Produk{
        public $judul, 
                $penulis,
                $penerbit,
                $harga,
                $halaman,
                $waktuMain;
        
        public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,
                                $halaman = 0, $waktuMain = 0){
            $this->judul = $judul;
            $this->penulis = $penulis;
            $this->penerbit = $penerbit;
            $this->harga = $harga;
            $this->halaman = $halaman; 
            $this->waktuMain = $waktuMain;
        }                

        public function getLabel(){
            return "$this->penulis, $this->penerbit";
        }

        public function getInfoProduk(){
            $str = "{$this->judul} | {$this->getLabel()}  (Rp. {$this->harga})";
            return $str;
        }
    }

    class Komik extends Produk{
        public $halaman;

        public function getInfoProduk(){
            $str = "Komik : {$this->judul} | {$this->getLabel()}  (Rp. {$this->harga}) - {$this->halaman} halaman";
            return $str;
        }
    }

    class Game extends Produk{
        public $waktuMain;

        public function getInfoProduk(){
            $str = "Game : {$this->judul} | {$this->getLabel()}  (Rp. {$this->harga}) ~ {$this->waktuMain} jam";
            return $str;
        }
    }

    class CetakInfoProduk{
        public function cetak( Produk $produk ){
            $str = "{$produk->judul} | {$produk->getLabel()} (Rp. $produk->harga)";
            return $str;
        }
    }


    $produk1 = new Komik("naruto", "masashi kishimoto", "shonen jump", 39000, 100, 0, "Komik");
    $produk2 = new Game("uncharted", "neil duckman", "sony computer", 250000, 0, 50, "Game");
    
    $printer = new CetakInfoProduk();

    
    // Komik : naruto | masashi kishimoto, shonen jump (Rp. 39000) - 100 halaman
    // Game : uncharted | neil duckman, sony computer (Rp. 250000) ~ 50 jam
    echo $produk1->getInfoProduk();
    echo "<br>";
    echo $produk2->getInfoProduk();
    echo "<br>";
?>