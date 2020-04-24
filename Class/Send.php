<?php

require "Captcha.php";

class Send {

    public function message($data)
    {
        
        $recaptcha = $data["g-recaptcha-response"];
        $message = $data["message"];

        $captcha = new Captcha();
        $response = $captcha->get($recaptcha);

        if($response->success != true){
            return false;
        }

        if($response->success == true && $response->score < 0.3){
            return false;
        }

        return true;

    }

}