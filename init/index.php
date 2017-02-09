<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

?>
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>
<body>
<?php
include "../menu.php";
unset($_SESSION['unit']);
if (isset($_POST['submit'])) {
    if (Classroom::exists($_POST['code'])) {
        $classroom = Classroom::getClassroom($_POST['code']);
        $classroom->newStudent($_SESSION['user']->username());
        $_SESSION['user']->classroom($classroom);
        $_SESSION['achievements']['El fuego']->unlock();
        echo "<script>window.location = '../classroom/classroom_detail.php?id={$classroom->id()}'</script>";
    }
}

?>
<div class="container text-center">
    <h2 class="text-center center-block">Ultimas noticias</h2>
    <h4>
        <?php
        $user = $_SESSION['user'];
        $timeline = TimelineManager::retrieveTimeline();
        for ($i = 0; $timeline != false && $i < count($timeline); $i++) {
            ?>
            <div class="container">
                 <?php echo $timeline[$i]['content'] ?>
            </div>
            <br>
            <?php

        }
        if ($timeline == false) {
            ?>
            <h1 class="text-center">Sin noticias nuevas</h1>
            <?php
        }
        ?>
    </h4>
</div>
</body>
<script>
    $("#navigation-drawer").addClass("open");
    $("#overlay").addClass('active');
</script>
</html>