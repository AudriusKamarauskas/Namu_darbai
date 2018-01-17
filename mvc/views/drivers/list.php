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
        <th>Vardas</th>
        <th>Adresas</th>
        <th></th>
    </tr>

<?php
// output data of each row
$nr = 1;

foreach($drivers as $a): ?>
    <tr>
        <td><?= $nr++ ?></td>
        <td><?= $a->name ?></td>
        <td><?= $a->city ?></td>
    </tr>
<?php endforeach; ?>
</table>

<?php
//  puslapiavimas($puslapis, $pages, $ip);
?>

