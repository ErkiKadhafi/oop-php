<?php 
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

 ?>