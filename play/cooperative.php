<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

?>
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Jugar</title>
    <link rel="stylesheet" href="cooperative/css/style.css">
    <script src="cooperative/js/controller.js"></script>
</head>
<?php
include "../menu.php";

if (isset($_SESSION['cooperative'])) {
    $cooperative = $_SESSION['cooperative'];
    if ($cooperative->isFinished()){
        unset($_SESSION['cooperative']);
        $cooperative = Cooperative::newMatch();
    }
}
else
    $cooperative = Cooperative::newMatch();


$_SESSION['cooperative'] = $cooperative;

$cooperative->resetIterator();
?>
<body>
<div class="content-container">
    <div class="container text-center">
        <div class="sprite-equation">
            <?php
            brecho(SpriteParser::EquationToSprite($cooperative->equation()->toString()));
//            brecho($cooperative->getRealSolution());
            ?>
        </div>

        <div class="breather"></div>
        <div class="breather"></div>
        <div class="breather"></div>
        <div class="col-xs-12">
            <div class="col-xs-6 col-md-3 text-center border-left border-right">
                <div id="searching-player1" <?php echo $cooperative->player1() == null ? "" : "hidden" ?>>
                    <h3>Buscando</h3>
                    <div class="breather"></div>
                    <i class="fa fa-spinner fa-pulse fa-4x fa-fw" aria-hidden="true"></i>
                </div>
                <div id="player1-container" <?php echo $cooperative->player1() == null ? "hidden" : "" ?>>
                    <h4 id="player1-name"><?php echo $cooperative->player1() ?></h4>
                    <ul id="player1-solutions" class="list-group">
                        <?php
                        $solutionPosition = rand(0, $cooperative->nSolutions() - 1);
                        for ($i = 0; $i < $cooperative->nSolutions(); $i++) {
                            ?>
                            <li id="<?php echo $i ?>" onclick="<?php echo $cooperative->whichPlayerAmI() == 1 ? "selectedAnswer(this)" : "" ?>" class="list-group-item">
                                <?php echo $cooperative->getFakeSolution(); ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 text-center border-left border-right">
                <div id="searching-player2" <?php echo $cooperative->player2() == null ? "" : "hidden" ?>>
                    <h3>Buscando</h3>
                    <div class="breather"></div>
                    <i class="fa fa-spinner fa-pulse fa-4x fa-fw" aria-hidden="true"></i>
                </div>
                <div id="player2-container" <?php echo $cooperative->player2() == null ? "hidden" : "" ?>>
                    <h4 id="player2-name"><?php echo $cooperative->player2() ?></h4>
                    <ul id="player2-solutions" class="list-group">
                        <?php
                        for ($i = 0; $i < $cooperative->nSolutions(); $i++) {
                            ?>
                            <li id="<?php echo $i ?>" onclick="<?php echo $cooperative->whichPlayerAmI() == 2 ? "selectedAnswer(this)" : "" ?>" class="list-group-item">
                                <?php echo $cooperative->getFakeSolution(); ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 hidden-sm hidden-md hidden-lg"></div>
            <div class="col-xs-6 col-md-3 text-center border-left border-right">
                <div id="searching-player3" <?php echo $cooperative->player3() == null ? "" : "hidden" ?>>
                    <h3>Buscando</h3>
                    <div class="breather"></div>
                    <i class="fa fa-spinner fa-pulse fa-4x fa-fw" aria-hidden="true"></i>
                </div>
                <div id="player3-container" <?php echo $cooperative->player3() == null ? "hidden" : "" ?>>
                    <h4 id="player3-name"><?php echo $cooperative->player3() ?></h4>
                    <ul id="player3-solutions" class="list-group">
                        <?php
                        for ($i = 0; $i < $cooperative->nSolutions(); $i++) {
                            ?>
                            <li id="<?php echo $i ?>" onclick="<?php echo $cooperative->whichPlayerAmI() == 3 ? "selectedAnswer(this)" : "" ?>" class="list-group-item">
                                <?php echo $cooperative->getFakeSolution(); ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 text-center border-left border-right">
                <div id="searching-player4" <?php echo $cooperative->player4() == null ? "" : "hidden" ?>>
                    <h3>Buscando</h3>
                    <div class="breather"></div>
                    <i class="fa fa-spinner fa-pulse fa-4x fa-fw" aria-hidden="true"></i>
                </div>
                <div id="player4-container" <?php echo $cooperative->player4() == null ? "hidden" : "" ?>>
                    <h4 id="player4-name"><?php echo $cooperative->player4() ?></h4>
                    <ul id="player4-solutions" class="list-group">
                        <?php
                        for ($i = 0; $i < $cooperative->nSolutions(); $i++) {
                            ?>
                            <li id="<?php echo $i ?>" onclick="<?php echo $cooperative->whichPlayerAmI() == 4 ? "selectedAnswer(this)" : "" ?>" class="list-group-item">
                                <?php echo $cooperative->getFakeSolution(); ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="confirm-answer" tabindex="-1" role="dialog" aria-labelledby="confirm-answerLabel">
    <div class="modal-dialog text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>¿Estás seguro/a?</h1>
            </div>
            <div class="modal-body">
                <h3>Tu respuesta es</h3>
                <h1 id="answer"></h1>
            </div>
            <div class="modal-footer">
                <button href="#" class="btn btn-primary btn-inverted" onclick="sendAnswer()">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade in" id="finish-game" tabindex="-1" role="dialog" aria-labelledby="finish-gameLabel">
    <div class="modal-dialog text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Finalizando partida...</h1>
            </div>
            <div class="modal-body">
                <h3>Obteniendo resultados</h3>
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>

<div class="modal fade in" id="exit-player1" tabindex="-1" role="dialog" aria-labelledby="exit-PlayerLabel">
    <div class="modal-dialog text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>¡Desconexión!</h1>
            </div>
            <div class="modal-body">
                <h3>Jugador/a <?php echo $cooperative->player1() ?> desconectado/a.</h3>
            </div>
            <div class="modal-footer">
                <button href="#" data-dismiss="modal" class="btn btn-primary btn-inverted">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="exit-player2" tabindex="-1" role="dialog" aria-labelledby="exit-PlayerLabel">
    <div class="modal-dialog text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>¡Desconexión!</h1>
            </div>
            <div class="modal-body">
                <h3>Jugador/a <?php echo $cooperative->player2() ?> desconectado/a.</h3>
            </div>
            <div class="modal-footer">
                <button href="#" data-dismiss="modal" class="btn btn-primary btn-inverted">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="exit-player3" tabindex="-1" role="dialog" aria-labelledby="exit-PlayerLabel">
    <div class="modal-dialog text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>¡Desconexión!</h1>
            </div>
            <div class="modal-body">
                <h3>Jugador/a <?php echo $cooperative->player3() ?> desconectado/a.</h3>
            </div>
            <div class="modal-footer">
                <button href="#" data-dismiss="modal" class="btn btn-primary btn-inverted">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade in" id="exit-player4" tabindex="-1" role="dialog" aria-labelledby="exit-PlayerLabel">
    <div class="modal-dialog text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>¡Desconexión!</h1>
            </div>
            <div class="modal-body">
                <h3>Jugador/a <?php echo $cooperative->player4() ?> desconectado/a.</h3>
            </div>
            <div class="modal-footer">
                <button href="#" data-dismiss="modal" class="btn btn-primary btn-inverted">Aceptar</button>
            </div>
        </div>
    </div>
</div>

</body>
<script>
    var id = "<?php echo $cooperative->id() ?>";
    var whichPlayerAmI = <?php echo $cooperative->whichPlayerAmI() ?>;

    var start = function () {
        $('a:not(.navigation-drawer-toggle)').attr("onclick", "disconnect()");
        refresh();
    };
    $(document).ready(start);
</script>
</html>