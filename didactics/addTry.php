<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

checkSession('../login/login.php');


$_SESSION['unit']->addTry();

print_r($_SESSION['unit']);