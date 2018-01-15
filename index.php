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

    if (isset($_GET['delete'])) {
        $sql = "DELETE FROM radars WHERE id = ". intval($_GET['delete']);
        $conn->query($sql);
    }

    $row = [];
    if (isset($_GET['edit'])) {
        $sql = "SELECT * FROM radars WHERE id = ". intval($_GET['edit']);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();   
        }
    }

    if (isset($_POST['save'])) {
        if (intval($_POST['id']) > 0) {
            $stmt = $conn->prepare('UPDATE radars set date = ?, number = ?, distance = ?, time = ?, driverId = ? WHERE id = ?');
            $stmt->bind_param('ssddii', $_REQUEST['date'], $_REQUEST['number'], $_REQUEST['distance'], $_REQUEST['time'], $_REQUEST['driverId'], $_REQUEST['id']);
            $stmt->execute();
        } else {
            $stmt = $conn->prepare("INSERT INTO radars(date, number, distance, time) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssdd", $_REQUEST['date'], $_REQUEST['number'], $_REQUEST['distance'], $_REQUEST['time']);
            $stmt->execute();
        }
    }

    if (isset($_POST['irasyti'])) {
        $stmt = $conn->prepare("INSERT INTO drivers(name, city) VALUES (?, ?)");
        $stmt->bind_param("ss", $_REQUEST['name'], $_REQUEST['city']);
        $stmt->execute();
    }

    
?>

<form method='post'>
    <input type='hidden' name='id' required value="<?= $row['id'] ?>">
    <input type='text' name='date' placeholder = 'data' required value="<?= $row['date'] ?>"><br>
    <input type='text' name='number' placeholder = 'numeris' required value="<?= $row['number'] ?>"><br>
    <input type='number' name='distance' placeholder = 'distancija' required value="<?= $row['distance'] ?>"><br>
    <input type='number' name='time' placeholder = 'laikas' required value="<?= $row['time'] ?>">
    <?php 
    $sql = "SELECT * FROM radars";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
        <select onchange="window.location.href=this.value;">
            <?php while ($row = $result->fetch_assoc()) {
               echo '<option value=?edit=' . $row['id'] . '>' . $row['number'] . '</option>';
            } ?>
        </select>
        <?php
    }
    $sql = "SELECT * FROM drivers";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>

        <select name="driverId">
            <?php while ($row = $result->fetch_assoc()) {
               echo '<option value=' . $row['driverId'] . '>' . $row['name'] . '</option>';
            } ?>
        </select> <?php } ?>
    <button name="save" type="submit">Išsaugoti</button>
</form>
<form method='post'>
    <input type='hidden' name='id2' required value="<?= $row['id'] ?>">
    <input type='text' name='name' placeholder = 'vardas, pavarde'><br>
    <input type='text' name='city' placeholder = 'miestas'><br>
    <button name="irasyti" type="submit">Išsaugoti</button>
</form>

<hr>

<?php

    $sql = 'SELECT *, `distance`/`time`*3.6 as `speed` FROM radars ORDER BY id DESC';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Numeris</th>
                <th>Data</th>
                <th>Atstumas (km)</th>
                <th>Laikas (h)</th>
                <th>Vairuotojo ID</th>
                <th>Greitis (km/h)</th>
                <th>Veiksmai</th>
            </tr>
        
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['number'] ?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['distance'] ?></td>
                <td><?= $row['time'] ?></td>
                <td><?= $row['driverId'] ?></td>
                <td><?= round($row['speed']) ?></td>
                <td>
                    <a href="?edit=<?= $row['id'] ?>">Taisyti</a>
                    <a href="?delete=<?= $row['id'] ?>">Trinti</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </table>
        <?php
    } else {
        echo 'nėra duomenų';
    }

        ?>
        
</body>
</html>

    