<?php
include_once "singleton.php";
$test = DatabaseConnetion::getInstance();

$test->connect();

$a = $test->query("Select test From teste");

print_r($a);