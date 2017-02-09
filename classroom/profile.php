<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

?>
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Perfil de <?php echo $_GET['username'] ?></title>
</head>
<body>
<?php

include "../menu.php";

if ($_SESSION['user']->actualClassroom() == null || ($_SESSION['user']->isStudent() && !(Classroom::hasStudent($_GET['username'], $_SESSION['user']->classroom()->id()) && $_SESSION['user']->username() != $_GET['username'])))
    die("<script> window.location = 'classroom_details.php?id={$_SESSION['user']->classroom()->id()}'</script>");

$_SESSION['achievements']['El diario de Darwin']->unlock();
$gdb = connect();
?>
<div class="content-container text-center">
    <div class="container">
        <?php

        $student = $_SESSION['user']->actualClassroom()->getStudent($_GET['username']);

        $times = [];
        $tries = [];

        for ($i = 0; $i < 5; $i++) {
            $times[] = setQuery("AVG(time)", "equation", "username='{$student->username()}' AND mode={$i}", $gdb)[0]['AVG(time)'];
            $tries[] = setQuery("AVG(tries)", "equation", "username='{$student->username()}' AND mode={$i}", $gdb)[0]['AVG(tries)'];
        }

        ?>
        <div class="material">
            <div id="data">
                <img style='margin-top: -50px' src=../<?php echo $student->avatarURL() ?>>
                <?php if ($_SESSION['user']->isTeacher()) { ?>
                    <div class="breather"></div>
                    <input <?php echo($_SESSION['user']->isStudent() ? "readonly" : ""); ?> data-rule-required="true" class="form-control" id="name" type="text" name="name" placeholder="Nombre" value="<?php echo $student->name() ?>">
                    <input readonly data-rule-required="true" class="form-control" id="name" type="text" name="name" placeholder="Nivel" value="<?php echo $student->level() ?>">
                    <?php
                } else {
                    ?>
                    <div class="breather-lg"></div>
                    <div class="col-xs-12 col-md-offset-3 col-md-6">
                        <div class="col-xs-6">
                            <h1>Nombre</h1>
                            <h2><?php echo $student->name() ?></h2>
                        </div>
                        <div class="col-xs-6">
                            <h1>Nivel</h1>
                            <h2><?php echo $student->level() ?></h2>
                        </div>
                    </div>
                    <div class="breather"></div>
                    <?php
                        $player1Duel = setQuery("*", "equation_duel", "player1='{$_SESSION['user']->username()}' AND player2='{$_GET['username']}' AND finished=0", connect());
                        $player2Duel = setQuery("*", "equation_duel", "player2='{$_SESSION['user']->username()}' AND player1='{$_GET['username']}' AND finished=0", connect());
                    ?>
                    <form method="<?php echo $player2Duel == false ? "post" : "get"; ?>" action="../play/game.php">
                        <?php
                            if ($player2Duel == false) {
                                ?>
                                <input type="hidden" name="player2" value="<?php echo $_GET['username']; ?>"/>
                                <?php
                            }else {
                                ?>
                                <input type="hidden" name="id" value="<?php echo $player2Duel[0]['id']; ?>"/>
                                <?php
                            }
                        ?>
                        <input type="submit" class="btn btn-danger" value="<?php echo $player2Duel == false ? "Retar a un duelo" : "Continuar duelo"; ?>" <?php echo ($player1Duel != false ? "disabled" : "") ?>/>
                    </form>
                    <div class="breather-lg"></div>
                    <h1>Últimas noticias</h1>
                    <?php
                    $timeline = TimelineManager::retrieveTimeline();
                    for ($i = 0; $timeline != false && $i < count($timeline); $i++) {
                        ?>
                        <div class="container">
                            <h2><?php echo $timeline[$i]['content'] ?></h2>
                        </div>
                        <?php
                    }

                    if ($timeline == false){
                        ?>
                        <h2>Sin noticias</h2>
                        <?php
                    }
                    ?>

                    <?php
                }
                if ($_SESSION['user']->isTeacher()) {
                    $didactic = setQuery("name, tries, time", "classroom_didactic, didactic_unit", "classroom_didactic.unit_id = didactic_unit.id AND username = '{$_GET['username']}' AND classroom_id = '{$_SESSION['user']->actualClassroom()->id()}'", connect());
                    ?>
                    <h1 style="margin-top: 10px" class="center-block">Tiempo medio</h1>
                    <div>
                        <div class="col-xs-2"><h4>Fácil</h4><h6><?php echo $times[0] == false ? "0" : round($times[0]) ?> s</h6></div>
                        <div class="col-xs-2"><h4>Normal</h4><h6><?php echo $times[1] == false ? "0" : round($times[1]) ?> s</h6></div>
                        <div class="col-xs-2"><h4>Medio</h4><h6><?php echo $times[2] == false ? "0" : round($times[2]) ?> s</h6></div>
                        <div class="col-xs-2"><h4>Difícil</h4><h6><?php echo $times[3] == false ? "0" : round($times[3]) ?> s</h6></div>
                        <div class="col-xs-4 text-center"><h4>Muy difícil</h4><h6><?php echo $times[4] == false ? "0" : round($times[4]) ?> s</h6></div>
                    </div>
                    <h1 class="center-block">Media de intentos</h1>
                    <div style="margin-bottom: 10px">
                        <div class="col-xs-2"><h4>Fácil</h4><h6><?php echo $tries[0] == false ? "0" : round($tries[0], 1) ?></h6></div>
                        <div class="col-xs-2"><h4>Normal</h4><h6><?php echo $tries[1] == false ? "0" : round($tries[1], 1) ?></h6></div>
                        <div class="col-xs-2"><h4>Medio</h4><h6><?php echo $tries[2] == false ? "0" : round($tries[2], 1) ?></h6></div>
                        <div class="col-xs-2"><h4>Difícil</h4><h6><?php echo $tries[3] == false ? "0" : round($tries[3], 1) ?></h6></div>
                        <div class="col-xs-4"><h4>Muy difícil</h4><h6><?php echo $tries[4] == false ? "0" : round($tries[4], 1) ?></h6></div>
                    </div>
                    <div class="breather"></div>
                    <h1 class="center-block">Unidades didácticas</h1>
                    <div style="margin-bottom: 10px">
                        <?php if($didactic != false){ ?>
                        <div class="col-xs-4"><h4>Nombre</h4><h3><?php echo $didactic[0]['name'] ?></h3></div>
                        <div class="col-xs-4"><h4>Nº. de intentos totales en los problemas</h4><h3><?php echo $didactic[0]['tries'] ?></h3></div>
                        <div class="col-xs-4"><h4>Tiempo</h4><h3><?php echo round(($didactic[0]['time']/60), 2) . " minuto(s)." ?></h3></div>
                        <?php } else { ?>
                            <h3>Este alumno no he realizado nunguna unidad didáctica aún.</h3>
                        <?php } ?>
                    </div>
                    <div class="breather"></div>
                    <button class="btn btn-danger " style="margin: 5px" onclick="deleteStudent('<?php echo "{$student->username()}', '{$_SESSION['user']->actualClassroom()->id()}" ?>')">Borrar alumno</button>
                    <button class="btn btn-primary " style="margin: 5px" onclick="modifyStudent('<?php echo $student->username() ?>')">Guardar cambios</button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    changeTitle("Perfil de  <?php echo $_GET['username']?>");

    function deleteStudent(studentUsername, classroomCode) {
        $.post("deleteStudent.php", {username: studentUsername, classroom: classroomCode})
            .done(function (data) {
                if (data)
                    window.location = "/classrooom/classroom_detail.php?id=<?php echo $_SESSION['user']->actualClassroom()->id()?>";
                else
                    toastr.error('<div class="center-block text-center"><h3>Error, el alumno no se borró corecctamente</h3></div>');
            });
    }
    function modifyStudent(studentUsername) {

        if ($("#name").val().trim().length == 0) {
            toastr.info('<div class="center-block text-center"><h3>Debe escribir un nuevo nombre para el alumno</h3></div>');
            return
        }
        $.post("modifyStudent.php", {username: studentUsername, newName: $("#name").val()})
            .done(function (data) {
                if (data)
                    toastr.success('<div class="center-block text-center"><h3>La información del alumno se modificó correctamente</h3></div>');
                else
                    toastr.error('<div class="center-block text-center"><h3>No se pudo modificar la información del alumno</h3></div>');
            });
    }
</script>
</html>