<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../Qalib.php';
echo Qalib::render('main.php',array('n'=>1437,'name'=>'Muhammad'));
 ?>
