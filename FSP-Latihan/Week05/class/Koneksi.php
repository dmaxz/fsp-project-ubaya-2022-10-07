<?php
// class Koneksi{
//     private $var = "Ini private var Koneksi";
//     function __construct()
//     {
//         $this->var = "ubah private var koneksi";
//         echo $this->var;
//     }
// }

class Koneksi 
{
    private $mysqli;
    public function __construct($args)
    {
        $this->mysqli = new mysqli("localhost", "ken", "ken", "movies_db");
    }
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
