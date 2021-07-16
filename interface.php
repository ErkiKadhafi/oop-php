<?php 
    interface InfoProduk{
        public function getInfoProduk();
    }
    
    abstract class Produk{
        private $judul, 
                $penulis,
                $penerbit,
                $harga;
        protected $diskon = 0;
        
        public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
            $this->judul = $judul;
            $this->penulis = $penulis;
            $this->penerbit = $penerbit;
            $this->harga = $harga;
        }                

        //setter
        public function setJudul($judul){
            if(!is_string($judul)){
                throw new Exception("Judul harus string");
            }
            $this->judul = $judul;
        }

        public function setPenulis($penulis){
            $this->penulis = $penulis;
        }

        public function setPenerbit($penerbit){
            $this->penulis = $penerbit;
        }

        public function setHarga($harga){
            $this->harga = $harga;
        }
        
        //getter
        public function getHarga(){
            return $this->harga - ($this->harga * $this->diskon / 100);
        }
        
        public function getJudul(){
            return $this->judul;
        }

        public function getPenulis(){
            return $this->penulis;
        }

        //getter custom method
        public function getLabel(){
            return "$this->penulis, $this->penerbit";
        }
        
        public function getInfo(){
            $str = "{$this->judul} | {$this->getLabel()}  (Rp. {$this->harga})";
            return $str;
        }
        
    }

    class Komik extends Produk implements InfoProduk{
        public $halaman;

        public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,
                                    $halaman = 0){
            parent::__construct($judul, $penulis, $penerbit, $harga);
            $this->halaman = $halaman;
        }

        public function getInfoProduk(){
            $str = "Komik : " . parent::getInfo() . " - {$this->halaman} halaman";
            return $str;
        }
    }

    class Game extends Produk implements InfoProduk{
        public $waktuMain;

        public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,
                                    $waktuMain = 0){
            parent::__construct($judul, $penulis, $penerbit, $harga);
            $this->waktuMain = $waktuMain;
        }

        public function getInfoProduk(){
            $str = "Game : " . parent::getInfo() . " ~ {$this->waktuMain} jam";
            return $str;
        }

        public function setDiskon($diskon){
            $this->diskon = $diskon;
        }
    }

    class CetakInfoProduk{
        public $daftarProduk = [];

        public function tambahProduk( Produk $produk){
            $this->daftarProduk[] = $produk;
        }
        
        public function cetak(){
            $str = "DAFTAR PRODUK <br>";

            foreach($this->daftarProduk as $prod){
                $str .= "- {$prod->getInfoProduk()} <br>";
            }
           
            return $str;
        }
    }


    $produk1 = new Komik("naruto", "masashi kishimoto", "shonen jump", 39000, 100);
    $produk2 = new Game("uncharted", "neil duckman", "sony computer", 250000, 50);
    
    $printer = new CetakInfoProduk();

    $printer->tambahProduk($produk1);
    $printer->tambahProduk($produk2);

    echo $printer->cetak();

?>