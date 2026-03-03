<?php

    class User
    {
        //properties
        public $name;
        public $email;

        //Constructor
        public function __construct($name, $email){
            //echo 'This is a constructor initialized..';
            $this->name = $name;
            $this->email = $email;
        }


        //Methods
        public function login(){
            echo $this->name.' The user logged in';
        }

        public function logemail(){
            echo $this->email.' The user email is logged in';
        } 
    }

    
    //Instantiate a new object
    $user1=new User('Monkey D. Luffy','monkey@gmail.com');
    $user1->login();
    echo '<br>';


    $user2=new User('Roronoa Zoro','roronoa@gmail.com');
    $user2->login();
    echo '<br>';
    $user2->logemail();


    // Instatiate a new object
    // $user1 = new User();
    // $user1->name = 'Monkey D. Luffey';
    // $user1->email = 'monkey@gmail.com';


    //var_dump($user1);

    
    // $user1->login();
    // echo '<br>';

    // $user2 = new User();
    // $user2->name = 'Roronoa Zoro';
    // $user2->email = 'roronoa@gmail.com';

    // var_dump($user2);

    // echo '<br>';
    // echo $user1->name;
    // echo '<br>';
    // echo $user2->name;

    
    


?>