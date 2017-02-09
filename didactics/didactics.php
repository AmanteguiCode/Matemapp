<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

?>
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Unidad didáctica</title>
    <script src="controller/js/controller.js"></script>
</head>
<?php
include "../menu.php";
if (!isset($_SESSION['unit'])) {
    echo "<script>window.location = '../classroom/classroom_details.php?id={$_SESSION['user']->actualClassroom()->id()}'</script>";
}
$unit = $_SESSION['unit'];

$step = max($_POST['step-input'], $unit->step());
?>
<body>
<div class="content-container">
    <div class="container move-up">
        <?php
        if ($unit->id() == 1) {
            switch ($step) {
                case 0:
                    include "1/exercise_1.php";
                    break;
                case 1:
                    include "1/exercise_2.php";
                    break;
                case 2:
                    include "1/exercise_3.php";
                    break;
                case 3:
                    include "1/exercise_4.php";
                    break;
                case 4:
                    include "1/exercise_5.php";
                    break;
                case 5:
                    include "1/exercise_6.php";
                    break;
                case 6:
                    include "1/exercise_7.php";
                    break;
                default:
                    echo "<script>window.location = '../classroom/classroom_details.php?id={$_SESSION['user']->actualClassroom()->id()}'</script>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
