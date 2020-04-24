<?php

require "../Config/Config.php";

class Captcha {

    public function get($secretKey)
    {
    
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response={$secretKey}");
    
        return json_decode($response);
        
    }

}