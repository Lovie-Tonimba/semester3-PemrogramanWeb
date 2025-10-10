<?php
$pattern = '/[a-z]/'; // Cocokkan huruf kecil.
$text = 'This is a Sample Text.';

if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!";
} else {
    echo "Tidak ada huruf kecil!";
}

$pattern = '/[0-9]+/'; // Cocokkan satu atau lebih digit.
$text = 'There are 123 apples.';
echo "<br>";
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

echo "<br>";
$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie.';
$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text; // Output: "I like banana pie."

echo "<br>";
$pattern = '/go*d/'; // Cocokkan "god", "good", "gooood", dll.
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

// --- Pertanyaan No 5.5: Modifikasi Pola ('/go?d/') ---
echo "<br>";
$pattern = '/go?d/'; // Cocokkan "gd" atau "god". Tanda '?' berarti nol atau satu 'o'.
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan (go?d): " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

// --- Pertanyaan No 5.6: Pola Modifikasi ('/go{1,3}d/') ---
echo "<br>";
$pattern_range = '/go{1,3}d/'; // Cocokkan 'o' minimal 1 dan maksimal 3 kali. ("god", "good", "goood").
$text = 'gd god good goood gooood.'; 
echo "Teks: " . $text . "<br>";

if (preg_match_all($pattern_range, $text, $matches_all)) {
    echo "Cocokkan (go{1,3}d): ";
    echo implode(", ", $matches_all[0]);
} else {
    echo "Tidak ada yang cocok!";
}
?>