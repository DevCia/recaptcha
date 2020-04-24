<?php require "Config/Config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recaptcha</title>
</head>
<body>

    <?php if(isset($_GET["success"])){ ?> 
        <h6>Mensgem enviada com sucesso!</h6>
    <?php } ?>
    <?php if(isset($_GET["error"])){ ?>
        <h6>Ocorreu um erro, tente mais tarde por favor!</h6>
    <?php } ?>

    <form action="Controller/message.php" method="post">
        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
        <input type="text" name="message">
        <button id="submit" type="submit">Send</button>
    </form>

    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
    <script src="./js/reCAPTCHA.js"></script>
    
</body>
</html>