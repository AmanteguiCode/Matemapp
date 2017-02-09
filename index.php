<?php
session_start();

$_SESSION['credentials'] = array('dsn' => 'mysql:host=db655557030.db.1and1.com; dbname=db655557030; charset=utf8', 'username' => 'dbo655557030', 'password' => 'Matemapp2016' );

header('Location: init/index.php');
