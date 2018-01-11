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

require_once 'connect.php';
    $conn = connectDB();

    // Puslapiavimas
    $results_per_page = 3;

$sql='SELECT * FROM radars ';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results/$results_per_page);

if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$this_page_first_result = ($page-1)*$results_per_page;




    if (isset($_POST['automobiliai'])) {
        $sql = "SELECT number, COUNT(*) AS kiekis, MAX(distance/time*3.6) AS greitis FROM radars GROUP BY number LIMIT " . $this_page_first_result . "," .  $results_per_page;
        
        $result = $conn->query($sql);
        $number_of_results = mysqli_num_rows($result);
        
        if ($result->num_rows > 0) {
            ?>
            <table>
                <tr>
                    <th>Numeris</th>
                    <th>Kiekis</th>
                    <th>Greitis</th>
                    
                </tr>
            
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    
                    <td><?= $row['number'] ?></td>
                    <td><?= $row['kiekis'] ?></td>
                    <td><?= round($row['greitis']) ?></td>
                
                </tr>
            <?php endwhile; 
            for ($page=1;$page<=$number_of_pages;$page++) {
                echo '<a href="index.php?page=' . $page . '"> ' . $page . '</a> ';
              }?>
            </table>
            <?php
            }
        } 

        if (isset($_POST['rusiuoti'])) {
            $sql = "SELECT *, COUNT(*) AS kiekis, AVG(distance/time) * 3.6 AS vidutinis, 
            MAX(distance/time) * 3.6  as maksimalus, MIN(distance/time) * 3.6  as minimalus 
            FROM radars WHERE YEAR(date) = " . $_POST['metai'] . " AND MONTH(date) = " . $_POST['menuo'];
            
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                ?>
                <table>
                    <tr>
                        <th>Data</th>
                        <th>Kiekis</th>
                        <th>Minimalus km/h</th>
                        <th>Vidutinis km/h</th>
                        <th>Maksimalus km/h</th>
                        
                    </tr>
                
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['kiekis'] ?></td>
                        <td><?= round($row['minimalus']) ?></td>
                        <td><?= round($row['vidutinis']) ?></td>
                        <td><?= round($row['maksimalus']) ?></td>
                    
                    </tr>
                <?php endwhile; ?>
                </table>
                <?php
                } 
            } 

?>

<form method='post'>
    <button name="automobiliai" type="submit">automobiliai</button>
    <input type="text" name="metai" placeholder = "Metai">
    <input type="text" name="menuo" placeholder = "Menuo">
    <button type="submit" name="rusiuoti">Rusiuoti</button>
</form>



</body>
</html>

