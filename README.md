# Namu_darbai

<!DOCTYPE html>
<html>
    <head>
        <title>Puslapio antraštė</title>
        <meta charset="utf-8">
    </head>
    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
    
    <body>
    
        <?php

class Mokinys
{
    public $vardas;
    public $pavarde;

    function __construct($vardas, $pavarde)
    {
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
    }

    function mokiniai()
    {
        echo $this->vardas . " " . $this->pavarde;
    }
}

class Trimestras extends Mokinys
{
    public $dalykai;

    function __construct($vardas, $pavarde, $dalykai)
    {
        parent::__construct($vardas, $pavarde);
        $this->dalykai = $dalykai;
    }

    function mokinioInfo()
    {
        echo $this->mokiniai() . " ";
    }

    function trimestroVidurkis()
    {
        $suma = 0;
        foreach ($this->dalykai as $dalykas => $ivertinimas) {
            $suma += $ivertinimas;
        }
        $vidurkis = round($suma / count($this->dalykai));
        echo $vidurkis;
    }
}


    $array = [
        [$mokinys1 = new Trimestras("Jonas", "Jonaitis", ["lietuviu" => 6, "matematika" => 7, "anglu" => 4])],
        [$mokinys2 = new Trimestras("Petras", "Petraitis", ["lietuviu" => 8, "matematika" => 7, "anglu" => 7])],
        [$mokinys3 = new Trimestras("Kazys", "Kazenas", ["lietuviu" => 7, "matematika" => 9, "anglu" => 8])]
    ];

    
    ?>
    <table>
    <tr>
      <th>Mokinio vardas, pavarde</th>
      <th>Trimestro vidurkis</th>
    </tr>
    
    
     <?php 
    foreach ($array as $key => $value) {
        echo '<tr><td>';
        echo '</td><td>' . $value[0]->mokinioInfo();
        echo $value[0]->trimestroVidurkis() . '</td></tr><br>';
    } 
    ?>
    </table>
</html>