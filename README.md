# Namu_darbai

<html>
    <head>
        <title>Puslapio antraštė</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <?php

            $a = ['Jonas', 'Petras', 'Antanas', 'Povilas'];

            for ($i = 0; $i < count($a); $i++) {
                for ($j = $i + 1; $j < count($a); $j++) {
                    echo $a[$i] . "-" . $a[$j] . "<br>";
                }
            }
            echo "<br>";

            for ($i = 0; $i < count($a); $i++) {
                for ($j = 0; $j < count($a); $j++) {
                    if ($i == $j) {
                        continue;
                    } else {
                        echo $a[$i] . " " . $a[$j] . "<br>";
                    }
                }
            }
            
            $c = [
                [1, 3, 4],
                [2, 5],
                [2 => 3, 5 => 8],
                [1, 1, 5 => 1]
            ];

            $d = array();
            
            foreach ($c as $k=>$subArray) {
              foreach ($subArray as $v=>$value) {
                $d[$v]+=$value;
              }
            }
            
            print_r($d);
            echo '<br> Didziausia stulpelio suma yra ' . (max($d));
        
        ?>
    </body>
    
</html>