<?php
require_once $dir . '/models/drivers.php';

$puslapis = @$_GET['puslapis'];

$ip = 10;

if ($puslapis < 1) {
    $puslapis = 0;
}

$pages = Driver::getTotal();

$drivers = Driver::all($ip, $ip * $puslapis);

include $dir . '/views/drivers/list.php';