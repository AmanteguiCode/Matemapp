<?php
include '../../libs/kimox_framework/query.php';
include '../../libs/kimox_framework/global.php';

checkSession('../login/login.php');

print_r($_SESSION['unit']);

$_SESSION['unit']->addTry();


echo "HOLIWIS";