<?php

function decrypt($encrypted, $password, $salt='!kQm*fF3pXe1Kbm%9') {
// Build a 256-bit $key which is a SHA256 hash of $salt and $password.
$key = hash('SHA256', $salt . $password, true);
// Retrieve $iv which is the first 22 characters plus ==, base64_decoded.
$iv = base64_decode(substr($encrypted, 0, 22) . '==');
// Remove $iv from $encrypted.
$encrypted = substr($encrypted, 22);
// Decrypt the data.  rtrim won't corrupt the data because the last 32 characters are the md5 hash; thus any \0 character has to be padding.
$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv), "\0\4");
// Retrieve $hash which is the last 32 characters of $decrypted.
$hash = substr($decrypted, -32);
// Remove the last 32 characters from $decrypted.
$decrypted = substr($decrypted, 0, -32);
// Integrity check.  If this fails, either the data is corrupted, or the password/salt was incorrect.
if (md5($decrypted) != $hash) return false;
// Yay!
return $decrypted;
}

if(isset($_GET['file']) && $_GET['file'] != null){
$file = $_GET['file'];
include './config.php';
$con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or header('Location: ./mysql-error.php');
    $query = $con->prepare("SELECT name, type, size, content, password, salt FROM `" . $conf['mysql-table'] . "` WHERE `name` = ?");
    $query->bind_param("s", $_GET['file']);
    $query->execute();
    $query->bind_result($name, $type, $size, $content, $password, $salt);
    if ($row = $query->fetch()) {

    }
    if($password != NULL){
        $content = decrypt($content, $password);
    }
    echo $password;
header("Accept-Ranges: bytes");
    header("Keep-Alive: timeout=15, max=100");
    header("Content-Disposition: attachment; filename=$name");
    header("Content-type: $type");
    header("Content-Transfer-Encoding: binary");
    header( "Content-Description: File Transfer");
    echo stripslashes($content);
}else{
    header("Location: index.php");
}
