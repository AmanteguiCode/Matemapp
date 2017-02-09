<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

?>
<!doctype html>
<!--suppress ALL -->
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Mis aulas</title>
</head>
<body>
<?php
include "../menu.php";

unset($_SESSION['unit']);

if ($_SESSION['user']->isStudent() && $_SESSION['user']->classroom() == null) die("<script>location.href = '../init/index.php'</script>");

$id = ($_SESSION['user']->isStudent() ? $_SESSION['user']->classroom()->id() : $_GET['id']);
$classroom = ($_SESSION['user']->isStudent() ? $_SESSION['user']->classroom() : $_SESSION['user']->classroomId($id));

$classroom = $classroom->id() != null && $classroom->id() == $_GET['id'] ? $classroom : null;

if ($classroom == null)
    die("<script>location.href = '../init/index.php'</script>");


$_SESSION['user']->actualClassroom($_GET['id']);

if (isset($_POST['delete'])) {
    deleteQuery("classroom", "id={$_SESSION['user']->actualClassroom()->id()}", connect());
    deleteQuery("classroom_didactic", "classroom_id={$_SESSION['user']->actualClassroom()->id()}", connect());
    deleteQuery("classroom_equation", "classroom_id={$_SESSION['user']->actualClassroom()->id()}", connect());
    deleteQuery("student_classroom", "id_classroom={$_SESSION['user']->actualClassroom()->id()}", connect());
    echo "<script>window.location = '../init/index.php';</script>";
}
if (isset($_POST['reset'])) {
    $_SESSION['user']->classroomId($id)->setCode(generateRandomString(6));
    deleteQuery("classroom_didactic", "classroom_id={$_SESSION['user']->actualClassroom()->id()}", connect());
    deleteQuery("classroom_equation", "classroom_id={$_SESSION['user']->actualClassroom()->id()}", connect());
    deleteQuery("student_classroom", "id_classroom={$_SESSION['user']->actualClassroom()->id()}", connect());
    $_SESSION['user']->sync();
}

if (isset($_POST['code']))
    $_SESSION['user']->classroomId($id)->setCode(generateRandomString(6));

function existsInArray($array, $value)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $value) return true;
    }

    return false;
}

function obtainCooperativePlayers()
{
    $player1 = setQuery("DISTINCT player1", "equation_cooperative", "finished=1", connect());
    $player2 = setQuery("DISTINCT player2", "equation_cooperative", "finished=1", connect());
    $player3 = setQuery("DISTINCT player3", "equation_cooperative", "finished=1", connect());
    $player4 = setQuery("DISTINCT player4", "equation_cooperative", "finished=1", connect());

    for ($i = 0; $i < count($player1); $i++) {
        if (!existsInArray($player, $player1[$i]["player1"]))
            $player[] = $player1[$i]["player1"];
    }
    for ($i = 0; $i < count($player2); $i++) {
        if (!existsInArray($player, $player2[$i]["player2"]))
            $player[] = $player2[$i]["player2"];
    }
    for ($i = 0; $i < count($player3); $i++) {
        if (!existsInArray($player, $player3[$i]["player3"]))
            $player[] = $player3[$i]["player3"];
    }
    for ($i = 0; $i < count($player4); $i++) {
        if (!existsInArray($player, $player4[$i]["player4"]))
            $player[] = $player4[$i]["player4"];
    }
    return $player;
}

function obtainUsernameCooperativePoints($username)
{
    $arrayPoints = setQuery("experience", "equation_cooperative", "player1='{$username}' OR player2='{$username}' OR player3='{$username}' OR player4='{$username}'", connect());
    $points = 0;
    foreach ($arrayPoints as $point)
        $points = $points + $point['experience'];
    return $points;
}

function obtainHighestScore($arrayPoints){
    $position = 0;
    for($i = 1; $i < count($arrayPoints); $i++)
        if($arrayPoints[$i] > $arrayPoints[$position])
            $position = $i;
    return $position;
}

