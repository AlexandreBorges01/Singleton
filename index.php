<?php
include_once "singleton.php";
$test = DatabaseConnetion::getInstance();

$test->connect();

$a = $test->query("Select * From test");

print_r($a);