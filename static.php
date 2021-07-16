<?php 
    // class ContohStatic{
    //     public static $angka = 1;

    //     public static function halo(){
    //         return "halo " . self::$angka++ . " kali";
    //     }
    // }

    // echo ContohStatic::$angka;
    // echo "<br>";
    // echo ContohStatic::halo();
    // echo "<br>";
    // echo ContohStatic::halo();
    // echo "<br>";
    // echo ContohStatic::$angka;

    class Contoh{
        public static $angka = 1;

        public function halo(){
            return "Halo " . self::$angka++ . " kali. <br>";
        }
    }

    $test = new Contoh();
    echo $test->halo();
    echo $test->halo();
    echo $test->halo();

    echo "<hr>";

    $test2 = new Contoh();
    echo $test2->halo();
    echo $test2->halo();
    echo $test2->halo();
?>