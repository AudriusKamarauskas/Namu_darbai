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

<table>
    <tr>
        <th>Nr</th>
        <th>Numeris</th>
        <th>Data</th>
        <th>Greitis (km/h)</th>
        <th>Vairuotojo ID</th>
        <th>Veiksmai</th>
        <th></th>
    </tr>

<?php
// output data of each row
$nr = 1;
foreach($radars as $a): ?>
    <tr>
        <td><?= $nr++ ?></td>
        <td><?= $a->number ?></td>
        <td><?= $a->date ?></td>
        <td><?= $a->speed ?></td>
        <td><?= $a->driverId ?></td>
        <td>
            <a href="<?= $base ?>radars/edit?id=<?= $a->id ?>">Redaguoti</a> 
            <a href="<?= $base ?>radars/delete?id=<?= $a->id ?>">Trinti</a> 
        </td>
    </tr>
<?php endforeach; ?>
</table>

<?php
// puslapiavimas($puslapis, $pages, $ip);
?>
