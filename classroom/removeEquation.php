<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

checkSession('../login/login.php');

$equation = $_POST['equation'];

$actualClassroom = $_SESSION['user']->actualClassroom();

$result = array("success" => 0);

if ($actualClassroom != null){
    $result['success'] = deleteQuery("classroom_equation", "equation = '{$equation}' AND classroom_id = {$actualClassroom->id()}", connect());
}

echo json_encode($result);