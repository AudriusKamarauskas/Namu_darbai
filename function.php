<?php
function lentele($array){
    foreach ($array as $info) {
        echo '<tr><td>' . $info->date . '</td>';
        echo '<td>' . $info->time . '</td>';
        echo '<td>' . $info->carNumber . '</td>';
        echo '<td>' . $info->distance . '</td>';
        echo '<td>' . $info->time2 . '</td>';
        echo '<td>' . $info->greitis() . '</td></tr>';
    }
}
