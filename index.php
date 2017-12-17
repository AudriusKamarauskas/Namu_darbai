<!DOCTYPE html>
<html>
    <head>
        <title>Puslapio antraštė</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <?php
            function arrayAverage($array) 
            {
                $sum = 0;
                for ($i = 0; $i < count($array); $i++) {
                    $sum += $array[$i];
                }

                $average = $sum / count($array);

                return $average;
            }

            $a = [5, 6, 10, 15];
            $b = [8, 5, 3, 25];

            echo arrayAverage($a) - arrayAverage($b) . '<br>';
            
            function isPerfectNumber($n)
            {
                $i = 1;
                $sum = 0;
                  
                while ($i < $n)
                {
                    if ($n % $i == 0)
                    {
                        $sum = $sum + $i; 
                    }
                    $i++;
                }
                return $sum == $n;
            }
             
            for ($n = 1; $n <= 1000; $n++) {
              
            if (isPerfectNumber($n))
                echo $n . " Yra tobulas skaicius <br>";
            }
        ?>
    </body>
    
</html>