<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';
include '../libs/kimox_framework/head.php';
?>
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Mi perfil</title>
</head>
<body>
<?php

$gdb = connect();

if (isset($_POST['avatar'])) {
    updateQuery("avatar_id", $_POST['avatar'], "user", "username='{$_SESSION['user']->username()}'", $gdb);
    $_SESSION['achievements']['El reloj de Hafele-Keating']->unlock();
}
if (isset($_POST['submit'])) {
    updateQuery("password", crypt_pass($_POST['password']), "user", "username='{$_SESSION['user']->username()}'", connect());
}

$query = setQuery("password", "user", "username='{$_SESSION['user']->username()}'", $gdb);


include "../menu.php";
?>
<div class="content-container">
    <div class="container">
        <div class="text-center" style="margin-bottom: 15px">
            <span data-toggle='tooltip' title='Haz click aquí para cambiar tu avatar'><img data-toggle="modal" data-target="#avatar" style='margin-top: -50px; position: inherit; margin-left: 10px; margin-right: 10px' src=../<?php echo $_SESSION['user']->avatarURL()?>></span>
            <img data-toggle="modal" data-target="#backpack" style="position: inherit; margin-left: 10px; margin-right: 10px; height: 75px" src="../img/achievements/backpack.png">
        </div>
        <div class="material">

            <form method="POST" id="data" class="col-lg-offset-4 col-lg-4">
                <input <?php echo($_SESSION['user']->isStudent() ? "readonly" : ""); ?> data-rule-required="true" class="form-control" id="name" type="text" name="name" placeholder="Nombre" value="<?php echo $_SESSION['user']->name() ?>">
                <input data-rule-required="true" class="form-control" type="text" readonly value="<?php echo $_SESSION['user']->username() ?>">
                <input data-rule-required="true" value="<?php echo decrypt_pass($query[0]['password']) ?>" class="form-control" type="password" placeholder="Contraseña" name="password">
                <input data-rule-required="true" data-rule-equalto="#password" value="<?php echo decrypt_pass($query[0]['password']) ?>" class="form-control" type="password" placeholder="Repetir contraseña" name="confirmPassword">
                <input class="btn btn-primary col-xs-offset-4" style="margin-top: 20px" type="submit"value="Guardar cambios" name="submit">
            </form>
        </div>

        <div class="modal fade in text-center" id="avatar" tabindex="-1" role="dialog" aria-labelledby="avatarLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="icon material-icons close" data-dismiss="modal" aria-label="Close">close</i>
                        <h1>Mis Avatares</h1>
                    </div>
                    <div class="modal-body">
                        <div class="avatar-carousel">
                            <?php
                            $unlockedAvatars = Avatar::myAvatars();
                            for ($i = 0; $i < count($unlockedAvatars); $i++) {
                                if ($unlockedAvatars[$i]->id() == 69) continue;
                                ?>
                                <img onclick='changeAvatar(this)' id="<?php echo $unlockedAvatars[$i]->id() ?>" src=../<?php echo $unlockedAvatars[$i]->path() ?>>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer no-border-top">
                        <img id="my-avatar" style="margin-top: -45px" class="center-block avatar" src="<?php echo $_SESSION['user']->avatarURL() ?>" alt="">
                        <span hidden id="my-avatar-id"></span>
                        <div class="breather"></div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-inverted" onclick="submitAvatarForm()">Cambiar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" id="avatar-form">
            <input type="hidden" name="avatar" id="avatar-input">
        </form>
        <div class="modal fade in text-center" id="backpack" tabindex="-1" role="dialog" aria-labelledby="avatarLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="icon material-icons close" data-dismiss="modal" aria-label="Close">close</i>
                        <h1>Logros obtenidos</h1>
                    </div>
                    <div class="modal-body">

                        <?php
                        foreach (Achievement::achievements() as $achievement) {
                            if ($achievement->isUnlocked()) {
                                ?>
                                <span class="col-xs-6" data-toggle="modal" data-target="#achievement" onclick="openModal(this)" id="<?php echo $achievement->id() ?>">
                                    <img src='..<?php echo $achievement->path() ?>'>
                                    <br>
                                    <span id="name"><?php echo $achievement->name() ?></span>
                                    <span id="description" hidden><?php echo $achievement->description() ?></span>
                                    <span id="condition" hidden><?php echo $achievement->condition() ?></span>
                                </span>
                                <?php
                            } else {
                                ?>
                                <span class="col-xs-6">
                                    <img data-toggle='tooltip' title='<?php echo $achievement->condition() ?>' src='../img/achievements/chest.png'>
                                    <br>
                                    <span>Logro bloqueado</span>
                                </span>
                                <?php
                            }
                        }
                        ?>


                    </div>
                    <div class="modal-footer no-border-top">
                        <br>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class='modal fade in' id='achievement' tabindex='-1' role='dialog' aria-labelledby='avatarLabel'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='text-center modal-header'>
                <i class="icon material-icons close" data-dismiss="modal" aria-label="Close">close</i>
                <h2 id="achievement-name"></h2>
            </div>
            <div class='text-center modal-body'>
                <h2 id="achievement-condition"></h2>
                <img id="achievement-image" style='height: 100px' src=''>
                <h3 id="achievement-description"></h3>

            </div>
        </div>
    </div>
</div>
</body>
<script>
    $("#navbar-title").text("Mi perfil");

    function changeAvatar(element) {
        $item = $(element);
        $("#my-avatar").attr("src", $item.attr("src"));
        $("#my-avatar-id").text($item.attr("id"));
    }

    function submitAvatarForm() {
        $('#avatar-input').val($("#my-avatar-id").text());
        $('#avatar-form').submit()
    }

    $('#data').validate({
        onsubmit: true
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "Campo requerido.",
        equalTo: "Las contraseñas tienen que ser iguales.",
        email: "Por favor, introduzca un email válido."
    });

    $('.avatar-carousel').slick({
        infinite: false,
        variableWidth: true,
        slidesToScroll: 4,
        rows: 3,
        prevArrow: '',
        nextArrow: ''
    });
    ;

    $("img").error(function () {
        $(this).hide();
    });

    function openModal(element) {
        $item = $(element);

        var name = $item.find("#name").text();
        var description = $item.find("#description").text();
        var condition = $item.find("#condition").text();
        var image = $item.find("img").attr("src");


        $('#achievement-name').text(name);
        $('#achievement-description').text(description);
        $('#achievement-condition').text(condition);
        $('#achievement-image').attr("src", image);
        $('#achievement-image').show();


    }
</script>
</html>



