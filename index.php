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
    include 'functions.php';
    include 'arrays.php';

    ?>
    <table>
    <tr>
      <th>Mokinio vardas, pavarde, amzius</th>
      <th>amzius</th>
    </tr>
    
    
     <?php 
    foreach ($array as $key => $value) {
        $gimtadienis = $value[0]->gimimoData;
        $gimtadienis = explode("/", $gimtadienis);
        $amzius = (date("md", date("U", mktime(0, 0, 0, $gimtadienis[0], $gimtadienis[1], $gimtadienis[2]))) > date("md")
          ? ((date("Y") - $gimtadienis[2]) - 1)
          : (date("Y") - $gimtadienis[2]));
          if ($amzius >= 18) {
        echo '<tr><td>';
        echo '</td><td>' . $value[0]->mokiniai() . $amzius . ' metu .' . '</td></tr><br>';}
    } 
    ?>
    </table>
</html>