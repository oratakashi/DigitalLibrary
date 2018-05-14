<?php
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBNAME', 'dbcompany_171530001');
    try{
        $db = PDO("mysql:host=".DBHOST.";port:80;dbname=".DBNAME, DBUSER, DBPASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo '<p class="bg-danger">'.$e->getMassage().'</p>';
        exit;
    }
?>