?>
<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
<div class="content-container text-center">
    <div class="container text-center move-up">
        <div class="tab-content">
            <div id="equations" class="tab-pane fade in active">
                <h2>Ecuaciones</h2>
                <div class="container">
                    <div class="buttons col-xs-12 col-md-offset-4 col-md-4">
                        <div class="slider add-remove slick-slider">
                            <?php
                            if ($_SESSION['user']->isTeacher()) {
                                $equationQuery = setQuery("equation, mode, SUM(done)", "classroom_equation", "classroom_id = {$_GET['id']} GROUP BY equation", connect());
                            } else
                                $equationQuery = setQuery("*", "classroom_equation", "classroom_id = {$_GET['id']} AND username='{$_SESSION['user']->username()}'", connect());
                            for ($i = 0; $equationQuery != false && $i < count($equationQuery); $i++) {
                                ?>
                                <div class="sprite-equation-carousel bg-light-blue">
                                    <span
                                        id="equation"><?php echo $_SESSION['user']->isTeacher() ? ($i + 1) . ". {$equationQuery[$i]['equation']}" : "Ecuación " . ($i + 1); ?></span>
                                    <span id="equation-data" hidden><?php echo $equationQuery[$i]['equation']; ?></span>
                                    <span id="equation-mode" hidden><?php echo $equationQuery[$i]['mode']; ?></span>
                                    <span id="equation-done"
                                          hidden><?php echo $_SESSION['user']->isStudent() ? $equationQuery[$i]['done'] : $equationQuery[$i]['SUM(done)'] ?></span>
                                </div>
                                <?php
                            }

                            ?>
                        </div>
                        <h1 <?php echo $equationQuery != false ? "hidden" : ""; ?> id="empty-message"
                                                                                   class="text-center"><?php echo $_SESSION['user'] instanceOf Student ? "¡No tienes deberes!" : "Sin ecuaciones" ?></h1>
                        <div class="col-xs-6">
                            <h3>Dificultad</h3>
                            <h3 id="slick-equation-mode"><?php echo $equationQuery == false ? "--" : $equationQuery[0]['mode']; ?></h3>
                        </div>
                        <div class="col-xs-6 ">
                            <?php
                            if ($equationQuery != false) {
                                if ($_SESSION['user']->isStudent()) {
                                    $done = $equationQuery[0]['done'];
                                } else {
                                    $done = $equationQuery[0]['SUM(done)'];
                                }
                            } else {
                                $done = "--";
                            }
                            ?>
                            <h3><?php echo $_SESSION['user'] instanceOf Student ? "Realizada" : "Realizadas" ?></h3>
                            <h3 id="slick-equation-done"><?php echo $done; ?></h3>
                        </div>
                        <div class="breather"></div>
                        <div class="border-bottom border-left border-right border-top">
                            <div class="breather"></div>
                            <?php
                            if ($_SESSION['user']->isTeacher()) {
                                ?>
                                <div class="col-md-6">
                                    <h2>Dificultad</h2>
                                    <select id="mode" name="mode" class="form-control">
                                        <option value="0">Fácil</option>
                                        <option value="1">Normal</option>
                                        <option value="2">Medio</option>
                                        <option value="3">Difícil</option>
                                        <option value="4">Muy Difícil</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <h2>Términos</h2>
                                    <select id="terms" name="terms" class="form-control">
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                                <?php
                            } else {
                                ?>
                                <form id="play-form" action="../play/game.php" method="post">
                                    <input type="hidden" name="equation" id="equation-input">
                                    <input type="hidden" name="mode" id="mode-input">
                                </form>
                                <?php
                            }
                            ?>

                            <div class="breather"></div>
                            <div class="buttons text-center">
                                <a style="margin-right: 20px;" onclick="slickPrev()" href="javascript:void(0)"
                                   class="btn btn-fab btn-xs bg-light-blue"><i class="material-icons">keyboard_arrow_left</i></a>

                                <?php if ($_SESSION['user']->isTeacher()) { ?>
                                    <a style="margin-right: 10px;" id="addButton" href="javascript:void(0)"
                                       class="btn btn-fab btn-sm bg-light-blue js-add-slide"><i
                                            class="icon material-icons">add</i></a>
                                    <a style="margin-left: 10px;" id="deleteButton" href="javascript:void(0)"
                                       class="btn btn-fab btn-sm bg-light-blue js-remove-slide"><i
                                            class="icon material-icons">remove</i></a>
                                <?php } else { ?>
                                    <a onclick="playGame()" href="javascript:void(0)"
                                       class="btn btn-fab btn-sm bg-light-blue" <?php echo $equationQuery == false ? "disabled" : "" ?>><i
                                            class="icon material-icons">videogame_asset</i></a>
                                    <?php
                                }
                                ?>

                                <a style="margin-left: 20px;" onclick="slickNext()" href="javascript:void(0)"
                                   class="btn btn-fab btn-xs bg-light-blue"><i class="material-icons">keyboard_arrow_right</i></a>
                            </div>
                            <div class="breather"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $unitsQuery = setQuery("*", "didactic_unit", "", connect());
            ?>
            <div id="didactics-units" class="tab-pane fade in">
                <h3>Unidades didácticas</h3>
                <?php
                if ($_SESSION['user']->isTeacher()) {
                    for ($i = 0; $unitsQuery != false && $i < count($unitsQuery); $i++) {
                        $classroomUnit = setQuery("SUM(visible)", "classroom_didactic", "unit_id = {$unitsQuery[$i]['id']} AND classroom_id = {$_SESSION['user']->actualClassroom()->id()} GROUP BY unit_id", connect());
                        ?>
                        <div class="card paper col-xs-12 col-md-3 paper elevated-2"
                             style="background-color: #68B8C3; margin-right: 5px">
                            <a href="#">
                                <div class="tile no-bottom-margin background-image tile-sm background-top top">
                                    <div class="margin">
                                        <h4 class="tile-bottom no-bg">
                                            <?php echo $unitsQuery[$i]['name']; ?>
                                        </h4>
                                    </div>
                                </div>
                            </a>
                            <div class="action-area clearfix bg-white">
                                <div id="unit-<?php echo $unitsQuery[$i]['id']; ?>" class="row">
                                    <div class="col-xs-3 center-block">
                                        <i onclick="addUnit(<?php echo $unitsQuery[$i]['id']; ?>)" id="add-unit"
                                           style="font-size: 17px;"
                                           class="icon material-icons" <?php echo $classroomUnit === false ? '' : "hidden"; ?>
                                           aria-hidden="true">add_circle</i>
                                    </div>
                                    <div class="col-xs-3 center-block">
                                        <i onclick="showUnit(<?php echo $unitsQuery[$i]['id']; ?>)" id="show-unit"
                                           style="font-size: 17px;"
                                           class="icon material-icons fa  <?php echo($classroomUnit[$i]['SUM(visible)'] == 0 ? 'fa-eye-slash' : 'fa-eye') ?>" <?php echo $classroomUnit === false ? 'hidden' : ""; ?>
                                           aria-hidden="true"></i>
                                    </div>
                                    <div class="col-xs-3 center-block">
                                        <i onclick="removeUnit(<?php echo $unitsQuery[$i]['id']; ?>)" id="remove-unit"
                                           style="font-size: 17px;"
                                           class="icon material-icons" <?php echo $classroomUnit === false ? 'hidden' : ""; ?>
                                           aria-hidden="true">remove_circle</i>
                                    </div>
                                    <div class="col-xs-3 center-block">

                                            <i onclick="window.open('../didactics/1/unit1_info.pdf', '_blank')" style="font-size: 17px;"
                                           class="icon material-icons" aria-hidden="true">info</i>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    if (!$unitsQuery) {
                        echo "<h2>No hay unidades disponibles.</h2>";
                    } else {
                        ?>
                        <form method="post" id="unit-form" action="../didactics/index.php">
                            <input id="unit-input" type="hidden" name="unit-input">
                        </form>
                        <div class="list-group">
                        <?php
                        $classroomUnit = setQuery("*", "classroom_didactic", "classroom_id= {$_SESSION['user']->actualClassroom()->id()} AND visible = 1 GROUP BY unit_id", connect());
                        for ($i = 0; $classroomUnit != false && $i < count($classroomUnit); $i++) {
                            ?>
                            <a onclick='goUnit(<?php echo "{$classroomUnit[$i]['unit_id']}" ?>)' href='#'>
                                <li class="list-group-item">Unidad <?php echo $classroomUnit[$i]['unit_id'] ?></li>
                            </a>
                            <?php
                        }
                    }
                    ?>
                    </div>
                <?php } ?>
            </div>
            <div id="didactics-units" class="tab-pane fade in">
                <h3>Unidades didácticas</h3>
                <?php
                if ($_SESSION['user']->isTeacher()) {
                    for ($i = 0; $unitsQuery != false && $i < count($unitsQuery); $i++) {
                        $classroomUnit = setQuery("SUM(visible)", "classroom_didactic", "unit_id = {$unitsQuery[$i]['id']} AND classroom_id = {$_SESSION['user']->actualClassroom()->id()} GROUP BY unit_id", connect());
                        ?>
                        <div class="card paper col-xs-12 col-md-3 paper elevated-2"
                             style="background-color: #68B8C3; margin-right: 5px">
                            <a href="#">
                                <div class="tile no-bottom-margin background-image tile-sm background-top top">
                                    <div class="margin">
                                        <h4 class="tile-bottom no-bg">
                                            <?php echo $unitsQuery[$i]['name']; ?>
                                        </h4>
                                    </div>
                                </div>
                            </a>
                            <div class="action-area clearfix bg-white">
                                <div id="unit-<?php echo $unitsQuery[$i]['id']; ?>" class="row">
                                    <div class="col-xs-4 center-block">
                                        <i onclick="addUnit(<?php echo $unitsQuery[$i]['id']; ?>)" id="add-unit"
                                           style="font-size: 17px;"
                                           class="icon material-icons" <?php echo $classroomUnit === false ? '' : "hidden"; ?>
                                           aria-hidden="true">add_circle</i>
                                    </div>
                                    <div class="col-xs-4 center-block">
                                        <i onclick="showUnit(<?php echo $unitsQuery[$i]['id']; ?>)" id="show-unit"
                                           style="font-size: 17px;"
                                           class="icon material-icons fa  <?php echo($classroomUnit[$i]['SUM(visible)'] == 0 ? 'fa-eye-slash' : 'fa-eye') ?>" <?php echo $classroomUnit === false ? 'hidden' : ""; ?>
                                           aria-hidden="true"></i>
                                    </div>
                                    <div class="col-xs-4 center-block">
                                        <i onclick="removeUnit(<?php echo $unitsQuery[$i]['id']; ?>)" id="remove-unit"
                                           style="font-size: 17px;"
                                           class="icon material-icons" <?php echo $classroomUnit === false ? 'hidden' : ""; ?>
                                           aria-hidden="true">remove_circle</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    if (!$unitsQuery) {
                        echo "<h2>No hay unidades disponibles.</h2>";
                    } else {
                        ?>
                        <form method="post" id="unit-form" action="../didactics/index.php">
                            <input id="unit-input" type="hidden" name="unit-input">
                        </form>
                        <div class="list-group">
                        <?php
                        $classroomUnit = setQuery("*", "classroom_didactic", "classroom_id= {$_SESSION['user']->actualClassroom()->id()} AND visible = 1 GROUP BY unit_id", connect());
                        for ($i = 0; $classroomUnit != false && $i < count($classroomUnit); $i++) {
                            ?>
                            <a onclick='goUnit(<?php echo "{$classroomUnit[$i]['unit_id']}" ?>)' href='#'>
                                <li class="list-group-item">Unidad <?php echo $classroomUnit[$i]['unit_id'] ?></li>
                            </a>
                            <?php
                        }
                    }
                    ?>
                    </div>
                <?php } ?>
            </div>
            <div id="ranking-competitivo" class="tab-pane fade in">
                <h1>Ranking de duelos</h1>
                <ul>
                    <div class="breather"></div>
                    <?php
                    $rankingUsername = setQuery("DISTINCT equation_duel.winner", "student_classroom, equation_duel", "student_classroom.id_classroom='{$_GET['id']}' AND student_classroom.username=equation_duel.winner", connect());
                    $rankingTimes;
                    for ($i = 0; $i < count($rankingUsername); $i++) {
                        $rankingTimes = setQuery("COUNT(equation_duel.winner)", "equation_duel", "equation_duel.winner='{$rankingUsername[$i]['winner']}'", connect())[0]['COUNT(equation_duel.winner)'];
                        $rankingPersonProfile = setQuery("name, avatar_id", "user", "username='{$rankingUsername[$i]['winner']}'", connect())[0];
                        $rankingPersonAvatarURL = setQuery("url", "avatar", "id='{$rankingPersonProfile['avatar_id']}'", connect())[0]['url'];
                        ?>
                        <li class="list-group-item list-item sprite-equation">
                            <span class="center-block">
                                <h2>
                                    <?php echo $i + 1 . ". " ?>
                                    <?php echo $rankingPersonProfile['name'] ?>
                                    <?php echo " con " ?>
                                    <?php echo $rankingTimes . " duelos ganados." ?>
                                    <img style="height: 50px;" src="..<?php echo $rankingPersonAvatarURL ?>" alt="">
                                </h2>
                            </span>
                        </li>
                        <?php
                    } ?>
                </ul>
            </div>
            <div id="ranking-cooperativo" class="tab-pane fade in">
                <h1>Ranking en equipo</h1>
                <ul>
                    <div class="breather"></div>
                    <?php
                    $rankingUsername = obtainCooperativePlayers();
                    $rankingPoints;
                    for ($i = 0; $i < count($rankingUsername); $i++) {
                        $rankingPoints[] = obtainUsernameCooperativePoints($rankingUsername[$i]);
                    }
                    $rankingPointsSize = count($rankingPoints);
                    for ($i = 0; $i < $rankingPointsSize; $i++) {
                        $highScorePosition = obtainHighestScore($rankingPoints);
                        $rankingPersonProfile = setQuery("name, avatar_id", "user", "username='{$rankingUsername[$highScorePosition]}'", connect())[0];
                        $rankingPersonAvatarURL = setQuery("url", "avatar", "id='{$rankingPersonProfile['avatar_id']}'", connect())[0]['url'];
                        ?>
                        <li class="list-group-item list-item sprite-equation">
                            <span class="center-block">
                                <h2>
                                    <?php echo $i + 1 . ". " ?>
                                    <?php echo $rankingPersonProfile['name'] ?>
                                    <?php echo " con " ?>
                                    <?php echo $rankingPoints[$highScorePosition] . " puntos." ?>
                                    <img style="height: 50px;" src="..<?php echo $rankingPersonAvatarURL ?>" alt="">
                                </h2>
                            </span>
                        </li>
                        <?php
                        unset($rankingUsername[$highScorePosition]);
                        unset($rankingPoints[$highScorePosition]);
                        $rankingUsername = array_values($rankingUsername);
                        $rankingPoints = array_values($rankingPoints);
                    } ?>
                </ul>
            </div>
            <?php
            if ($_SESSION['user']->isStudent()) {
                ?>
                <div id="students" class="tab-pane fade in">
                    <h3>Mis compañeros</h3>
                    <div class="list-group">
                        <?php
                        foreach ($classroom->students() as $student) {
                            if ($student->username() == $_SESSION['user']->username()) continue;
                            ?>
                            <a href='profile.php?username=<?php echo $student->username() ?>'>
                                <li class="list-group-item">
                                    <?php echo $student->name() ?>
                                </li>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            } else {
            ?>
            <div id="students" class="tab-pane fade in">
                <h3>Alumnos</h3>
                <?php
                if (count($classroom->students()) == 0) {
                    echo "<h2>Sin alumnos</h2>";
                } else {
                    ?>
                    <div class="list-group">
                        <?php
                        foreach ($classroom->students() as $student) {
                            ?>
                            <a href='profile.php?username=<?php echo $student->username() ?>&classroom=<?php echo $classroom->code() ?>'>
                                <li class="list-group-item"><?php echo $student->name() ?></li>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div id="preferences" class="tab-pane fade in">
                <h3>Opciones</h3>
                <input class="form-control" type="text" placeholder="Nombre del aula" name="name"
                       value="<?php echo $classroom->name() ?>">
                <br>
                <input class="form-control" type="text" placeholder="Descripción" name="description"
                       value="<?php echo $classroom->description() ?>">
                <br>
                <p><input class="btn btn-primary" type="submit" value="Guardar cambios" name="save"></p>

                <p>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#new-code">Código nuevo</button>
                </p>

                <p>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#reset">Resetear aula</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete">Eliminar aula</button>
                </p>
            </div>
            <div id="code" class="tab-pane fade in">
                <h3>Código</h3>
                <p>El código del aula es</p>
                <h3 class="center-block" id="copy-code">
                    <?php echo $classroom->code() ?>
                </h3>
                <button id="copy" class="btn btn-danger center-block" data-clipboard-target="#copy-code"
                        onclick="$('#alert').removeAttr('hidden'); toastr.success('Se ha copiado el código', '¡Copiado!')">
                    Copiar
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="new-code" tabindex="-1" role="dialog" aria-labelledby="new-codeLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <i type="button" data-dismiss="modal" aria-label="Close" class="close icon material-icons">close</i>
                    <h1><strong>¡Asegúrese!</strong></h1>
                </div>
                <div class="modal-body">
                    <h3>Está a punto de cambiar el código del aula. ¿Está seguro/a?</h3>
                </div>
                <div class="modal-footer center-block">
                    <form method="post">
                        <input type="submit" value="Cambiar código" name="code" class="btn btn-warning center-block">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <i type="button" data-dismiss="modal" aria-label="Close" class="close icon material-icons">close</i>
                    <h1><strong>¡Peligro!</strong></h1>
                </div>
                <div class="modal-body">
                    <h3>Está a punto de eliminar el aula, se perderan todos los datos y no podrá revertirlo.</h3>
                    <h3>Escriba <strong>ELIMINAR</strong> para confirmar la eliminación.</h3>
                    <input onkeyup="check(this)" class="form-control" type="text" autofocus>
                </div>
                <div class="modal-footer center-block">
                    <form method="post">
                        <input id="delete-classroom" type="submit" value="Eliminar aula" name="delete"
                               class="btn btn-danger center-block" disabled>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="resetLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <i type="button" data-dismiss="modal" aria-label="Close" class="close icon material-icons">close</i>
                    <h1><strong>¡Peligro!</strong></h1>
                </div>
                <div class="modal-body">
                    <h4>Está a punto de resetear el aula, se perderan todos los datos y no podrá revertirlo.</h4>
                    <form method="post">
                        <input id="reset-classroom" type="submit" value="Resetear aula" name="reset"
                               class="btn btn-danger center-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
</body>


<script>
    var lastTab = "#equations";

    changeTitle("<?php echo $classroom->name();?>");

    var slideIndex = <?php echo $equationQuery != false ? count($equationQuery) - 1 : -1;?>;

    function goUnit(unit) {
        $('#unit-input').val(unit);
        $('#unit-form').submit();

    }

    function changeTab(tab) {
        if ($(window).width() <= 1280) {
            $('#navigation-drawer').removeClass('open');
            $('#overlay').removeClass('active');
        }
        $(lastTab).removeClass('active');
        lastTab = tab;
        $(lastTab).addClass('active');
    }

    var $carousel = $('.add-remove');

    $carousel.slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '',
        nextArrow: '',
        speed: 50
    });

    function updateEquationInfo() {
        if (slideIndex != -1) {
            $("#slick-equation-mode").text($(".slick-active > #equation-mode").text());
            $("#slick-equation-done").text($(".slick-active > #equation-done").text());
        } else {
            $("#slick-equation-mode").text("--");
            $("#slick-equation-done").text("--");
        }
    }
    function slickNext() {
        $carousel.slick('slickNext');
        updateEquationInfo();
    }

    function slickPrev() {
        $carousel.slick('slickPrev');
        updateEquationInfo();
    }

    toastr.options = {
        "positionClass": "toast-top-left"
    };

    $('#student').attr("data-toggle", "tab");
    $('#preferences').attr("data-toggle", "tab");
    $('#ranking-competitivo').attr("data-toggle", "tab");
    $('#ranking-cooperativo').attr("data-toggle", "tab");
    $('#equations').attr("data-toggle", "tab");
    $('#didactics-units').attr("data-toggle", "tab");

    $.each($('.drawer-link'), function (index, link) {
        if (index == 0) return;
        link.setAttribute("onClick", "changeTab('" + link.id + "')");
    });


    <?php
    if ($_SESSION['user']->isStudent()){
    ?>
    function playGame() {
        $('#equation-input').val($('.slick-active > #equation-data').text());
        $('#mode-input').val($('.slick-active > #equation-mode').text());
        $('#play-form').submit()
    }
    <?php
    }else{
    ?>
    var clipboard = new Clipboard('#copy');

    function check(input) {
        if (input.value == "ELIMINAR") {
            $('#delete-classroom').removeAttr("disabled");
        } else {
            $('#delete-classroom').attr("disabled", "disabled");
        }
    }


    var eliminated = 0;


    $('.js-add-slide').on('click', function () {
        addEquation()
    });

    $('.js-remove-slide').on('click', function () {
        removeEquation();
    });


    function addEquation() {
        if (<?php echo $_SESSION['user']->actualClassroom()->students() == null ? "true" : "false" ?>) {
            toastr.info('<div onclick="changeTab(\'#code\')" class="center-block text-center"><h4>¡No hay alumnos!</h4><h5>¡Añadelos!</h5></div>')
            return;
        }
        toastr.info("Generando ecuación", "Generando...")

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "addEquation.php",
            data: {mode: $('#mode').val(), terms: $('#terms').val()},
            success: function (data) {
                if (data.success) {
                    toastr.success("¡Ecuación generada con éxito!")
                    var row = "<div class='sprite-equation-carousel bg-light-blue'><span id='equation'>" + (slideIndex + 1) + ". " + data.equation + "</span><span id='equation-data' hidden>" + data.equation + "</span><span id='equation-mode' hidden>" + $("#mode").val() + "</span><span id='equation-done' hidden>0</span></div>";
                    $carousel.slick('slickAdd', row);
                    slideIndex++;
                    for (var i = $carousel.slick('slickCurrentSlide'); i < slideIndex; i++) {
                        setTimeout(slickNext, 100 * i);
                    }
                    slickNext();
                    $("#empty-message").attr("hidden", "hidden");
                } else {
                    toastr.error("Error en la generación");
                }
            }
        });
    }


    function removeEquation() {
        if (slideIndex == -1) {
            toastr.info("¡No hay ecuaciones!", "¡Añade una!");
            return;
        }

        var currentSlide = $carousel.slick('slickCurrentSlide');
        var equation = $('.slick-active > #equation-data').text();
        $("#deleteButton").attr("disabled", "disabled");
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "removeEquation.php",
            data: {equation: equation},
            success: function (data) {
                if (data.success) {
                    toastr.success("¡Ecuación eliminada con éxito!", equation);
                    $carousel.slick('slickRemove', currentSlide);
                    slideIndex--;
                    if (slideIndex == -1) {
                        $("#empty-message").removeAttr("hidden");
                        updateEquationInfo();
                    }
                } else {
                    toastr.error("¡Algo ha sucedido!", equation)
                }
                $("#deleteButton").removeAttr("disabled");
            }
        });
    }

    function addUnit(unit) {
        console.log("Adding unit: " + unit);
        $.post("manageUnits.php", {unitId: unit, mode: 'add'})
            .done(function (data) {
                if (data) {
                    $("#unit-" + unit + "> div > #add-unit").attr("hidden", "hidden");
                    $("#unit-" + unit + "> div > #show-unit").removeAttr("hidden");
                    $("#unit-" + unit + "> div > #remove-unit").removeAttr("hidden");
                    toastr.success("Añadida con éxito", "Unidad " + unit)
                }
                else {
                    toastr.error("Compruebe que el aula tiene al menos un alumno.", "¡Error!");
                    console.log(data);
                }
            });
    }
    function showUnit(unit) {
        console.log("Showing unit: " + unit);
        $mode = $("#unit-" + unit + "> div >#show-unit").hasClass("fa-eye-slash") ? 'show' : 'hidde';
        $.post("manageUnits.php", {unitId: unit, mode: $mode})
            .done(function (data) {
                if (data) {
                    toastr.success('¡' + ($mode == 'hidde' ? "Ocultado" : "Visible") + '!', "Unidad " + unit)
                    $("#unit-" + unit + "> div >#show-unit").removeClass(($mode == 'hidde') ? 'fa-eye' : 'fa-eye-slash');
                    $("#unit-" + unit + "> div >#show-unit").addClass(($mode == 'show') ? 'fa-eye' : 'fa-eye-slash');
                }
                else {
                    toastr.error("", "¡Error!");
                }
            });
    }
    function removeUnit(unit) {
        console.log("Removing unit: " + unit);
        $.post("manageUnits.php", {unitId: unit, mode: 'remove'})
            .done(function (data) {
                if (data) {
                    $("#unit-" + unit + "> div >#show-unit").removeClass('fa-eye');
                    $("#unit-" + unit + "> div >#show-unit").addClass('fa-eye-slash');
                    $("#unit-" + unit + "> div > #add-unit").removeAttr("hidden");
                    $("#unit-" + unit + "> div > #show-unit").attr("hidden", "hidden");
                    $("#unit-" + unit + "> div > #remove-unit").attr("hidden", "hidden");
                    toastr.success("¡Eliminada!", "Unidad " + unit)
                }
                else {
                    toastr.error("", "¡Error!");
                    console.log(data);
                }
            });
    }

    <?php
    }
    ?>
</script>
</html>
