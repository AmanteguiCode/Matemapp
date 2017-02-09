<?php

include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';
include '../libs/phpmailer/class.phpmailer.php';

session_start();

if (!isset($_SESSION['credentials']))
    header('Location: ../index.php');

unset($_SESSION['user']);

$gdb = connect();
$insert = false;
$error = false;

if (isset($_POST["student"])) {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = crypt_pass($_POST["studentPass"]);
    $confirmPassword = crypt_pass($_POST["confirmPassword"]);

    $existAsRequest = setQuery("COUNT(*)", "request", "username='{$username}'", connect())[0]['COUNT(*)'] == 1;
    $existAsUser = User::exists($username);
    $emailExists = User::emailExists($email);

    if (!$existAsRequest && !$existAsUser && !$emailExists) {
        insertQuery("user", "username, name, email, password", "{$username},{$name},{$email},{$password}", connect());
        $insert = true;
    }else{
        $error = true;
    }
} else if (isset($_POST["teacher"])) {
    $id = generateRandomString(100);
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $code = $_POST["code"];
    $password = crypt_pass($_POST["teacherPass"]);
    $confirmPassword = crypt_pass($_POST["confirmPassword"]);

    $existAsRequest = setQuery("COUNT(*)", "request", "username='{$username}'", connect())[0]['COUNT(*)'] == 1;
    $existAsUser = User::exists($username);

    if (!$existAsRequest && !$existAsUser) {
        insertQuery("request", "id, name, username, email, password, code", "{$id}, {$name}, {$username}, {$email}, {$password}, {$code}", connect());

        $insert = true;

        $mail = new PHPMailer();

        $mail->CharSet = 'UTF-8';//cambiar  correo
        $mail->addAddress("borja.ruiz.amantegui@gmail.com", "Kimox Studio"); //cambiar  correo

        $mail->From = $email; //cambiar
        $mail->FromName = "Soporte MateMapp";
        $mail->Subject = "Nueva solicitud - MateMapp";

        $text = "El profesor {$name}, ha solicitado confirmación del registro.
                 \r\n\r\nDatos:\r\nNombre: {$name}\r\nUsuario: {$username}\r\nEmail: {$email}\r\nCódigo institucional: {$code}\r\n\r\nSi deseas dar de alta a este usuario:\r\nwww.matemapp.adrianmujica.es/request/accept.php?id={$id}";
        $mail->Body = $text;
        $mail->send();
    }else{
        $error = true;
    }
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>MateMapp - Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/umd/collapse.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.transition/1.7.2/jquery.transition.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="../img/MatemApp_Logo_Empty.png">
    <link rel="stylesheet" href="../css/bootstrap/material-bootstrap.min.css" >
    <script type="text/javascript" src="https://cdn.rawgit.com/band-x-media/SASS-Material-Design-for-Bootstrap/master/dist/material-bootstrap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <style>
        input{
            margin-top: 5px;
        }
        input[type=submit]{
            margin-top: 15px;
        }
    </style>
</head>
<body>

<?php
if (!$insert) {
    ?>
    <div class="container text-center center-block">
        <img style="max-width: 400px; width: 100%" class="img-responsive center-block" src="../img/MatemApp%20Logo.png"
             alt="Logo">
        <div
            style="padding-bottom: 10px; padding-top: 10px; margin-bottom: 10px;"
            id="register-menu"
            class="col-md-offset-4 col-md-4 text-left">
            <?php
            $header = isset($_POST['teacher']) ? "Profesor" : "";
            $header = isset($_POST['student']) ? "Estudiante" : "";

            if ($error) {
                ?>
                <div id="alert" class="alert alert-warning text-center fade in">
                    <a class="close" onclick="$('#alert').attr('hidden', 'hidden')"
                       aria-label="close">&times;</a>
                    <strong>Usuario o correo duplicado.</strong>
                </div>
                <?php
            }
            ?>
            <h2 id="rol-title" class="text-center"><?php echo $header ?></h2>

            <div style="margin-top: 20px;">

                <div id="student" class="panel-collapse collapse <?php echo isset($_POST['student']) ? "in" : "" ?>"
                     role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body form-group material">
                        <form id="student-form" method="POST" class="col-md-offset-1 col-md-10">
                            <input data-rule-required="true" value="<?php echo isset($_POST['student']) && isset($_POST['name']) ? $_POST['name'] : "" ?>"
                                   class="form-control" type="text" placeholder="Tu nombre" name="name">

                            <input data-rule-required="true" value="<?php echo isset($_POST['student']) && isset($_POST['username']) ? $_POST['username'] : "" ?>"
                                   class="form-control" type="text" placeholder="Usuario" name="username">

                            <input data-rule-required="true" data-rule-email="true" value="<?php echo isset($_POST['student']) && isset($_POST['email']) ? $_POST['email'] : "" ?>"
                                   class="form-control" type="email" placeholder="Correo" name="email">

                            <input data-rule-required="true" value="<?php echo isset($_POST['student']) && isset($_POST['password']) ? $_POST['password'] : "" ?>"
                                   class="form-control" type="password" placeholder="Contraseña" name="studentPass">

                            <input data-rule-required="true" data-rule-equalto="#studentPass" value="<?php echo isset($_POST['student']) && isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : "" ?>"
                                   class="form-control" type="password" placeholder="Repetir contraseña"
                                   name="confirmPassword">

                            <input id="studentInput" class="btn btn-primary col-xs-12" type="submit"
                                   value="Registrarme"
                                   name="student">
                        </form>
                    </div>
                </div>

                <div id="teacher" class="panel-collapse collapse <?php echo isset($_POST['teacher']) ? "in" : "" ?>"
                     role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body form-group material">
                        <form id="teacher-form" method="POST" class="col-md-offset-1 col-md-10">
                            <input data-rule-required="true" value="<?php echo isset($_POST['teacher']) && isset($_POST['name']) ? $_POST['name'] : "" ?>"
                                   class="form-control" type="text" placeholder="Tu nombre" name="name">

                            <input data-rule-required="true" value="<?php echo isset($_POST['teacher']) && isset($_POST['username']) ? $_POST['username'] : "" ?>"
                                   class="form-control" type="text" placeholder="Usuario" name="username">

                            <input data-rule-required="true" data-rule-email="true" value="<?php echo isset($_POST['teacher']) && isset($_POST['email']) ? $_POST['email'] : "" ?>"
                                   class="form-control" type="email" placeholder="Correo" name="email">

                            <input data-rule-required="true" value="<?php echo isset($_POST['teacher']) && isset($_POST['code']) ? $_POST['code'] : "" ?>"
                                   class="form-control" type="password" placeholder="Código institucional"
                                   name="code">

                            <input data-rule-required="true" value="<?php echo isset($_POST['teacher']) && isset($_POST['password']) ? $_POST['password'] : "" ?>"
                                   class="form-control" type="password" placeholder="Contraseña" name="teacherPass">

                            <input data-rule-required="true" data-rule-equalto="#teacherPass" value="<?php echo isset($_POST['teacher']) && isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : "" ?>"
                                   class="form-control" type="password" placeholder="Repetir contraseña"
                                   name="confirmPassword">

                            <input id="teacherInput" class="btn btn-primary text-center col-xs-12" type="submit"
                                   value="Solicitar"
                                   name="teacher">
                        </form>
                    </div>
                </div>
                <?php if(!$error){ ?>
                    <p class="text-center"><a class="btn-link text-center" onclick="hideForm()" href="#">¿Qué eres?</a></p>
                <?php } ?>
                <p class="text-center"><a class="btn-link text-center" href="login.php">¿Ya tienes cuenta?</a></p>
            </div>
        </div>
    </div>


    <div class="modal fade in" id="rol" tabindex="-1" role="dialog" aria-labelledby="rolLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 onclick="hideForm()" class="modal-title text-center" id="rolLabel">¿Qué eres?</h2>
                </div>
                    <div class="modal-body">
                        <button onclick="smoothScroll(this)" data-dismiss="modal" class="btn btn-primary col-xs-12" data-toggle="collapse"
                                data-parent="#accordion" href="#teacher"
                                aria-expanded="true" aria-controls="teacher" name="teacher"
                                style="margin-bottom: 10px; <?php echo isset($_POST['student']) ? "display: none;" : "" ?>">
                            Profesor
                        </button>
                        <button onclick="smoothScroll(this)" data-dismiss="modal" class="btn btn-primary col-xs-12" data-toggle="collapse"
                                data-parent="#accordion" href="#student"
                                aria-expanded="true"
                                aria-controls="student" name="student"
                                style="margin-bottom: 10px; <?php echo isset($_POST['teacher']) ? "display: none;" : "" ?>">
                            Estudiante
                        </button>
                    </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <h4 class="text-center"><?php echo $_POST['teacher'] ? "Su solicitud ha sido enviada con éxito..." : "El usuario ha sido creado correctamente..." ?></h4>
    <h5 class="text-center">Redirigiendo...</h5>

    <script>
        window.setTimeout(function () {
            window.location = "login.php";
        }, 1000);
    </script>
    <?php
}
?>
</body>
<script>
    var $header = $("#rol-title");
    function smoothScroll(button) {

        function scroll(id) {
            return function () {
                $('html, body').stop(true).animate({
                    scrollTop: $(id).offset().top
                }, 800);
            }
        }

        jQuery.extend(jQuery.validator.messages, {
            required:"Campo requerido.",
            equalTo:"Las contraseñas tienen que ser iguales.",
            email:"Por favor, introduzca un email válido."
        });

        if (button.name == "student") {
            $header.text("Estudiante");
            $('#student-form').validate({
                onsubmit: true
            });
            window.setTimeout(scroll("#studentInput"), 500);
        } else {
            $header.text("Profesor");
            $('#teacher-form').validate({
                onsubmit: true
            });
            window.setTimeout(scroll("#teacherInput"), 500);
        }
    }

    function hideForm(){
        $('#teacher').removeClass('in');
        $('#student').removeClass('in');
        $header.text("");
        $('#rol').modal();
    }

    <? if(!$error):?>$('#rol').modal();<? endif ?>
</script>

</html>