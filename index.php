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
    </head>
    
    <body>
        <?php

            $trikampiai = [
                [3, 4, 5],
                [2, 10, 8],
                [5, 6, 5],
                [5, 5, 5]
            ];

            function lygiasonioPlotas($a, $b, $c) {
                if ($a == $b){
                    $z = sqrt($a * $a - $b / 2 * $b / 2) * 2;
                return $z;
            }
                elseif ($b == $c){
                    $z = sqrt($a * $a - $b / 2 * $b / 2) * 2;
                return $z;
            }
            elseif ($a == $c){
                $z = sqrt($a * $a - $b / 2 * $b / 2) * 2;
            return $z;
            }
            }
          
            function doesExist($a, $b, $c) {
                if ($a + $b > $c && $b + $c > $a && $a + $c > $b)
                return true;
            else
                return false;
            }
            
            function ivairiakrascioPlotas($a, $b, $c) {
                $x = ($a += $b += $c) / 2;
                $y = sqrt($x * ($x - 3) * ($x -4) * ($x -5));
                return $y;
            }
            

            for ($i = 0; $i < count($trikampiai); $i++) {
                $a = $trikampiai[$i][0];
                $b = $trikampiai[$i][1];
                $c = $trikampiai[$i][2];
                
                if(doesExist($a, $b, $c) && $a == $b && $a == $c) 
                    echo ' Trikampis egzistuoja ir yra lygiakraštis, o jo plotas yra ' . 0.43301 * $a * $a . '<br>';
                elseif (doesExist($a, $b, $c) && $a == $b || $a == $c || $b == $c)
                    echo 'Trikampis egzistuoja ir yra lygiašonis, o jo plotas yra '
                     . lygiasonioPlotas($a, $b, $c) . '<br>';
                elseif (doesExist($a, $b, $c) && $a != $b && $a != $c && $b != $c)
                    echo 'Trikampis egzistuoja ir yra įvairiakraštis, o jo plotas yra ' . ivairiakrascioPlotas($a, $b, $c) . '<br>';
                    else echo 'Trikampis neegzistuoja <br>';
                     
            }  

        ?>

    </body>
    
</html>