# recaptcha
## How to add reCAPTCHA to form

**You will need to register a new site in the Google reCAPTCHA admin panel**

https://www.google.com/recaptcha/admin/create

**After creating your website, you will generate two keys. The site key is the secret.**

**Enter the keys in the file Config/Config.php**

```PHP
<?php

define("SITE_KEY", "Your site key here");
define("SECRET_KEY", "Your secret key here");
```

**When the login page is loaded, a request will be executed returning a token.**

**Enter the site key in the request.**

```JS
grecaptcha.ready(function () {
    grecaptcha
        .execute('Your site key here', { action: 'homepage' })
        .then(token => console.log(token));
});
```

**In the form, it is necessary to import the script that performs the request to return the token and the reCAPTCHA api script, passing the site key.**

```HTML
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
<script src="./js/reCAPTCHA.js"></script>
```

**In the Send class, the Captcha class is imported, which makes the request returning some data.**

**This request returns the score, which goes from 0.0 to 1.0.**
**The closer to 1.0, it means you are less likely to be a robot performing the submit. This way you can define the validation accuracy according to the security of your software.**

```PHP
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
```
