<?php 

$servername = 'localhost';
$username = 'Auto';
$password = 'LabaiSlaptas123';
$dbname = 'auto';

// create connection

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM radars ORDER BY distance/time*3.6 DESC, id DESC LIMIT 10 OFFSET 10";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $greitis = $row['distance'] / $row['time'] * 3.6;
        $greitis = round($greitis);
        print_r ($row);
        echo $greitis . '<br>';
        
        
    }
    } else {
        echo "0 results";
    }

?>


<form action="http://localhost/01.03/">
    <input type="submit" style="width:100px; height: 50px" value = "next">

</form>

    
    <?php


$conn->close();