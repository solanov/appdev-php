<?php 
    $output=null;



    $num1=20;
    $num2=10;


    //Basic Arithmetic
    $output="$num1 + $num2 = ".$num1+$num2; 
    $output="$num1 - $num2 = ".$num1-$num2; 
    $output="$num1 x $num2 = ".$num1*$num2; 
    $output="$num1 / $num2 = ".$num1/$num2; 
    $output="$num1 % $num2 = ".$num1%$num2; 

    //Appending Asssignment Operator
    $num3=10;
    $num3 += 20;//$num3=$num3+20;
    $num3 -= 5;
    $num3 *= 2;
    $num3 /= 2;

    $output=$num3;

    //rand() - Generates random numbers
    $output=rand();
    $output=rand(1, 10);

    //round - Rounds a floating-point number
    $output=round(4.5);


    //ciel() - rounds a number up to the nearest number
    $output= ceil(4.3);

    //floor() - rounds a number down to the nearest integer
    $output=floor(4.7);
    
    //sqrt()
    $output=sqrt(64);

    //pi
    $output=pi();

    //abs
    $output=abs(-20);

    //max
    $output=max(1,2,3);

    //min
    $output=min(1,2,3);
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
       <p class="text=x1"><?=$output;?></p>
    </div>
  </div>
</body>

</html>
