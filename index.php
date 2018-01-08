
        <?php

            $a = [
                200,
                35,
                3,
                5,
                55,
                6,
                140,
                8
               ];

            $x = 0;
            $y = 0;
            $z = 0;
            $q = 0;

            for($i = 0; $i < count($a); $i++) {
                    $x = $x += $a[$i] / count($a);
            }

            echo 'Vidutine masyvo elementu reiksme yra ' . $x . '<br>';

            for ($i = 0; $i <count($a); $i++) {
                if ($a[$i] % 2 == 0) {
                    $y = $y += $a[$i];
                }
            }
            echo 'Masyvo lyginiu elementu suma yra ' . $y . '<br>';

            sort($a);

            for ($i = 0; $i < count($a); $i++) {
                echo $a[$i] . ', ';
            }
            echo '<br>';

            $b = [
                [3, 5, 7, 9, 11], 
                [10, 20, 30, 40, 50], 
                [50, 100, 150, 200, 250],
                [100, 200, 300, 400, 500],
                [200, 400, 600, 800, 1000]
            ];

            $result = $b;

            foreach($b[0] as $k => $v)
                $result[$k] = array_sum(array_column($b, $k));

                print_r($result);
                echo '<br> Didziausio stulpelio suma yra ';
                print_r(max($result));
                
                for ($i = 0; $i < count($b); $i++) {
                    $z = $z += $b[$i][$i];
                }

                echo '<br> Pirmos istrizaines suma yra ' . $z;

                for ($i = 0; $i < count($b); $i++) {
                    $q = $q += array_reverse ($b)[$i][$i];
                }
                
                echo '<br> Antros istrizaines suma yra ' . $q;
                
        ?>

