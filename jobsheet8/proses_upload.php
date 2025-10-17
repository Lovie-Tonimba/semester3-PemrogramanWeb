<!-- <?php
// Lokasi penyimpanan file yang diunggah
// $targetDirectory = "documents/";

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
// if (!file_exists($targetDirectory)) {
//     mkdir($targetDirectory, 0777, true);
// }

// if ($_FILES['files']['name'][0]) {
//     $totalFiles = count($_FILES['files']['name']);

//     // Loop melalui semua file yang diunggah
//     for ($i = 0; $i < $totalFiles; $i++) {
//         $fileName = $_FILES['files']['name'][$i];
//         $targetFile = $targetDirectory . $fileName;

//         // Pindahkan file yang diunggah ke direktori penyimpanan
//         if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
//             echo "File $fileName berhasil diunggah.<br>";
//         } else {
//             echo "Gagal mengunggah file $fileName.<br>";
//         }
//     }
// } else {
//     echo "Tidak ada file yang diunggah.";
// }
// ?> -->


<!-- Question no 9 -->
<?php
// Direktori penyimpanan file gambar
$targetDirectory = "images/";

// Cek apakah folder penyimpanan sudah ada, kalau belum buat baru
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if ($_FILES['files']['name'][0]) {
    $totalFiles = count($_FILES['files']['name']);

    // Jenis file yang diperbolehkan hanya gambar
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $fileTmp = $_FILES['files']['tmp_name'][$i];
        $targetFile = $targetDirectory . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validasi ekstensi gambar
        if (in_array($fileType, $allowedExtensions)) {
            if (move_uploaded_file($fileTmp, $targetFile)) {
                echo "Gambar $fileName berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah gambar $fileName.<br>";
            }
        } else {
            echo "File $fileName bukan gambar yang valid.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>