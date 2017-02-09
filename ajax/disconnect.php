<?php
include '../libs/kimox_framework/query.php';
include '../libs/kimox_framework/global.php';

checkSession('../login/login.php');

if (isset($_SESSION['cooperative'])){
    echo updateQuery("player{$_POST['player']}, answer{$_POST['player']}, state{$_POST['player']}", "NULL, NULL, 0" ,"equation_cooperative", "id = '{$_POST['id']}'", connect());
    deleteQuery("equation_cooperative", "player1 is NULL AND player2 is NULL AND player3 is NULL AND player4 is NULL AND finished = 0", connect());
}