<?php
    //array functions

    $ids=[10,22,15,45,67,33];
    $users=['users2','users1','users3'];

    //the count function returns the number of elements in an array.
    count($ids);

    /*echo '<pre>';
    var_dump(count($ids));
    echo '</pre>';*/

    echo '<pre>';
    var_dump(count($users));
    echo '</pre>';


    //the sort function sorts an indexed array in ascending order
    echo '<pre>';
    sort($users);
    var_dump($users);
    echo '</pre>';

    //the sort function sorts an indexed array in descending order
    echo '<pre>';
    rsort($users);
    var_dump($users);
    echo '</pre>';

    //pushes a value to the end of an array
    array_push($ids,100);
    array_push($users,'user4');

    echo '<pre>';
    var_dump($ids);
    var_dump($users);
    echo '</pre>';

    //deletes the last element of an array
    array_pop($ids);
    array_pop($users);

    echo '<pre>';
    var_dump($ids);
    var_dump($users);
    echo '</pre>';

    //removes the first element of an array
    array_shift($ids);
    array_shift($users);

    echo '<pre>';
    var_dump($ids);
    var_dump($users);
    echo '</pre>';

    $ids=[10,22,15,45,67,33];
    $users=['users2','users1','users3'];

    //adds a value to the first element of an array
    array_unshift($ids,33);
    array_unshift($users,'users3');

    echo '<pre>';
    var_dump($ids);
    var_dump($users);
    echo '</pre>';


    $ids=[10,22,15,45,67,33];
    $users=['users2','users1','users3'];
    
    //returns a selected part of an array
    $ids2=array_slice($ids,2,3);

    echo '<pre>';
    var_dump($ids2);
    echo '</pre>';

    //returns the sum of all the values in an array
    $output='Sum of all IDs: '.array_sum($ids);
    echo $output;


    //search an array and returns the index
    echo '<br>';
    $output='User 2 is at index: '.array_search('users2',$users);
    echo $output;

    //breaks a string into an array
    $tags='tech,code,programming';
    $tagsArr=explode(',',$tags);
    
    echo '<pre>';
    var_dump($tagsArr);
    echo '</pre>';

    //returns a string from the elements of an array
    $output=implode(', ',$users);
    echo $output;

    //PHP Documnetation - https://www.php.net/manual/en/ref.array.php

?>