<?php

include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

session_start();

if (!isset($_SESSION['credentials']))
    header('Location: ../index.php');

unset($_SESSION['user']);
unset($_SESSION['game']);
unset($_SESSION['achievements']);
unset($_SESSION['achievement']);
unset($_SESSION['duel']);
unset($_SESSION['game']);
unset($_SESSION['unit']);
unset($_SESSION['notifications']);
if (isset($_POST["submit"])) {

    $gdb = connect();
    $query = setQuery("username, password, isTeacher", "user", "username='{$_POST['username']}'", $gdb);

    if (strcmp($query[0]['username'], $_POST['username']) == 0 && strcmp(decrypt_pass($query[0]['password']), $_POST['password']) == 0) {
        $_SESSION['achievements'] = Achievement::achievements();
        $_SESSION['user'] = $query[0]['isTeacher'] ? new Teacher($query[0]['username']) : new Student($query[0]['username']);
        header('Location: ../init/index.php');
    }

}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>MateMapp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="../img/MatemApp_Logo_Empty.png">
    <link href="https://cdn.rawgit.com/band-x-media/SASS-Material-Design-for-Bootstrap/master/dist/material-bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.rawgit.com/band-x-media/SASS-Material-Design-for-Bootstrap/master/dist/material-bootstrap.min.js"></script>

</head>
<body>
<div class="container text-center center-block">
    <img style="max-width: 400px; width: 100%" class="img-responsive center-block" src="../img/MatemApp%20Logo.png" alt="Logo">
    <div id="login-menu" class="col-md-offset-4 col-md-4 text-left">

        <form method="POST" class="col-md-offset-1 col-md-10">
            <input class="form-control" type="text" placeholder="Usuario" autofocus name="username">
            <br>
            <input class="form-control" type="password" placeholder="Contraseña" name="password">
            <br>
            <input class="btn btn-danger" type="submit" value="Entrar" name="submit"> <span style="margin-top: -5px" class="pull-right"><a href="../support/recovery.php">¿Ha olvidado su contraseña?</a>
                    <br><a href="../login/register.php">¿No tienes cuenta?</a></span>
        </form>

    </div>
</div>
</body>
</html>