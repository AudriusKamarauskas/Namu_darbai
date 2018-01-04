<?php
session_start();
include_once 'classes.php';
include_once 'function.php';

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


<?php 
if (!empty($_POST) && !empty($_POST['date']) && !empty($_POST['time']) && 
!empty($_POST['carNumber']) && !empty($_POST['distance']) && !empty($_POST['time2'])){
    $_SESSION['date'][]=$_POST; 
    echo '<script>window.location=window.location;</script>'; exit();
}

if (!empty($_SESSION['date'])){
    $array = [];
    foreach ($_SESSION['date'] as $value){
        if (!empty($_POST) && $_POST['filtras']!=''){
            if (!preg_match('/('.preg_quote($_POST['filtras'],'/').')/i',$value['carNumber'])){
                continue;
            }
        }
        
        $array[] = new Radar($value['date'], $value['time'], $value['carNumber'], 
            $value['distance'], $value['time2']);
    }
    
    usort($array, function ($p1, $p2){
        return ($p1->greitis() < $p2->greitis());
    });  
}

?>

<form method = "post">
<input name = "date" type = "date"> <input name = "time" type = "text" placeholder = "laikas 00:00:00"><br>
<input name = "carNumber" type = "text" placeholder = "Masinos numeriai"><br>
<input name = "distance" type = "text" placeholder = "atstumas metrais"><br>
<input name = "time2" type = "text" placeholder = "sugaistas laikas sekundemis"><br>
<input type = "submit" value="vaziuoti"><br>
</form >
<form method="post">
    <input name="filtras" placeholder="Filtro tekstas" type="text" value="<?php if (isset($_POST['filtras'])) echo $_POST['filtras'] ?>">
    <input type="submit" value="Filtruoti">
</form>

<table>
    <tr>
        <th>Data</th>
        <th>Valandos</th>
        <th>Numeris</th>
        <th>Atstumas</th>
        <th>Laikas</th>
        <th>Greitis km/h</th>
    </tr>
    <tr>
    <?php lentele($array); ?>
    </tr>

</table>