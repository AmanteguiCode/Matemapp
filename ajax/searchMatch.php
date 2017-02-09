<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

checkSession('../login/login.php');

unset($_SESSION['cooperative']);

for ($i = 1; $i < 5; $i++) {
    $query = setQuery("*", "equation_cooperative", "player{$i}='{$_SESSION['user']->username()}' AND finished=0", connect());
    if ($query != false) {
        for ($j = 0; $j < count($query); $j++){
            updateQuery("player{$i}", "NULL", "equation_cooperative", "id = '{$query[$j]['id']}'", connect());
        }
    }
}

deleteQuery("equation_cooperative", "player1 is NULL AND player2 is NULL AND player3 is NULL AND player4 is NULL AND finished = 0", connect());

for ($i = 1; $i < 5; $i++) {
    $query = setQuery("*", "equation_cooperative", "player{$i} is NULL AND finished=0", connect());
    if ($query != false) {
        $match = rand(0, count($query) - 1);
        updateQuery("player{$i}, state{$i}", "{$_SESSION['user']->username()}, 1", "equation_cooperative", "id = '{$query[$match]['id']}'", connect());
        $players = [];
        for ($j = 1; $j < $i; $j++) {
            $players[] = $query[$match]['player' . $j];
        }
        $players[] = $_SESSION['user']->username();
        $solutions = fillSolutions($query);
        $_SESSION['cooperative'] = new Cooperative($query[$match]['id'], Equation::parseEquation($query[$match]['equation']), $query[$match]['mode'], $players, $solutions);
        echo true;
        exit;
    }
}
echo false;


function fillPlayers($i, $query)
{
    $players = [];
    for ($j = 1; $j < $i; $j++) {
        $players[] = $query[0]['player' . $j];
    }
    $players[] = $_SESSION['user']->username();
    return $players;
}

function fillSolutions($query){
    $solutions = [];
    for ($i = 1; $i < 6; $i++) {
        $solutions[] = $query[0]['solution' . $i];
    }
    return $solutions;
}