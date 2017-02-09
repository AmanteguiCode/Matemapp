<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';
?>
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Mis aulas</title>
</head>
<?php
include "../menu.php";
?>
<body>
<?php

$inserted = null;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $teacher = $_SESSION['user']->username();

    $classroom = Classroom::create($name, $code, $teacher, $description);

    if ($classroom != null) {
        $_SESSION['user']->addClassroom($classroom);
        $inserted = true;
    } else {
        $inserted = false;
    }

}

?>
<script src="//cdn.bootcss.com/bootstrap/4.0.0-alpha.2/js/umd/alert.js"></script>
<div class="content-container text-center">
    <div class="container">

        <?php
        if ($_SESSION['user'] instanceof Student) {
            ?>

            <?php
        } else {
            $classrooms = $_SESSION['user']->classrooms();
            ?>
            <div class="list-group col-md-offset-2">
                <?php
                if ($inserted != null) {
                    if ($inserted) {
                        ?>
                        <script>toastr.success("Aula creada con éxito", "¡Creada!")</script>
                        <?php
                    } else {
                        ?>
                        <script>toastr.error("No se ha podido crear el aula", "¡Error!")</script>
                        <?php
                    }
                }
                for ($i = 0; $i < count($classrooms); $i++) {
                    ?>
                    <div class="card paper col-xs-12 col-md-3 paper elevated-2" style="background-color: #68B8C3; margin-right: 5px">
                        <a href="classroom_detail.php?id=<?php echo $classrooms[$i]->id(); ?>">
                            <div class="tile no-bottom-margin background-image tile-sm background-top top">
                                <div class="margin">
                                    <h4 class="tile-bottom no-bg">

                                        <?php echo $classrooms[$i]->name(); ?>
                                    </h4>
                                </div>
                            </div>
                        </a>
                        <div class="action-area clearfix bg-white">
                            <div class="row">
                                <div class="col-xs-4 center-block">
                                     <span style="font-size: 20px; font-weight: bold;"><?php echo $classrooms[$i]->studentsNumber(); ?></span>
                                    <i style="font-size: 12px;" class="icon material-icons fa fa-users" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>

        <div class="modal fade elevated-4" id="add-class" tabindex="-1" role="dialog" aria-labelledby="add-classLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="add-classLabel">Nueva aula</h4>
                    </div>
                    <form method="POST">
                        <div class="modal-body">
                            <p><input required class="form-control" type="text" placeholder="Nombre" name="name">
                            </p>
                            <p><input class="form-control" type="text" placeholder="Descripción" name="description">
                            </p>
                            <input type="hidden" name="code" value="<?php echo generateRandomString(6); ?>">
                        </div>
                        <div class="modal-footer center-block">
                            <input type="submit" value="Crear" name="submit" class="btn btn-primary center-block">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    $("#navbar-title").text("Mis aulas");
    $("#app-bar").append("<a class=\"btn btn-fab btn-md elevated-3\"  data-toggle=\"modal\" data-target=\"#add-class\" style=\"background-color: #045C68;\"><i class=\"icon material-icons\">add</i></a>");
    $.material.init()
</script>
</html>