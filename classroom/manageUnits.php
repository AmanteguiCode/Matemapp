<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

checkSession('../login/login.php');

$_SESSION['user']->sync();

$actualClassroom = $_SESSION['user']->actualClassroom();

if ($_POST['mode'] == 'add'){
    $result = false;
    foreach ($actualClassroom->students() as $student){
        $result = $result || insertQuery("classroom_didactic", "classroom_id, username, unit_id", "{$actualClassroom->id()}, {$student->username()}, {$_POST['unitId']}", connect());
    }
    echo $result;
} else if ($_POST['mode'] == 'remove'){
    echo deleteQuery("classroom_didactic", "unit_id = {$_POST['unitId']} AND classroom_id = {$actualClassroom->id()}", connect());
} else if ($_POST['mode'] == 'show'){
    updateQuery("visible", "1", "classroom_didactic", "unit_id = {$_POST['unitId']} AND classroom_id = {$actualClassroom->id()}", connect());
    echo true;
} else if ($_POST['mode'] == 'hidde'){
    return updateQuery("visible", "0", "classroom_didactic", "unit_id = {$_POST['unitId']} AND classroom_id = {$actualClassroom->id()}", connect());
} else{
    echo false;
}