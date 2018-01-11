
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
<?php 

$servername = 'localhost';
$username = 'Auto';
$password = 'LabaiSlaptas123';
$dbname = 'auto';

// create connection

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM radars";


$results_per_page = 10;


$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results/$results_per_page);

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$this_page_first_result = ($page-1)*$results_per_page;

$sql='SELECT *, distance/time * 3.6 AS speed FROM radars LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);

echo "<table>";

while($row = mysqli_fetch_array($result)) {
  echo '<tr><td>' . $row['id'] . '</td><td>' . round($row['date']) . '</td><td>' . $row['number'] . '</td><td>' . 
  $row['distance'] . '</td><td>' . $row['time'] . '</td><td>' . round($row['speed']) . '</td></tr>';
}



for ($i=1;$i<=$number_of_pages;$i++) {
  echo '<a href="index.php?page=' . $i . '"> ' . $i . '</a> ';
}
echo "<ul class='pagination'>";
echo "<li><a href='index.php?page=".($page-1)."' class='button'>Previous</a></li>";
echo "<li><a href='index.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";

$conn->close();