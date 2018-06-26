
<?php 
    error_reporting(0);

    if($_GET['page']=="admin"){
        include 'content/content-admin.php';
    }
    elseif($_GET['page']=="admin-tambah"){
        include 'content/tambah-admin.php';
    }
?>