<?php

class Encryption {

    public static function decrypt($encrypted, $password, $salt = '!kQm*fF3pXe1Kbm%9') {
        $key = hash('SHA256', $salt . $password, true);
        $iv = base64_decode(substr($encrypted, 0, 22) . '==');
        $encrypted = substr($encrypted, 22);
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv), "\0\4");
        $hash = substr($decrypted, -32);
        $decrypted = substr($decrypted, 0, -32);
        if (md5($decrypted) != $hash)
            return false;
        return $decrypted;
    }

    public static function encrypt($decrypted, $password, $salt = '!kQm*fF3pXe1Kbm%9') {
        $key = hash('SHA256', $salt . $password, true);
        srand();
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
        if (strlen($iv_base64 = rtrim(base64_encode($iv), '=')) != 22)
            return false;
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $decrypted . md5($decrypted), MCRYPT_MODE_CBC, $iv));
        return $iv_base64 . $encrypted;
    }

    public static function generateSalt() {
        $n = 64;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    }
}
