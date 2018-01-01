<?php
include_once 'classes.php';
include_once 'arrays.php';


usort ($array, function ($a, $b) {
    return ($a->greitis() < $b->greitis());
});
echo '<pre>' . var_export($array, true) . '</pre>';

echo $array[0]->greitis() * 3.6 . " Km/h <br>";
echo $array[1]->greitis() * 3.6 . " Km/h <br>";
echo $array[2]->greitis() * 3.6 . " Km/h <br>";
echo $array[3]->greitis() * 3.6 . " Km/h <br>";
        
?> 
