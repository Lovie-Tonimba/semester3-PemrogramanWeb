<?php
$harga_produk = 120000;
$persentase_diskon = 20;
$harga_batas_diskon = 100000;

$harga_bayar = $harga_produk;

if ($harga_produk > $harga_batas_diskon) {
    $jumlah_diskon = ($persentase_diskon / 100) * $harga_produk;
    
    $harga_bayar = $harga_produk - $jumlah_diskon;
    
    echo "Harga produk: Rp$harga_produk";
    echo "<br>Diskon yang didapat: Rp$jumlah_diskon";
    echo "<br>";
} else {
    echo "Harga produk: Rp$harga_produk";
    echo "<br>Tidak ada diskon yang didapat.";
    echo "<br>";
}

echo "Harga yang harus dibayar: Rp$harga_bayar";
?>