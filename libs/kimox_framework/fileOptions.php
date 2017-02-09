<?php

$arrayAudio = array("mp3", "wma");
$arrayImage = array("jpg", "gif", "png", "jpeg");
$arrayVideo = array("mp4", "avi", "mpeg", "wmv");
$arrayText = array("doc", "docx", "pdf", "xls", "ppt", "ptts", "rtf", "txt", "odt");


/* @parameters: Path to list | Depth of search (Default infinite) | List directories [1:Yes;0:No] (Default No)
** @parametersType: (String, Int, Int)
** @return: 
** Successfuly:
** Array of elements from the given path.
** Unsuccessfuly:
** False
*/
function getFileList($path, $rec = -1, $dir = 0){
    $dirCount = 0;
    $fileCount = 0;
    $arrayResult = array();
	if(is_dir($path)){
		if(substr($path, -1)!="/")
			$path=$path."/"; 
        $dh = opendir($path);
        if ($dir == 1) {
            $arrayResult[$fileCount] = $path;
            $fileCount++;
        }
    	while (($file = readdir($dh)) != false){
    		if($file!="." && $file!=".."){
    			if(is_dir($path.$file) && ($rec == -1 || $rec > 0)){
    				$dirArray[$dirCount] = $path.$file."/";
                    $dirCount++;
    			}
                if(filetype($path . $file)=="file"){
    	    		$arrayResult[$fileCount] = $path.$file;
                    $fileCount++;
                }

    		}
    	}
        while ($dirCount > 0){

            if ($rec == -1){
                $aux = getFileList($dirArray[$dirCount - 1], $rec, $dir);
            }else{
                $aux = getFileList($dirArray[$dirCount - 1],$rec - 1, $dir);
            }

            for ($j = 0; $j < count($aux); $j++){
                $arrayResult[$j + $fileCount] = $aux[$j];
            }

            $fileCount = count($arrayResult);
            
            $dirCount--;
        }

        closedir($dh);
    }else{
        return false;
    }
    return $arrayResult;
    
}

/* 
** @parameters: Path to delete | Show errors [-1:Show;1:No show] (Default -1)
** @parametersType: (String, Int)
** @return: 
** Successfuly:
** TRUE
** Unsuccessfuly:
** FALSE
*/ 
function rmFile($path, $noErrors = -1){
    if (is_dir($path)) {
        $arrayFiles = getFileList($path, -1, 1);
        if ($arrayFiles == false) {
            if ($noErrors == -1)
                echo "<p id=\"fail\">Error al borrar la carpeta ".$path." <br></p>";
            return false;
        }
        for ($i = count($arrayFiles) - 1; $i >= 0; $i--) { 
            if (is_dir($arrayFiles[$i])) {
                rmdir($arrayFiles[$i]);
            }else{
                if (unlink($arrayFiles[$i]) == false) {
                    if ($noErrors == -1)
                        echo "<p id=\"fail\">Error al borrar el fichero ".$arrayFiles[$i]." <br></p>";
                    return false;
                }
            }
        }
    }else{
        if (is_file($path)){
            if (unlink($path) == false){
                if ($noErrors == -1)
                    echo "<p id=\"fail\">Error al borrar el fichero <br></p>";
                return false;
            }
        }else{
            if ($noErrors == -1)
                echo "<p id=\"fail\">No existe la carpeta o fichero <br></p>";
            return false;
        }
    }
    return true;

}

/* 
** @parameters:  | Path to upload | Name of the input form | Upload type ("image", "video", "text", "audio") | Final file name
** @parametersType: (, String, String, String, String)
** @return: 
** Successfuly:
** TRUE
** Unsuccessfuly:
** FALSE
*/ 
function uploadFile($arrayFiles, $path, $uploadName, $uploadType, $finalFileName = ""){

    if (!is_dir($path)) {
        multiMkdir($path);
    }

    if(explode("/", $path)[0] == ".."){
        $tmpPath = substr($path, 2);
        $rPath = realpath(__DIR__ . DIRECTORY_SEPARATOR);
        $arrayPath = explode("/", $rPath);
        $path = $tmpPath;
    }

    $path = $_SERVER['DOCUMENT_ROOT'].$path;

    if(substr($path, -1)!="/"){
        $path=$path."/"; 
    }
    
    $uploaddir = $path;

    $arrayToUpload = $arrayFiles[$uploadName];

    if (count($arrayToUpload['size']) > 0) {

        $file_count = count($arrayToUpload['size']);
        if($file_count==1){
            upload($arrayToUpload, $finalFileName, 0, $uploadType, $uploaddir);
        }
        elseif ($file_count>1) {
            for ($i=0; $i < $file_count; $i++){
                upload($arrayToUpload, $finalFileName, $i, $uploadType, $uploaddir);
            }    
        }
        return true;
    }else{
        echo "<p id=\"fail\">Error, no existen ficheros para subir. <br></p>";
        return false;
    }
}

