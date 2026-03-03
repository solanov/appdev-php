<?php 
    $output=null;
    
    //Get year
    $output=date('Y');

    //Use  a different date with a timestamp
    $output=date('Y',241241241);

    //Year for a different date
    $output=date('Y',strtotime('1999-09-01'));

    //get month
    $output=date('m');

    //get day
    $output=date('d');

    $output=date('D');
    $output=date('l');

    //get hour
    $output=date('H');

    //minute
    $output=date('i');

    //sec
    $output=date('s');

    //am or pm
    $output=date('a');

    //full time
    $output=date('Y-m-d h:i:s a');
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
