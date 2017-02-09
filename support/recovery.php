<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';
include '../libs/phpmailer/class.phpmailer.php';

session_start();
unset($_SESSION['user']);

if (isset($_POST["submit"])) {
    $gdb = connect();
    $user = $_POST['username'];
    $query = setQuery('*', 'user', "username = '{$user}'", $gdb);
    if ($query != false) {

        $mail = new PHPMailer();

        $mail->CharSet = 'UTF-8';//cambiar  correo
        $mail->addAddress($query[0]['email'], $query[0]['name']);

        $mail->From = "kimoxstudio@gmail.com";
        $mail->FromName = "Soporte MateMapp";
        $mail->Subject = "Olvido su contraseña";

        $text = "\r\r\nHola ". $query[0]['name'] . ", \r\n\r\n se ha solicitado la recuperación de su contraseña. si no ha sido usted pongase en contacto con el administrador. \r\n Contraseña: " . decrypt_pass($query[0]['password'])  ;

        $mail->Body = $text;
        $mail->send();
    } else {
        echo "<script type='text/javascript'>alert('EL usuario no existe');</script>";
    }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>CataPark C.C. El Muelle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <link rel="stylesheet" href="../css/bootstrap/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap/material-bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="../img/favicon.png">

    <script src="../util.js"></script>
</head>
<body onload="getBrowser()">
<div class="container center-block text-center">
    <img style="max-width: 400px; width: 100%" class="center-block" src="../img/MatemApp%20Logo.png" alt="Logo">
    <div class="col-md-offset-4 col-md-4 text-left">
            <h3 style="margin-top: 0px;" class="text-center">Recuperar contraseña</h3>
            <form method="POST">
                <input class="form-control text-left" type="text" placeholder="Usuario" autofocus name="username">
                <br>
                <input class="btn btn-primary" type="submit" value="Enviar" name="submit">
                <span style="margin-top: 5px; margin-left: 15px;" ><a href="../../index.php">¿Ha recordado su contraseña?</a></span>

            </form>
    </div>
</div>
</body>
</html>