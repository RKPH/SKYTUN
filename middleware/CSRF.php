<?php

class CSRF {
    // properties
    public static $token;
    
    //methods
    //create token
    public static function createToken() {
        $token = openssl_random_pseudo_bytes(32);
        $token = bin2hex($token);
        
        self::$token = $token;
    }

    // output a unique token as a hidden input in a form
    public static function outputToken() {
        if(!isset($_SESSION['token'])) {
            self::createToken();
            $_SESSION['token'] = self::$token;
        } 
        echo "<input type='hidden' name='csrf' value='". self::$token . "'>";
    }

    // check token is valid upon submission
    public static function checkToken($req) {
        if(!empty($req)) {
            if(!isset($req['csrf']) || $_SESSION['token'] != $req['csrf']) {
                include "views/_403.php";
                self::clearToken();
                exit;
            }
            self::clearToken();
        }
    }
    // clear token
    public static function clearToken() {
        unset($_SESSION['token']);
    }
}