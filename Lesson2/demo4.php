<?php
    $output=null;
    $user=null;

    $fruits=[
        //0       //1
        ['Apple','Red'],//0
        ['Orange','Orange'],//1
        ['Banana','Yellow']//2
    ];

    $output=$fruits[1][0];

    //Multidimensional Associative Array
    $user=[
        ['name'=>'John','email'=>'john@gmail.com','passwword'=>'secret'], 
        ['name'=>'Mary','email'=>'mary@gmail.com','passwword'=>'secret'], 
        ['name'=>'Jane','email'=>'jane@gmail.com','passwword'=>'secret']
    ];

    $user[]=['name'=>'Alex','email'=>'alex@gmail.com','passwword'=>'secret'];

    $output=$user[0]['name'].' '.$user[0]['email'].' '.$user[0]['passwword'];

    array_pop($user);

    array_shift($user);

    $output=count($user).' users in the array';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PHP From Scratch</title>
</head>
<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">PHP From Scratch</h1>
        </div>
    </header>
    <div class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md p-6 mt-6">
            <!-- Output -->
            <h2 class="text-xl font-semibold my-4">Output: </h2>
            <p class="text-x1"><?= $output ?></p>
            <h2 class="text-xl font-semibold my-4">User Array: </h2>
            <pre><?php print_r($user); ?></pre>
        </div>
    </div>
</body>
</html>