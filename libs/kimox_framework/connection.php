<?php

	function connect(){
        try{
            session_start();
            $credentials = $_SESSION['credentials'];
            $gdb = new PDO($credentials['dsn'], $credentials['username'], $credentials['password']);
        }catch (PDOException $e){
            echo "No se ha podido conectar a la base de datos.";
            return null;
        }
        return $gdb;
    }