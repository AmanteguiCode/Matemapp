<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

?>
<!doctype html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <title>Jugar</title>
</head>
<?php
include "../menu.php";
$equationData = EquationData::getLastEquation($_SESSION['user']->username());

if ($equationData != false) {
    $sprite = SpriteParser::EquationToSprite($equationData->equation());

    $time = $equationData->timeInSeconds();

    $face = $equationData->getFace();

    $trophies = $equationData->trophies();
}
unset($_SESSION['cooperative']);
?>
<body>
<div class="modal fade" id="cooperative-modal" tabindex="-1" role="dialog" aria-labelledby="cooperative-modalLabel">
    <div class="modal-dialog text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Modo cooperativo</h1>
            </div>
            <div class="modal-body">
                <h3>¿Qué quieres hacer?</h3>
                <a href="cooperative.php" class="btn btn-primary btn-inverted">Crear partida</a>
                <a href="#" onclick="$('#search-match').modal(); searchingCoopMatch = true ; searchMatch();" class="btn btn-primary btn-inverted">Unirse a partida</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="search-match" tabindex="-1" role="dialog" aria-labelledby="search-matchLabel">
    <div class="modal-dialog text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Buscando partida</h1>
            </div>
            <div class="modal-body">
                <h3>Buscando</h3>
                <i class="fa fa-spinner fa-pulse fa-4x fa-fw" aria-hidden="true"></i>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-inverted" onclick="searchingCoopMatch = false;" data-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

<div class="content-container">
    <div class="container">

        <?php if ($equationData != false) { ?>
            <h1 class="text-center move-up">Tú ultima ecuación</h1>
            <div class="sprite-equation center-block text-center">
                <?php
                brecho($sprite);
                ?>
            </div>
            <div class="col-xs-12 col-md-6 col-md-offset-3 col-lg-6">
                <div class="col-xs-12 col-md-12 text-center" style="margin-top: 20px">
                    <div class="col-xs-12 col-md-6 text-center">
                        <h2 class="text-center">Tiempo</h2>
                        <i class="icon material-icons"><?php echo $face ?></i>
                    </div>
                    <div class="col-xs-12 col-md-6 text-center">
                        <h2 class="text-center">Trofeos</h2>
                        <?php
                        echo $trophies;
                        ?>
                    </div>
                </div>
            </div>

            <div class="breather"></div>
            <div class="breather"></div>
            <div class="breather"></div>


            <h1 class="text-center">Tú top ten</h1>
            <div class="center-block text-center">

                <?php
                $top = new Top(10, "experience");
                foreach ($top->equationData() as $equationData) {
                    ?>
                    <li onclick="$('#<?php echo $equationData->id(); ?>').collapse('toggle')" class="list-group-item list-item sprite-equation">
                        <span><?php echo SpriteParser::EquationToSprite($equationData->equation()); ?></span>
                        <div style="color: black" class="collapse row" aria-expanded="false" id="<?php echo $equationData->id(); ?>">
                            <div class="col-xs-6 text-right">Trofeos</div>
                            <div class="col-xs-6"><?php echo $equationData->trophies(1); ?></div>
                            <br>
                            <div class="col-xs-6 text-right">Tiempo</div>
                            <div class="col-xs-6"><i class="icon material-icons"><?php echo $equationData->getFace(); ?></i></div>
                            <br>
                            <div class="col-xs-6 text-right">Dificultad</div>
                            <div class="col-xs-6 text-left"><?php echo $equationData->modeName(); ?></div>
                            <br>
                            <div class="col-xs-6 text-right">Experiencia</div>
                            <div class="col-xs-6 text-left"><?php echo $equationData->experience(); ?> pts.</div>
                        </div>
                    </li>
                    <?php
                }
                ?>

            </div>

            <?php
        } else {
            ?>
            <h1 class="text-center" style="margin-top: -20px">¿Aún no has hecho ninguna ecuación?</h1>
            <h2 class="text-center"><a href="#" onclick="submitForm(0, 2)">¡Haz ya una!</a></h2>
            <?php
        }
        ?>
    </div>
    <form action="game.php" method="post" id="start-game">
        <input type="hidden" id="mode" name="mode">
        <input type="hidden" id="terms" name="terms">
    </form>
</div>
</body>
<script>
    $("#navbar-title").text("Jugar");

    var searchingCoopMatch = false;

    function submitForm(mode, terms) {
        $('#mode').val(mode);
        $('#terms').val(terms);
        $('#start-game').submit();
    }

    function searchMatch() {
        if (searchingCoopMatch) {
            $.post("../ajax/searchMatch.php", {}).done(function (data) {
                console.log("Mensaje recibido: " + data);
                if (data) {
                    window.location = 'cooperative.php';
                } else
                    setTimeout(searchMatch, 1000);
            })
        }
    }
</script>
</html>