
<?php 
    error_reporting(0);

    if($_GET['page']=="buku"){
        include 'content/content-buku.php';
    }
    elseif($_GET['page']=="user-tambah"){
        include 'content/tambah-buku.php';
    }
?>