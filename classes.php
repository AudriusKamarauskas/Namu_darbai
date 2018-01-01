<?php 

class Radar
{
    public $number;
    private $distance;
    private $time;

    public function __construct($number, $distance, $time)
    {
        $this->number = $number;
        $this->distance = $distance;
        $this->time = $time;
    }
    public function getDistance(){
        return $this->distance;
    }
    public function getTime(){
        return $this->time;
    }
    public function greitis(){
        return round ($this->distance / $this->time * 3.6 , 1);
    }

    public function getNumber() {
        echo $this->number;
    }
}