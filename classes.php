<?php 

class Radar
{
    public $date;
    public $time;
    public $carNumber;
    public $distance;
    public $time2;

    public function __construct($date, $time, $carNumber, $distance, $time2)
    {
        $this->date = $date;
        $this->time = $time;
        $this->carNumber = $carNumber;
        $this->distance = $distance;
        $this->time2 = $time2;
    }

    public function greitis(){
        return round ($this->distance / $this->time2 * 3.6);
    }
}