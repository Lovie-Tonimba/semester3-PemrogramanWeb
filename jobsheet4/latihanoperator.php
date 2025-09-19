<?php
$total_seats = 45;
$occupied_seats = 28;

$empty_seats = $total_seats - $occupied_seats;

$percentage_empty = ($empty_seats / $total_seats) * 100;

echo "<br>Jumlah kursi yang masih kosong: {$empty_seats} kursi<br>";
echo "Persentase kursi yang masih kosong: {$percentage_empty}%";

?>