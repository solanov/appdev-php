<?php

    declare(strict_types=1);//struct type requirement
    function getSum(int $a, int $b){
        return $a+ $b;
    }

    echo getSum(5,10);
    echo '<br>';


    function greeting(string $name){
        return 'Hello, '.$name;
    }

    echo greeting('Luffy');
?>