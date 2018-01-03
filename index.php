<?php
session_start();
include_once 'classes.php';



?>
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
<h3>Lenktynes</h3>
<style>
    input {
        margin: 5px;
    }
</style>
<form method = "post">
    <input name = "date" type = "date"> <input name = "time" type = "text" placeholder = "laikas 00:00:00"><br>
    <input name = "carNumber" type = "text" placeholder = "Masinos numeriai"><br>
    <input name = "distance" type = "text" placeholder = "atstumas metrais"><br>
    <input name = "time2" type = "text" placeholder = "sugaistas laikas sekundemis"><br>
    <input type = "submit" value="vaziuoti"><br>
 </form >

<table>
    <tr>
        <th>Data</th>
        <th>Valandos</th>
        <th>Numeris</th>
        <th>Atstumas</th>
        <th>Laikas</th>
        <th>Greitis km/h</th>
    </tr>


<?php 
if (!empty($_POST)){
    $_SESSION['date'][]=$_POST; 
}

if (!empty($_SESSION['date'])){
    $array = [];
    foreach ($_SESSION['date'] as $value){
        $array[] = new Radar($value['date'], $value['time'], $value['carNumber'], 
        $value ['distance'], $value['time2']);
    }
    
    usort($array, function ($p1, $p2){
        return ($p1->greitis() < $p2->greitis());
    });  
    foreach ($_SESSION['date'] as $value){
        echo '<tr><td>' . $value['date'] . '</td><td>' . $value['time'] . 
        '</td><td>' . $value['carNumber'] . '</td><td>' . $value ['distance'] . 
        '</td><td>'. $value['time2']. '</td><td>' . $value['distance'] / $value['time2'] * 3.6 . '</td></tr><br>';
    }

    
}
?></table>