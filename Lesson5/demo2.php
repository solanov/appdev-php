<?php

    class User
    {
    // Properties
    public $name;
    public $email;
    private $status='active';

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

     // Methods
    public function login()
    {
        echo $this->name . ' logged in <br>';
    }
    
    public function getStatus(){
        echo $this->status;
    }

    public function setStatus($status){
        $this->status=$status;
    }

    }

    //getter method
    

    // Instantiate a new object
    $user1 = new User('Monkey D. Luffy', 'monkey@gmail.com');

    $user1->login();

    $user2 = new User('Roronoa Zoro', 'roronoa@gmail.com');

    $user2->login();

    $user2->setStatus('inactive');
    $user2->getStatus();



?>