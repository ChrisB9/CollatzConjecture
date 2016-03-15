<?php
ini_set("display_errors", "1");
error_reporting(E_ALL & ~E_STRICT &~E_NOTICE & ~E_WARNING);
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

require_once 'CollatzCojecture.class.php';

$number = 27;
if (isset($_GET["n"])) {
    $number = $_GET["n"];
}
$adder = 1;
if (isset($_GET["a"])) {
    $adder = $_GET["a"];
}
$bc = 1;
if (isset($_GET["b"])) {
    $bc = $_GET["b"];
}

$test = new \MathTest\CollatzConjecture($number, $adder, $bc);
echo "<pre>", print_r($test->doTheMathWithThe(), true), "</pre>";

/*
$number = readline('$ ');
$cojecture = new MathTest\CollatzConjecture($number);

for ($i=0; $i < count($cojecture->steps); $i++) {
    echo $cojecture[$i]."; ";
    if ($i % 10 == 0) {
        echo "\n";
    }
}
*/
