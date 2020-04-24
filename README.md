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
