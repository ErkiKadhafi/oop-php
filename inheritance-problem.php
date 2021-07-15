<?php 
    class Produk{
        public $judul, 
                $penulis,
                $penerbit,
                $harga,
                $halaman,
                $waktuMain,
                $tipe ;
        
        public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,
                                $halaman = 0, $waktuMain = 0, $tipe){
            $this->judul = $judul;
            $this->penulis = $penulis;
            $this->penerbit = $penerbit;
            $this->harga = $harga;
            $this->halaman = $halaman; 
            $this->waktuMain = $waktuMain;
            $this->tipe = $tipe;
        }                

        public function getLabel(){
            return "$this->penulis, $this->penerbit";
        }

        public function getInfoLengkap(){
            $str = "{$this->tipe} : {$this->getLabel()}  (Rp. {$this->harga})";
            if($this->tipe == "Komik"){
                $str .= " - {$this->halaman} halaman";
            }else if ($this->tipe == "Game"){
                $str .= " ~ {$this->waktuMain} jam";
            }
            return $str;
        }
    }

    class CetakInfoProduk{
        public function cetak( Produk $produk ){
            $str = "{$produk->judul} | {$produk->getLabel()} (Rp. $produk->harga)";
            return $str;
        }
    }


    $produk1 = new Produk("naruto", "masashi kishimoto", "shonen jump", 39000, 100, 0, "Komik");
    $produk2 = new Produk("uncharted", "neil duckman", "sony computer", 250000, 0, 50, "Game");
    
    $printer = new CetakInfoProduk();

    
    // Komik : naruto | masashi kishimoto, shonen jump (Rp. 39000) - 100 halaman
    // Game : uncharted | neil duckman, sony computer (Rp. 250000) ~ 50 jam
    echo $produk1->getInfoLengkap();
    echo "<br>";
    echo $produk2->getInfoLengkap();
    echo "<br>";
?>