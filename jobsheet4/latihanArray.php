<?php
$studentGrades = [
    ["Alice", 85],
    ["Bob", 92],
    ["Charlie", 78],
    ["David", 64],
    ["Eva", 90]
];

$totalGrades = 0;
$studentCount = count($studentGrades);

foreach ($studentGrades as $student) {
    $totalGrades += $student[1];
}

$averageGrade = $totalGrades / $studentCount;

echo "Rata-rata nilai kelas adalah: $averageGrade <br>";

echo "Daftar siswa dengan nilai di atas rata-rata:<br>";

foreach ($studentGrades as $student) {
    if ($student[1] > $averageGrade) {
        echo "Nama: " . $student[0] . ", nilai: " . $student[1] . "<br>";
    }
}
?>