<?php
	include 'connection.php';

    $debug = false;

	/* 
	** @parameters: Fields to select | Objective table | Conditions to select (String|String|String)
	** @return: 
	** If the sentence was successful:
	** A matrix that contains: First dimension -> 	Rows selected | Second dimension -> Fields of the row selected
	** If the sentence was unsuccessful:
	** false
	*/
	function setQuery ($field,$table,$condition, $gdb){
        global $debug;
		if (strrpos($condition, "ORDER BY") === false){
			if (!(strrpos($condition, "=") === false) || !(strrpos($condition, ">") === false)
				|| !(strrpos($condition, "<") === false)){
				$query = 'SELECT '.$field.' FROM '.$table.' WHERE '.$condition;
			}else{
				$query = 'SELECT '.$field.' FROM '.$table;
			}
		}else{
			if ((strrpos($condition, "=") === false) && (strrpos($condition, ">") === false)
				&& (strrpos($condition, "<") === false)) {
				$query = 'SELECT '.$field.' FROM '.$table.' '.$condition;
			}else{
				$query = 'SELECT '.$field.' FROM '.$table.' WHERE '.$condition;
			}
		}
        if ($debug) {
            echo $query . "<br>";
        }
		if($gdb != null){
			$result = $gdb->query($query);
		}else{
			echo "<p id=\"fail\"><br>ERROR: No estas conectado a una base de datos.<br></p>";
			return false;
			exit;
		}
		if (count($result) != 0 && $result->rowCount() > 0) {	
			$arrayValues = null;
			$xRow=0;
			foreach ($result as $row) {
				$array_keys = array_keys($row);				
				for ($keysIterator=0; $keysIterator < count($row)/2; $keysIterator++) {
					if ($row[$keysIterator] != ""){
						$arrayField = $array_keys[$keysIterator*2];
						$arrayValues[$xRow][$arrayField] = $row[$keysIterator];
					}
				}
				$xRow++;
			}
			return $arrayValues;
		}else{
			// Yo no devolvería este mensage de error, puesto que puede darse el caso 
			// que no nos interese mostrarlo, mejor lanzar el mensaje que queramos en la 
			// página que llamemos este metodo y si devuelve falso decimos el error o no.
			//echo "<p id=\"fail\"><br>Error: Tamaño de la consulta ".$result->rowCount().".<br></p>";
			return false;
		}
	}


	/* 
	** @parameters: Objective table | Connection to database
	** @parametersType: (String, PDO)
	** @return: 
	** Successfuly:
	** Amount of rows of the objective table
	** Unsuccessfuly:
	** false
	*/
	function getAmount($table, $gdb){
		$query = 'SELECT * FROM '.$table;
		if($gdb != null){
			$result = $gdb->query($query);
		}else{
			echo "<p id=\"fail\"><br>ERROR: No estas conectado a una base de datos.<br></p>";
			return false;
			exit;
		}
		if ($query == false) {
			echo "<p id=\"fail\"><br>¡FALLO A LA HORA DE SELECCIONAR LAS FILAS!<br></p>";
			return false;
			exit;
		}else{
			return $result->rowCount();
		}
	}


	/* 
	** @parameters: Fields to update | Updating values | Objective table | Conditions to update | Connection to database
	** @parametersType: (String, String, String, String, PDO)
	** @return: 
	** Successfuly:
	** true
	** Unsuccessfuly:
	** false
	*/
	function updateQuery ($field,$update,$table,$condition, $gdb){
        global $debug;

		$fieldsArray = explode(",", $field);
		$fieldsArray = arrayStrimed($fieldsArray);
		$updateArray = explode(",", $update, count($fieldsArray));
		$updateArray = arrayStrimed($updateArray);
		
		if(substr($updateArray[0], 0, 1) == '"'){
			$updateArray[0] = substr($updateArray[0], 1);
		}
		if(substr($updateArray[count($updateArray) -1], -1) == '"'){
			$updateArray[count($updateArray) -1] = substr($updateArray[count($updateArray) -1], 0, -1);			
		}

		$set = "";
		for ($i=0; $i < count($fieldsArray); $i++) {
			$value = $updateArray[$i] == "NULL" ? $updateArray[$i] : "\"{$updateArray[$i]}\"";
			if ($i == count($fieldsArray)-1){
				$set = $set.$fieldsArray[$i].' = ' . $value . ' ';
			}else{
				$set = $set.$fieldsArray[$i].' = '. $value .', ';
			}
		}

		if (strlen($condition) != 0){
			$query = "UPDATE ".$table." SET ".$set." WHERE ".$condition;
		}else{
			$query = "UPDATE ".$table." SET ".$set;
		}
        if ($debug) {
            echo $query . "<br>";
        }
		return checkQuery($query, $gdb);
	}

	/* 
	** @parameters: Objective table | Conditions to delete | Connection to database
	** @parametersType: (String, String, PDO)
	** @return: 
	** Successfuly:
	** true
	** Unsuccessfuly:
	** false
	*/    	
	function deleteQuery ($table,$condition, $gdb){
        global $debug;
        if ($condition == ""){
			$query="DELETE FROM ".$table;	
		}else{
			$query="DELETE FROM ".$table." WHERE ".$condition;
		}
        if ($debug) {
            echo $query . "<br>";
        }
		return checkQuery($query, $gdb);
	}

	/* 
	** @parameters: Objective table | Fields to insert | Inserting values | Connection to database
	** @parametersType: (String, String,, String, PDO)
	** @return: 
	** Successfuly:
	** true
	** Unsuccessfuly:
	** false
	*/    	
	function insertQuery ($table, $fields, $values, $gdb){
        global $debug;
		$fieldsArray = explode(",", $fields);
		$fieldsArray = arrayStrimed($fieldsArray);
		$valuesArray = explode(",", $values, count($fieldsArray));
		$valuesArray = arrayStrimed($valuesArray);
		$setValues = "";
		if(substr($valuesArray[0], 0, 1) == '"'){
			$valuesArray[0] = substr($valuesArray[0], 1);
		}
		if(substr($valuesArray[count($valuesArray) -1], -1) == '"'){
			$valuesArray[count($valuesArray) -1] = substr($valuesArray[count($valuesArray) -1], 0, -1);			
		}
		for ($i=0; $i < count($valuesArray); $i++){
			if ($i == count($valuesArray)-1){
				$setValues = $setValues."'".$valuesArray[$i]."'";
			}else{
				$setValues = $setValues."'".$valuesArray[$i]."', ";
			}
		}
		
		$query="INSERT INTO ".$table." (".$fields.") VALUES (".$setValues.")";
        if ($debug) {
            echo $query . "<br>";
        }
		return checkQuery($query, $gdb);
	}

	function checkQuery($query, $gdb){
		if($gdb != null){
			$result = $gdb->query($query);
			if ($result != "" && $result->rowCount() > 0) {
				return true;
			}else{
				return false;
			}	
		}else{
			echo "<p id=\"fail\"><br>ERROR: No estas conectado a una base de datos.<br></p>";
			return false;
			exit;
		}
	}

	function arrayStrimed($array){
		for ($i=0; $i < count($array); $i++) { 
			$array[$i] = trim($array[$i]);
		}
		return $array;
	}
?>