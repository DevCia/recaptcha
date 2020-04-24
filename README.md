# recaptcha
 How to add reCAPTCHA to form

You will need to register a new site in the Google reCAPTCHA admin panel

https://www.google.com/recaptcha/admin/create

After creating your website, you will generate two keys. The site key is the secret.

Enter the keys in the file Config/Config.php

```PHP
<?php

define("SITE_KEY", "Your site key here");
define("SECRET_KEY", "Your secret key here");
```

When the login page is loaded, a request will be executed returning a token.

Enter the site key in the request.

```JS
grecaptcha.ready(function () {
    grecaptcha
        .execute('Your site key here', { action: 'homepage' })
        .then(token => console.log(token));
});
```

In the form, it is necessary to import the script that performs the request to return the token and the reCAPTCHA api script, passing the site key.

```HTML
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
<script src="./js/reCAPTCHA.js"></script>
```
