<?php
$unit = $_SESSION['unit'];
$page = "";
if (strpos(getCurrentPage(), "didactics.php") != false) {
    $unit->startExercise();
    $page = "index";
}else{
    if ($unit->step() < $_POST['step-input'])
        $unit->finishExercise();
    $page = "didactics";
}
?>

<form id="unit-form" method="post" action="<?php echo $page ?>.php">
    <input type="hidden" name="step-input" id="step-input">
    <input type="hidden" name="additional-input-0" id="additional-input-0">
    <input type="hidden" name="additional-input-1" id="additional-input-1">
    <input type="hidden" name="additional-input-2" id="additional-input-2">
</form>
<div class="text-center">
    <a href="#" class="btn btn-primary" onclick="sendData()">Siguiente</a>
</div>

<script>
    function sendData() {
        $('#step-input').val(<?php echo $unit->step() + ($page == "index" ? 1 : 0)?>);
        $('#unit-form').submit();
    }
</script>