# Namu_darbai

<!DOCTYPE html>
<html>
    <head>
        <title>Puslapio antraštė</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <?php


            $zmones = [
                ['vardas' => 'Jonas',  'lytis' => 'V'],
                ['vardas' => 'Ona',    'lytis' => 'M'],
                ['vardas' => 'Petras', 'lytis' => 'V'],
                ['vardas' => 'Maryte', 'lytis' => 'M'],
                ['vardas' => 'Egle',   'lytis' => 'M']
            ];


            function uzd1($zmones)
            {
                for ($i = 0; $i < count($zmones); $i++) {
                    for ($j = $i; $j < count($zmones); $j++) {
                        if ($zmones[$i]["lytis"] !== $zmones[$j]["lytis"]) {
                            print_r($zmones[$i]["vardas"] . " - " . $zmones[$j]["vardas"]);
                            echo "<br>";
                        }
                    }
                }
            }
            uzd1($zmones);
            echo '<br>';

            $mokiniai = [
                ['vardas' => 'Jonas', 'pazymiai' => [
                'lietuviu' => [4, 8, 6, 7], 
                'anglu' => [6, 7, 8],
                'matematika' => [3, 5, 4]]],
                ['vardas' => 'Ona', 'pazymiai' => [
                'lietuviu' => [10, 9, 10], 
                'anglu' => [9, 8, 10],
                'matematika' => [10, 10, 9, 9]]],
                ];
        
                $jonovidsuma = 0;
                $onosvidsuma = 0;
        
                foreach($mokiniai as $value) {
                    echo $value['vardas'].'<br>'.'<br>';
                    
                    foreach($value['pazymiai'] as $key => $subvalue){
        
                        $daliklis = count($value['pazymiai'][$key]);
        
                        $result = round(array_sum($value['pazymiai'][$key]) / $daliklis);
        
                        echo $key.' vidurkis : '.$result.'<br>';
        
                        if ($value['vardas'] == 'Jonas') {
                            $jonovidsuma += $result;
                        } else {
                            $onosvidsuma += $result;
                        }         
                        
                    }
                                
                }
        
                echo '<br>';
            
                if ($jonovidsuma > $onosvidsuma) {
                    echo 'Jonas mokosi geriausiai!';
                } else {
                    echo 'Ona mokosi geriausiai!';
                }
    ?>
    
</html>