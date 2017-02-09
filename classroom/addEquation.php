<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

checkSession('../login/login.php');

$_SESSION['user']->sync();

$mode = $_POST['mode'];
$terms = $_POST['terms'];
$actualClassroom = $_SESSION['user']->actualClassroom();

$result = array("success" => 0, "equation" => null, "mode" => $mode, "terms" => $terms);

if ($actualClassroom != null){
    $generator = new EquationGenerator($terms, $mode);

    $equation = $generator->generate();

    $success = false;

    foreach ($actualClassroom->students() as $student){
        $success = $success || insertQuery("classroom_equation", "classroom_id, username, equation, mode, terms", "{$actualClassroom->id()}, {$student->username()}, {$equation->toString()}, {$mode}, {$terms}", connect());
    }

    $result['equation'] = $equation->toString();
    $result['success'] = $success ? 1 : 0;

}

echo json_encode($result);