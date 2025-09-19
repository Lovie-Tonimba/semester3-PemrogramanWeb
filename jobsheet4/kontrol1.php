<?php
$listOfGrades = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
$totalScore = 0;

foreach ($listOfGrades as $score){
    if($score > 90){
        continue;
    }
    if($score <= 70){        
        continue;
    }
    $totalScore += $score;
}
echo "<br>Total grades of students = $totalScore";
?>