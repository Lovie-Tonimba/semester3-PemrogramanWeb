<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Nilai a = {$a} <br>";
echo "Nilai b = {$b} <br><br>";

echo "Hasil Penjumlahan (a + b) = {$hasilTambah} <br>";
echo "Hasil Pengurangan (a - b) = {$hasilKurang} <br>";
echo "Hasil Perkalian (a * b) = {$hasilKali} <br>";
echo "Hasil Pembagian (a / b) = {$hasilBagi} <br>";
echo "Sisa Bagi (a % b) = {$sisaBagi} <br>";
echo "Hasil Pangkat (a ** b) = {$pangkat} <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Nilai a = {$a} <br>";
echo "Nilai b = {$b} <br><br>";

echo "Apakah a sama dengan b? (a == b) : " . ($hasilSama ? "true" : "false") . "<br>";
echo "Apakah a tidak sama dengan b? (a != b) : " . ($hasilTidakSama ? "true" : "false") . "<br>";
echo "Apakah a lebih kecil dari b? (a < b) : " . ($hasilLebihKecil ? "true" : "false") . "<br>";
echo "Apakah a lebih besar dari b? (a > b) : " . ($hasilLebihBesar ? "true" : "false") . "<br>";
echo "Apakah a lebih kecil atau sama dengan b? (a <= b) : " . ($hasilLebihKecilSama ? "true" : "false") . "<br>";
echo "Apakah a lebih besar atau sama dengan b? (a >= b) : " . ($hasilLebihBesarSama ? "true" : "false") . "<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Nilai a = {$a} <br>";
echo "Nilai b = {$b} <br><br>";

echo "Hasil AND (a && b) = " . ($hasilAnd ? "true" : "false") . "<br>";
echo "Hasil OR (a || b) = " . ($hasilOr ? "true" : "false") . "<br>";
echo "Hasil NOT a (!a) = " . ($hasilNotA ? "true" : "false") . "<br>";
echo "Hasil NOT b (!b) = " . ($hasilNotB ? "true" : "false") . "<br>";

$a += $b; 
echo "Setelah a += b : {$a} <br>";

$a -= $b; 
echo "Setelah a -= b : {$a} <br>";

$a *= $b; 
echo "Setelah a *= b : {$a} <br>";

$a /= $b; 
echo "Setelah a /= b : {$a} <br>";

$a %= $b; 
echo "Setelah a %= b : {$a} <br>";

$hasilIdentik = $a === $b;
echo "Nilai \$a adalah $a dan \$b adalah $b.\n";
echo "Apakah \$a dan \$b identik (nilai dan tipe data sama)? ";
var_dump($hasilIdentik);
$hasilTidakIdentik = $a !== $b;
echo "Apakah \$a dan \$b tidak identik (nilai atau tipe data berbeda)? ";
var_dump($hasilTidakIdentik);
?>