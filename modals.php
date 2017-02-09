<?php if ($_SESSION['user']->hasReachedNextLevel()) { ?>
    <div class="modal fade in" id="level-up" tabindex="-1" role="dialog" aria-labelledby="level-upLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1>¡Enhorabuena!</h1>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i style="color: #eae367" class="fa fa-trophy fa-5x"></i>
                        <div class="breather"></div>
                        <h1>¡Has subido de nivel!</h1>
                        <h4>Has alcanzado el nivel <?php echo $_SESSION['user']->level() ?></h4>
                    </div>
                    <?php if ($_SESSION['user']->level() == 3 || $_SESSION['user']->level() == 5 || $_SESSION['user']->level() == 7 || $_SESSION['user']->level() == 9) { ?>
                        <hr>
                        <div class="text-center">
                            <h2>¡Avatares nuevos desbloqueados!</h2>
                            <h4><a href="../profile/profile.php">¡Ve a tu perfil a verlos!</a></h4>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer center-block">
                    <button type="submit" id="confirm-answer" data-dismiss="modal" class="btn btn-warning center-block">Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>$("#level-up").modal()</script>
    <?php
}
?>
<?php
$achievement = $_SESSION['achievement'];
unset($_SESSION['achievement']);
if (isset($achievement)) { ?>
    <div class="modal fade in" id="achievement-unlocked" tabindex="-1" role="dialog" aria-labelledby="achievement-unlockedLabel">
        <div class="modal-dialog text-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>¡Enhorabuena!</h1>
                </div>
                <div class="modal-body">
                    <h1>¡Has conseguido un logro!</h1>
                    <h3><?php echo $achievement->condition() ?></h3>
                    <img src="..<?php echo $achievement->path() ?>" alt="">
                    <h3><?php echo $achievement->description() ?></h3>
                </div>
                <div class="modal-footer center-block">
                    <button type="submit" id="confirm-answer" data-dismiss="modal" class="btn btn-warning btn-inverted center-block">Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>$("#achievement-unlocked").modal()</script>
    <?php
}
?>

<?php
$duelQuery = setQuery("*", "equation_duel", "player2='{$_SESSION['user']->username()}' AND finished=0", connect());
if ($duelQuery != false && !isset($_SESSION['notifications']) && strpos(getCurrentPage(), "game.php") == false && strpos(getCurrentPage(), "didactics.php") == false && strpos(getCurrentPage(), "didactics/index.php") == false) {
    $rival = new Student($duelQuery[0]['player1']);
    ?>
    <div class="modal fade in" id="duel-incoming" tabindex="-1" role="dialog" aria-labelledby="duel-incomingLabel">
        <div class="modal-dialog text-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>¡<?php echo $rival->name() ?> te ha retado!</h1>
                </div>
                <div class="modal-body">
                    <h2>¡Elige jugar ahora o más tarde!</h2>
                </div>
                <div class="modal-footer center-block">
                    <form id="duel-form" action="../play/game.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $duelQuery[0]['id'] ?>">
                        <input onclick="$('#duel-form').submit()" type="submit" data-dismiss="modal" class="btn btn-warning btn-inverted center-block" value="Jugar">
                    </form>
                    <input onclick="noMoreNotifications()" type="submit" data-dismiss="modal" class="btn btn-primary btn-inverted center-block" value="No recordar en esta sesión">
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#duel-incoming").modal()
        function noMoreNotifications() {
            $.post("http://matemapp.adrianmujica.es/dismissNotifications.php", {});
        }
    </script>
    <?php
    unset($duelQuery);
}
?>

<?php
$game = $_SESSION['duel'];
if (isset($game) && $game instanceof Duel && strpos(getCurrentPage(), "game.php") == false) {
    unset($_SESSION['duel']);

    $iAmTheWinner = false;

    if ($game->isFinished())
        $iAmTheWinner = $game->winner()->username() == $_SESSION['user']->username();

    if ($iAmTheWinner)
        $_SESSION['achievements']['Excalibur']->unlock();

    ?>
    <div class="modal fade in" id="competitive" tabindex="-1" role="dialog" aria-labelledby="resultLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1><?php echo $game->isFinished() ? "¡Enhorabuena!" : "¡A esperar!" ?></h1>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <?php
                        if ($game->isFinished()) {
                            ?>
                            <h3>Has completado la ecuación, aquí tienes tus resultados</h3>
                            <?php
                        } else {
                            ?>
                            <h3>Ahora es el turno de tu compañero/a, ¡paciencia!</h3>
                            <?php
                        }
                        ?>


                        <img class="avatar" style="height: 75px;" src="..<?php echo $_SESSION['user']->avatarURL() ?>" alt="">

                        <div class="breather"></div>

                        <?php if ($game->isFinished()) { ?>
                            <div class="text-center">
                                <div>
                                    <?php if ($iAmTheWinner) { ?>
                                        <h3>¡Victoria!</h3>
                                        <div><i style="color: #eae367" class="fa fa-trophy fa-4x"></i></div>
                                    <?php } else {
                                        ?>
                                        <h3>Derrota...</h3>
                                        <div><i style="color: rgba(116, 116, 116, 1)" class="fa fa-trophy fa-4x"></i></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php if ($iAmTheWinner) { ?>
                                    <div>
                                        <h4>Experiencia</h4>
                                        <h4>
                                            <?php echo $game->experience(); ?> pts.
                                        </h4>
                                    </div>
                                <?php } else {
                                    ?>
                                    <h3>¡La próxima lo harás mejor!</h3>
                                    <h4><?php echo $game->reason(); ?></h4>
                                    <?php
                                }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-warning btn-inverted ">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#competitive").modal();
    </script>
    <?php
}
?>
<?php
$game = $_SESSION['game'];
unset($_SESSION['game']);
if (isset($game) && $game->isFinished() && $game instanceof Single) {
    $_SESSION['achievements']['Penicilina']->unlock();
    $equation = (new Top(1, "id"))->equationData()[0];
    ?>
    <div class="modal fade in" id="result" tabindex="-1" role="dialog" aria-labelledby="resultLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1>¡Enhorabuena!</h1>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h3>Has completado la ecuación, aquí tienes tus resultados</h3>


                        <img class="avatar" style="height: 75px;" src="..<?php echo $_SESSION['user']->avatarURL() ?>" alt="">

                        <div class="breather"></div>

                        <div style="display: inline-flex;" class="text-center">
                            <div style="margin-right: 20px">
                                <h4>Trofeos</h4>
                                <div><?php echo $equation->trophies(2); ?></div>
                            </div>
                            <div>
                                <h4>Tiempo</h4>
                                <div>
                                    <i class="icon material-icons"><?php echo $equation->getFace(); ?></i>
                                </div>
                            </div>
                            <div style="margin-left: 20px">
                                <h4>Experiencia</h4>
                                <h4>
                                    <?php echo $equation->experience(); ?> pts.
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="center-block">
                    <?php
                    if ($game->avatar() != null && $game->avatar()->isUnlocked()) {
                        ?>
                        <hr>
                        <div class='text-center'>
                            <h3>¡Desbloqueo conseguido!</h3>
                            <img class="avatar" style="height: 75px;" src=..<?php echo $game->avatar()->path() ?>>
                            <div class="breather"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="modal-footer">
                        <button onclick="smoothAvatarMove()" type="submit" id="confirm-answer" data-dismiss="modal" class="btn btn-warning btn-inverted ">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#result").modal();
        function smoothAvatarMove() {
            $("#top-avatar").animate({
                right: "+=<?php echo((130 / ($_SESSION['user']->realNextLevelExp())) * ($game->experience())) ?>"
            }, 500);
        }
    </script>
    <?php
}
?>

<?php
$game = $_SESSION['cooperative'];
if (isset($game) && $game->isFinished() && $game instanceof Cooperative) {
    unset($_SESSION['cooperative']);
    ?>
    <div class="modal fade in" id="cooperative-result" tabindex="-1" role="dialog" aria-labelledby="cooperative-resultLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1>¡Partida cooperativa terminada!</h1>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h3>Has completado la ecuación, aquí tienes tus resultados</h3>


                        <img class="avatar" style="height: 75px;" src="..<?php echo $_SESSION['user']->avatarURL() ?>" alt="">

                        <div class="breather"></div>

                        <div style="display: inline-flex;" class="text-center">
                            <div style="margin-right: 20px">
                                <h4><?php echo $game->player1(); ?></h4>
                                <div><i class="material-icons"><?php echo $game->answer1() == $game->getRealSolution() ? "sentiment_satisfied" : "sentiment_dissatisfied" ?></i></div>
                            </div>
                            <div>
                                <h4><?php echo $game->player2(); ?></h4>
                                <div><i class="material-icons"><?php echo $game->answer2() == $game->getRealSolution() ? "sentiment_satisfied" : "sentiment_dissatisfied" ?></i></div>
                            </div>
                            <div style="margin-left: 20px">
                                <h4><?php echo $game->player3(); ?></h4>
                                <div><i class="material-icons"><?php echo $game->answer3() == $game->getRealSolution() ? "sentiment_satisfied" : "sentiment_dissatisfied" ?></i></div>
                            </div>
                            <div style="margin-left: 20px">
                                <h4><?php echo $game->player4(); ?></h4>
                                <div><i class="material-icons"><?php echo $game->answer4() == $game->getRealSolution() ? "sentiment_satisfied" : "sentiment_dissatisfied" ?></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="confirm-answer" data-dismiss="modal" class="btn btn-warning btn-inverted ">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#cooperative-result").modal();
    </script>
    <?php
}
?>
