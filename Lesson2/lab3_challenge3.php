<?php
/*
  Challenge 3: Calculate the average students grade from an array of students. Each student has their own array with the key 'grades'. 

    1. Create an array of students with their names and grades (0 - 100)
        john 85,90,92,88
        jane 95,88,91,87
        joe  75,82,79,88

    2. Iterate over the students array with a foreach loop
    3. Calculate the average grade for each student

*/


//Your solution goes here....
$students=[
    'john' => ['grades' => [85, 90, 92, 88]],
    'jane' => ['grades' => [95, 88, 91, 87]],
    'joe'  => ['grades' => [75, 82, 79, 88]]
];

echo '<b>Average Grade</b> <br>';
foreach ($students as $student => $grades) {
    echo ucwords($student).': Average Grade = ';
    $total=array_sum($grades['grades']);
    $count=count($grades['grades']);
    $average=$total/$count;
    echo $average.'<br>';
}


/* Sample output to be display

Average Grade
John: Average Grade = 88.75
Jane: Average Grade = 90.25
Joe: Average Grade = 81

*/
?>