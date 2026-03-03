<?php
    //A funtion is a block of statemetns that can be used repeatedly in aprogram.
    // A function will not execute automatically when a page loads.
    // A function will be executed by a call to the function.


    //simple function
    function sayHello(){
        echo 'Hello<br>';
    }

    //call the function
    sayHello();
    sayHello();


    //function return a value
    function sayGoodbye(){
        return 'Goodbye<br>';
    }

    echo sayGoodbye();

    //store return value in a variable
    $goodbye=sayGoodbye();

    echo $goodbye;

?>