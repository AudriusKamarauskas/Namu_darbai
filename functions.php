<?php 

class Mokinys
{
    public $vardas;
    public $pavarde;
    public $gimimoData;

    function __construct($vardas, $pavarde, $gimimoData)
    {
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->gimimoData = $gimimoData;
    }

    function mokiniai()
    {
        echo $this->vardas . " " . $this->pavarde;
    }

}