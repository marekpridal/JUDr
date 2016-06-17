<?php
    include_once "dibi-3.0.4/src/loader.php";

dibi::connect([
    'driver'   => 'mysql',
    'host'     => 'localhost',
    'username' => 'root',
    'database' => 'spisy',
    'charset'  => 'utf8',
]);
?>