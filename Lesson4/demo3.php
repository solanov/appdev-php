<?php


    //global scope
    $name='Luffy';

    echo $name;
    echo '<br>';


    function sayHello() {
        global $name;
        echo 'Hello, '.$name;    
    }

    sayHello();
    echo '<br>';

    function sayGoodbye() {
        $names = ['Luffy','Zoro','Sanji'];
        echo 'Goodbye, '.$names[0];
    }

 
?>