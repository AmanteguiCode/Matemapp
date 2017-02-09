<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

checkSession('../login/login.php');

$game = $_SESSION['game'];
$solution = $_POST['sol'];

if ($game instanceof Single) {
    $game->addTry();

    if ($game->getRealSolution() == $solution) {
        $game->finish();
        echo true;
    } else
        echo false;

    $_SESSION['game'] = $game;
}
else if ($game instanceof Duel){
    if ($game->player1()->username() == $_SESSION['user']->username())
        $game->setSolution1($solution);
    else
        $game->setSolution2($solution);

    $game->finish();
    
    $_SESSION['duel'] = $game;

    echo true;
} else if (isset($_SESSION['cooperative'])){
    echo updateQuery("answer{$_POST['playerNumber']}, rightAnswers", "{$_POST['sol']}, {$_SESSION['cooperative']->rightAnswers()}", "equation_cooperative", "id='{$_POST['id']}'", connect());
}