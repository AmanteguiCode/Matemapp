<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

checkSession('../login/login.php');


echo updateQuery("name", "{$_POST['newName']}", "user", "username='{$_POST['username']}'", connect());
