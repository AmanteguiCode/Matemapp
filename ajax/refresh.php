<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

checkSession('../login/login.php');

$query = setQuery("*", "equation_cooperative", "id='{$_POST['id']}'", connect());


$cooperative = $_SESSION['cooperative'];

$json["success"] = $query != false;

$json["timeouts"] = $cooperative->update($query);

$game = ["player1" => $query[0]["player1"], "player2" => $query[0]["player2"], "player3" => $query[0]["player3"], "player4" => $query[0]["player4"], "answer1" => $query[0]["answer1"], "answer2" => $query[0]["answer2"], "answer3" => $query[0]["answer3"], "answer4" => $query[0]["answer4"], "state1" => $query[0]["state1"], "state2" => $query[0]["state2"], "state3" => $query[0]["state3"], "state4" => $query[0]["state4"]];

$json["game"] = $game;

$json["states"] = $cooperative->states();

if ($game['answer1'] != null && $game['answer2'] != null && $game['answer3'] != null && $game['answer4'] != null){
    $cooperative->finish();
}

$json["finished"] = $cooperative->isFinished();

$_SESSION['cooperative'] = $cooperative;

echo json_encode($json);