<!DOCTYPE html>
<html>
    <head>
        <title>Puslapio antraštė</title>
        <meta charset="utf-8">
<!--        Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
<!--        Styles-->
        <link rel="stylesheet" type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="style.css?v=3">
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
        
    </head>
    
    <body>
        <?php

        $x = 0;
        $sum = 0;
            while ($x < 100) {
               
               $sum += $x;
               $x++;
            }

            echo $sum . '<br>';

            function skyrius() {
                echo '<hr>';
                echo '<h1>SKYRIUS</h1>';
                echo '<br>';
            }

            skyrius();
            skyrius();

            function faktorialas($a) {
                if ($a == 1) {
                    return $a;
                } else {
                    return $a * faktorialas($a - 1);
                }
            }

            echo '3!='. faktorialas(3). '<br>';
            echo '10!='. faktorialas(10). '<br>';
// Pasisveikinimas
            function hello($vardas, $pavarde) {
                echo 'Labas! ' . $vardas . ' ' . $pavarde;
            }
            hello('Audrius', 'Kamarauskas');

            function arrayAverage($array) 
            {
                $sum = 0;
                for ($i = 0; $i < count($array); $i++) {
                    $sum += $array[$i];
                }

                $average = $sum / count($array);

                return $average;
            }

            $array = [1, 2, 4];

            echo arrayAverage($array);

            $array = [
                [
                    'Audrius',
                    'Kamarauskas',
                    'kamarauskas.aud@gmail.com'
                ],
                [   'Jonas',
                    'Jonaitis',
                    'Jonas@gmail.com'
                ]
            ];

            function peopleInfo(array $array) 
            {
                for ($i = 0; $i <count($array); $i++) {
                    echo '<tr>';
                    for ($j = 0; $j < count($array[$i]); $j++) {
                        echo '<td>' . $array[$i][$j] . '</td>';
                        
                    }
                }echo '</tr>';
            }

            
        ?>

        <table>
            <th>
                <tr>
                    <td>Vardas</td>
                    <td>Pavarde</td>
                    <td>El. Pastas</td>
                </tr>
            </th>
        </<table>
        <?php peopleInfo($array) ?>
        

    </body>
    
</html>