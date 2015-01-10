<?php

function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
function encrypt($decrypted, $password, $salt='!kQm*fF3pXe1Kbm%9') {
// Build a 256-bit $key which is a SHA256 hash of $salt and $password.
$key = hash('SHA256', $salt . $password, true);
// Build $iv and $iv_base64.  We use a block size of 128 bits (AES compliant) and CBC mode.  (Note: ECB mode is inadequate as IV is not used.)
srand(); $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
if (strlen($iv_base64 = rtrim(base64_encode($iv), '=')) != 22) return false;
// Encrypt $decrypted and an MD5 of $decrypted using $key.  MD5 is fine to use here because it's just to verify successful decryption.
$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $decrypted . md5($decrypted), MCRYPT_MODE_CBC, $iv));
// We're done!
return $iv_base64 . $encrypted;
}

include './config.php';
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
} else {
    $tmpName = $_FILES['file']['tmp_name'];
    $fp = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);
    
    $password = NULL;
    if($_POST['password'] != ""){
        $content = encrypt($content, $_POST['password']);
        $password = $_POST['password'];
        echo "boo hooo! (I've stoped doing propper debugging now...)<br>";
    }
    //echo $password."<br>";
    //echo $content."<br>";
    //echo isset($_POST['password'])."<br>";
    //echo "'".$_POST['password']."'<br>";

    $name = getName(15).".".$extension;
    $rmcode = getName(32);
    $con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or header('Location: ./mysql-error.php');
    $q = "INSERT INTO `" . $conf['mysql-table'] . "` (`name`, `size`, `type`, `content`, `removalcode`, `password`, `salt`) VALUES (?, ?, ?, ?, ?, ?, ?);";
    //echo $q;
    $query = $con->prepare($q);
   // echo var_dump($query);
    $content = addslashes($content);
    $query->bind_param("sssssss", $name , $_FILES['file']['size'], $_FILES['file']['type'], $content, $rmcode, $password, $salt);
    $query->execute();

    session_start();
    $_SESSION["rmcode"] = $rmcode;
    header('Location: done.php?file=' . $name);
}