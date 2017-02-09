<?php

include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';
include '../libs/phpmailer/class.phpmailer.php';

session_start();

$_SESSION['credentials'] = array('dsn' => 'mysql:host=db623787019.db.1and1.com; dbname=db623787019; charset=utf8', 'username' => 'dbo623787019', 'password' => 'MateMapp2016');

if (!isset($_SESSION['credentials']))
    header('Location: ../index.php');

unset($_SESSION['user']);

$error = false;
$inserted = false;

if (isset($_POST["submit"])) {

    $gdb = connect();

    if ($_POST['username'] == "ahsjer55" && $_POST['password'] == "kfdjfiehjwdf33kwe*") {
        $request = setQuery("*", "request", "id='{$_POST['code']}'", $gdb);
        if ($request != false) {
            $teacher = Teacher::create($request[0]['name'], $request[0]['username'], $request[0]['email'], $request[0]['password']);
            $inserted = $teacher != false;
            if ($inserted) {
                deleteQuery("request", "id='{$_POST['code']}'", $gdb);
                $mail = new PHPMailer();

                $mail->CharSet = 'UTF-8';//cambiar  correo
                $mail->addAddress($teacher->email(), $teacher->name());

                $mail->From = "kimoxstudio@gmail.com";
                $mail->FromName = "Soporte MateMapp";
                $mail->Subject = "Solicitud aceptada";

                $text = "Tu solicitud como profesor ha sido aceptada.";

                $mail->Body = $text;
                $mail->send();
            }
        } else {
            $error = true;
        }
    }

}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>MateMapp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="../css/bootstrap/material-bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.rawgit.com/band-x-media/SASS-Material-Design-for-Bootstrap/master/dist/material-bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js"></script>
    <link rel="stylesheet" href="../css/style.css"/>
    <script>
        $(window).load(function () {
            $('head').append('<link rel="shortcut icon" type="image/png" href="../img/favicon.png">');
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css">

</head>
<body>
<div class="container text-center center-block">
    <?php
    if (!$inserted && !$error) {
        ?>
    <img style="max-width: 400px; width: 100%" class="img-responsive center-block" src="../img/MatemApp%20Logo.png"
         alt="Logo">
        <div id="login-menu" class="col-md-offset-4 col-md-4 text-left">
            <div>
                <form method="POST" class="col-md-offset-1 col-md-10">
                    <input class="form-control" type="text" placeholder="Usuario" autofocus name="username">
                    <br>
                    <input class="form-control" type="password" placeholder="Contraseña" name="password">
                    <br>
                    <input type="hidden" name="code" value="<?php echo $_GET['id'] ?>">
                    <input class="btn btn-danger" type="submit" value="Entrar" name="submit"> <span
                        style="margin-top: 5px" class="pull-right"><a href="../support/recovery.php">¿Ha olvidado su
                            contraseña?</a></span>
                </form>
            </div>
        </div>
    <?php
    } else {
    if ($error){
    ?>
        <h2 class="text-center">No se ha encontrado ningúna solicitud...</h2>
        <h4 class="text-center">Redirigiendo...</h4>

        <script>
            window.setTimeout(function () {
                window.location = "../login/login.php";
            }, 2000);
        </script>
    <?php
    }else{
    ?>
        <h2 class="text-center">El profesor ha sido aceptado...</h2>
        <h4 class="text-center">Redirigiendo...</h4>

        <script>
            window.setTimeout(function () {
                window.location = "../login/login.php";
            }, 2000);
        </script>
        <?php
    }
    }
    ?>
</div>
</body>
</html>