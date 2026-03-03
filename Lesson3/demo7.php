<?php

    $favouriteColor='red';
    $secondFavouriteColor= 'yellow';
    // Ternary operator
    // $color=isset($favoriteColor)?$favoriteColor:'blue';

    // echo $color;


    //Null coalescing operator
    // $favouriteColor='red';
    // $color=$favouriteColor??'blue';

    // echo $color;

    // $color2=isset($favouriteColor)?$favouriteColor:(isset($secondFavouriteColor)?$secondFavouriteColor:'blue');

    // echo $color2;

    $color2=$favouriteColor??$secondFavouriteColor??'blue';
    echo $color2;

?>