function upload($arrayToUpload, $finalFileName, $i, $uploadType, $uploaddir){

    $filesize = $arrayToUpload['size'][$i];

    $filename = trim($arrayToUpload['name'][$i]);

    $temp = explode(".", $filename);

    if ($temp == $filename) {
        echo "<p id=\"fail\">Error, el tipo del fichero ".$filename." no es válido <br></p>";
    }
    
    $filetype = $temp[count($temp) - 1];

    if (!checkFile($filetype, $filesize, $uploadType)){
        echo "<p id=\"fail\">Fallo de chequeo <br></p>";
        return false;
    }

    if (empty($finalFileName)) {
        $uploadfile = $uploaddir.$filename;
    }else{
        $uploadfile = $uploaddir.$finalFileName;
    }

    if (!copy($arrayToUpload['tmp_name'][$i],$uploadfile)) {
        $errors= error_get_last();
    echo "COPY ERROR: ".$errors['type'];
    echo "<br />\n".$errors['message'];
        echo "<p id=\"fail\">Error, no fue posible la copia al sistema. <br></p>";
        return false;
    }
    return true;
}

// Comprueba si el tipo y el tamaño del fichero es soportado
function checkFile($type, $size, $uploadType){
    switch (strtolower($uploadType)) {
        case 'audio':
            $arrayToCheck = array("mp3", "wma");
            $sizeCheck = 15728640;
            break;
        case 'video':
            $arrayToCheck = array("mp4", "avi", "mpeg", "wmv");
            $sizeCheck = 20971520;
            break;
        case 'image':
            $arrayToCheck = array("jpg", "gif", "png", "jpeg");
            $sizeCheck = 5242880;
            break;
        case 'text':
            $arrayToCheck = array("doc", "docx", "pdf", "xls", "ppt", "ptts", "rtf", "txt", "odt");
            $sizeCheck = 5242880;
            break;
        default:
            echo "<p id=\"fail\">Error en el tipo de archivo de subida.</p>";
            return false;
            break;
    }
    if (extExist(strtolower($type), $arrayToCheck)) {
        if ($size >= $sizeCheck) {
            echo "<p id=\"fail\">Error, el fichero supera los ".($sizeCheck/1024/1024)." MB.<br></p>";
            return false;
        }
    }else{
        echo "<p id=\"fail\">Error, el tipo ".$type." no es soportado por el sistema. <br></p>";
        return false;
    }

    return true;
}

/* 
** @parameters: Path to create
** @parametersType: (String)
** @return: 
** Successfuly:
** TRUE
** Unsuccessfuly:
** FALSE
*/ 
// el path no debe tener al principio la "/" ej. /home , esto no.
function multiMkdir($path){
    $array = explode("/", $path);
    $path = $array[0];
    
    if (!is_dir($path)) {
        if (!mkdir($path)) {
             echo "<p id=\"fail\">Error en la creacion de la carpeta ".$path."<br></p>";
             return false;
        }
    }
    for ($i=1; $i < count($array); $i++) { 
        $path = $path."/".$array[$i];
        if (!is_dir($path)) {
            if (!mkdir($path)) {
                echo "<p id=\"fail\">Error en la creacion de la carpeta ".$path."<br></p>";
                return false;
            }
        }
        
    }
    return true;
}

function extExist ($type, $arrayToSearch){
    for ($i=0; $i < count($arrayToSearch); $i++) { 
        if (strcmp($arrayToSearch[$i], $type) == 0) {
            return true;
        }
    }
    return false;
}


?>