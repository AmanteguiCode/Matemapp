<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

?>
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Unidad didáctica</title>
</head>
<?php
include "../menu.php";

if (!isset($_SESSION['unit'])) {
    $unit = new Unit($_POST['unit-input']);
    $_SESSION['unit'] = $unit;
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
                    include "1/step_1.php";
                    break;
                case 1:
                    include "1/step_2.php";
                    break;
                case 2:
                    include "1/step_3.php";
                    break;
                case 3:
                    include "1/step_4.php";
                    break;
                case 4:
                    include "1/step_5.php";
                    break;
                case 5:
                    include "1/step_6.php";
                    break;
                case 6:
                    include "1/step_7.php";
                    break;
                default:
                    echo "<script>window.location = '../classroom/classroom_details.php?id={$_SESSION['user']->actualClassroom()->id()}'</script>";
            }
        }
        include 'controls.php';
        ?>
    </div>
</div>
</body>
</html>