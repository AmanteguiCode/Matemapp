<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

checkSession('../login/login.php');

deleteQuery("student_classroom", "username='{$_POST['username']}' AND id_classroom={$_POST['classroom']}", connect());
deleteQuery("classroom_didactic", "username = '{$_POST['username']}' AND classroom_id = {$_POST['classroom']}", connect());
deleteQuery("classroom_equation", "username = '{$_POST['username']}' AND classroom_id = {$_POST['classroom']}", connect());

echo true;