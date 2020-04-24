<?php

require "../Class/Send.php";

$send = new Send();

if($send->message($_POST)){
    return header("location: ../index.php?success=true");
}

return header("location: ../index.php?error=true");