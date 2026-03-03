<?php 
    //function with arugments
    function add($a,$b){
        return $a + $b;
    }

    echo add(1,2);
    echo '<br>';
    echo add(5,5);
    echo '<br>';
    echo add(10,20);
    echo '<br>';

    //Default arguments

    function sayHello($name='world'){
        return 'Hello, '.$name;
    }

    $greeting = sayHello();
    echo($greeting);
    echo '<br>';
    $greeting = sayHello('Albert');
    echo($greeting);
    echo '<br>';

    //Variable arguments

    function addAll(...$numbers){
        $total=0;
        foreach($numbers as $number){
            $total+=$number;
        }

        return $total;
    }


    echo addAll(1,2,3,4,5);
    echo '<br>';
    echo addAll(1,2,3,4,5,6,7,8,9,10);


?>