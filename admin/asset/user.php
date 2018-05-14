
<?php 
    error_reporting(0);

    if($_GET['page']=="user"){
        include 'asset/content/content-user.php';
    }
    elseif($_GET['page']=="user-tambah"){
        include 'content/tambah-user.php';
    }
?>