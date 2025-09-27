<?php

function perkenalan($nama, $salam="Assalamualaikum"){
    echo $salam.", ";
    echo "Perkenakan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan anda<br/>";
}

perkenalan("Lovie", "Halo");
echo "<hr>";

$saya = "Lovie";
$ucapanSalam = "Selamat pagi";

perkenalan($saya);
// perkenalan();
// echo "<br>";
// perkenalan();
?>