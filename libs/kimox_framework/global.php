<?php
date_default_timezone_set('Europe/London');

/*
** @parameters: Name of variable | Value of variable
** @parametersType: (String, whatever)
** @return:
** Void
*/
function setGlobal($name, $value)
{
    $GLOBALS[$name] = $value;
}


/*
** @parameters: Name of a global variable
** @parametersType: (String)
** @return:
** The value of the global variable
*/
function getGlobal($name)
{
    return $GLOBALS[$name];
}

/*
** @parameters: ---
** @parametersType: ---
** @return:
** Real machine's IP
*/
function getRealIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];

    return $_SERVER['REMOTE_ADDR'];
}

function showMatrix($matrix)
{
    for ($i = 0; $i < count($matrix); $i++) {
        foreach ($matrix[$i] as $key => $value) {
            echo 'Campo [' . $i . '][' . $key . '] : ' . $value . '<br>';
        }
        echo '<br>';
    }
}

function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

function crypt_pass($password)
{
    $iv = mcrypt_create_iv(
        mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);

    $encrypted = base64_encode(
        $iv .
        mcrypt_encrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', "jpsdijpsdfg80u084t3545$$8i2", true),
            $password,
            MCRYPT_MODE_CBC,
            $iv
        )
    );
    return $encrypted;
}

function decrypt_pass($password)
{
    $data = base64_decode($password);
    $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

    $decrypted = rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', "jpsdijpsdfg80u084t3545$$8i2", true),
            substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
            MCRYPT_MODE_CBC,
            $iv
        ),
        "\0"
    );
    return $decrypted;
}

function formatFiles(&$userFiles, $fileList)
{
    foreach ($fileList as $item) {
        $path = explode("/", $item);
        $userFiles[count($userFiles)] = $path[count($path) - 2] . "/" . $path[count($path) - 1];
    }
}

include 'fileOptions.php';
$userFiles = array();
//formatFiles($userFiles, getFileList(__DIR__ . DIRECTORY_SEPARATOR . "../../init/"));
//formatFiles($userFiles, getFileList(__DIR__ . DIRECTORY_SEPARATOR . "../../subscripted/"));

spl_autoload_register(
    function ($class) {
        include_once '../classes/model/profiles/' . $class . '.php';
    }
);
spl_autoload_register(
    function ($class) {
        include_once '../classes/model/profiles/achievement/' . $class . '.php';
    }
);
spl_autoload_register(
    function ($class) {
        include_once '../classes/model/classroom/' . $class . '.php';
    }
);
spl_autoload_register(
    function ($class) {
        include_once '../classes/model/game/' . $class . '.php';
    }
);
spl_autoload_register(
    function ($class) {
        include_once '../classes/model/game/equation/' . $class . '.php';
    }
);
spl_autoload_register(
    function ($class) {
        include_once '../classes/model/parser/' . $class . '.php';
    }
);
spl_autoload_register(
    function ($class) {
        include_once '../classes/model/util/' . $class . '.php';
    }
);
spl_autoload_register(
    function ($class) {
        include_once '../libs/phpmailer/class.phpmailer.php';
    }
);

function checkSession($url)
{
    global $userFiles;
    session_start();
    $user = $_SESSION['user'];
//    || ((!$user->is("Admin") && !$user->is("Manager")) && in_array(substr($_SERVER['REQUEST_URI'], 1, strpos($_SERVER['REQUEST_URI'], ".php") + 3), $userFiles) != 1)
    if (!isset($user))
        die("<script>location.href = '" . $url . "'</script>");

}

function makeJavaScriptListFromDatabase($field, $query, $field_name)
{
    $script = '<script type="text/javascript"> var ' . $field_name . ' = [';
    for ($i = 0; $i < count($query); $i++) {
        $script .= '"' . $query[$i][$field] . '",';
    }
    $script = substr($script, 0, -1);
    $script .= '];</script>';
    return $script;
}

function dateFormat($actualFormat, $newFormat, $date){
    return DateTime::createFromFormat($actualFormat, $date)->format($newFormat);
}

function checkBoxIsChecked($post){
    return (isset($post) ? 1 : 0);
}

function brecho($string){
    echo $string ."<br>";
}

function alert($message)
{
    echo "<script>alert('{$message}')</script>";
}

function isMobile(){
    $useragent=$_SERVER['HTTP_USER_AGENT'];

    return preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4)) ? true : false;
}

function getCurrentPage(){
    return $_SERVER['REQUEST_URI'];
}

function separate($delimiter, $array){
    $result = "";
    foreach ($array as $item) $result .= $item . " {$delimiter} ";
    substr($result, 0, (strlen($delimiter) + 2) * -1);
}