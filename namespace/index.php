<?php 
    require_once "App/init.php";
    
    // $produk1 = new Komik("naruto", "masashi kishimoto", "shonen jump", 39000, 100);
    // $produk2 = new Game("uncharted", "neil duckman", "sony computer", 250000, 50);
    
    // $printer = new CetakInfoProduk();

    // $printer->tambahProduk($produk1);
    // $printer->tambahProduk($produk2);

    // echo $printer->cetak();

    use App\Service\User as ServiceUser;
    use App\Produk\User as ProdukUser;

    new ServiceUser();
    echo "<br>";
    new ProdukUser();
?>