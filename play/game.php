<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';
if ($_SESSION['game'] instanceof Single)
    unset($_SESSION['game']);

if (isset($_GET['id'])) {
    $duel = Duel::retrieveDuel($_GET['id']);;
    if ($duel != null) {
        $_SESSION['achievements'] = Achievement::achievements();
        $_SESSION['user'] = new Student($duel->player2()->username());
    }else{
        header("Location: ../init/index.php");
    }
}

?>
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Jugar</title>
</head>
<?php
include "../menu.php";

?>
<body>
<div class="content-container">
    <div class="container">

        <div class="center-block text-center">
            <?php
            $game = $duel;
            if (isset($_POST['player2'])) {
                if (setQuery("*", "equation_duel", "player1='{$_SESSION['user']->username()}' AND player2='{$_POST['player2']}' AND finished=0", connect()) == false){
                    $mode = rand(0, 4);
                    $game = new Duel($_SESSION['user'], new Student($_POST['player2']), (new EquationGenerator(rand(2, 8), $mode))->generate(), $mode);
                }else{
                    die("<script>window.location = '../init/index.php';</script>");
                }
            } else if (isset($_POST['equation'])) {
                $game = new Single("", $_POST['mode'], Equation::parseEquation($_POST['equation']));
            } else if (!isset($game)) {
                $game = new Single($_POST['terms'], $_POST['mode']);
            }
            $game->start();

            $_SESSION['game'] = $game;

            if (isset($_SESSION['duel']) && !$_SESSION['duel']->isFinished())
                $game = $_SESSION['duel'];
            else
                unset($_SESSION['duel']);

            if ($game instanceof Duel)
                $_SESSION['duel'] = $game;

            $solutionPosition = rand(0, $game->nSolutions());


            ?>
            <div class="sprite-equation">
                <?php
                brecho(SpriteParser::EquationToSprite($game->equation()->toString()));
//                brecho($game->getRealSolution());
                ?>
            </div>
            <?php
            if ($game instanceof Single && ($avatarFound = $game->findRandomAvatar()) != null) {
                ?>
                <img class="avatar" height='75px' src=../<?php echo $avatarFound->path() ?>><br>
                Si aciertas a la primera desbloqueras este increible avatar
                <?php
            }
            ?>
            <div class="breather"></div>
            <div class="breather"></div>
            <div class="breather"></div>
            <div class="col-md-offset-5 col-md-2">
                <ul class="list-group">
                    <?php
                    for ($i = 0; $i < $game->nSolutions() + 1; $i++) {
                        ?>
                        <li onclick="selectedAnswer(this)" class="list-group-item">
                            <?php echo $i == $solutionPosition ? $game->getRealSolution() : $game->getFakeSolution(); ?>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>


    <form method="post" id="start-game">
        <input type="hidden" id="mode" name="mode">
        <input type="hidden" id="terms" name="terms">
    </form>

    <!-- Modal confirm solution -->
    <div class="modal fade" id="answer" tabindex="-1" role="dialog" aria-labelledby="new-answerLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <p><strong>Confirma tu respuesta:</strong></p>
                    <p id="answer-p"></p>
                </div>
                <div class="modal-footer center-block">
                    <button type="submit" id="confirm-answer" data-dismiss="modal"
                            class="btn btn-warning center-block">Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $("#navbar-title").text("¡Nueva ecuación!");


    function selectedAnswer(element) {
        $("#answer-p").text($(element).text());

        $.post("../ajax/checkSolution.php", {sol: $(element).text()})
            .done(function (data) {
                console.log("Solución recibida: ");
                console.log(data);
                if (data) {
                    window.location = "play.php";
                }
                else
                    toastr.error("¡Te has equivocado!", "¡Ohhhhhh!");
            });
    }

    function submitForm(mode, terms) {
        $('#mode').val(mode);
        $('#terms').val(terms);
        $('#start-game').submit();
    }


    toastr.options = {
        "positionClass": "toast-top-center",
        "preventDuplicates": true
    }
</script>

</html>