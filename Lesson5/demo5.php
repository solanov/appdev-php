<?php

    //abstract class
    abstract class Shape{
        protected $name;
        
        abstract public function calculateArea();

        // constructor
        public function __construct($name){
            $this->name = $name;
        }

        //concrete method

        public function getName(){
        return $this->name;
        }

    }

        //$shape = new Shape();

        class Circle extends Shape{
            private $radius;

            public function __construct($name,$radius){
                parent::__construct($name);
                $this->radius = $radius;
            }

            public function calculateArea(){
                return pi() * pow($this->radius,2);
            }

        }



    class Rectangle extends Shape{
        private $width;
        private $height;

        public function __construct($name,$width,$height){
            parent::__construct($name);
            $this->width = $width;
            $this->height = $height;
        }

        public function calculateArea(){
            return $this->width * $this->height;
        }    
    }
        //create instances of concrete classes
    
    $circle = new Circle('Circle',5);
    $rectangle = new Rectangle('Rectangle',4,6);

    echo $rectangle->getName().' Area: '.$rectangle->calculateArea().'<br>';

    //echo $circle->getName().' Area: '.$circle->calculateArea().'<br>';
    


?>