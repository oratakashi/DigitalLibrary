<?php
class Logout {
    function getOut(){
        session_start();
        session_destroy();
        header('Location: ../index.php');
        exit;
    }
}

$logout = new Logout();
$logout->getOut();