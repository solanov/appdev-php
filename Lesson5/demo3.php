<?php
    //inheritance
    class User
    {
    public $name;
    public $email;
    protected $status = 'active';

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function login()
    {
    echo $this->name . ' logged in <br>';
    }

    

    
    }


    class Admin extends User
    {
        public $level;
        public function __construct($name,$email,$level){
            $this->level = $level;
            parent::__construct($name,$email);
        }

        public function login(){
        echo 'Admin '.$this->name.' logged in';
        }
        public function getStatus(){
        return $this->status;
        }
    }


    $admin = new Admin('Monkey D. Luffy', 'luffy@strawhat.com', 5);

    echo $admin->name;
    echo '<br>';
    echo $admin->email;
    echo '<br>';
    echo $admin->level;
    echo '<br>';
    echo $admin->getStatus();
    echo '<br>';
    $admin->login();


?>