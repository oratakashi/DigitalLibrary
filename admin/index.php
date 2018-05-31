<?php
/**
 * Created by Macbook Pro.
 * User: Oratakashi
 * Date: 7/5/2018
 * Time: 5:30 PM
 */

// turn the session on here
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Admin Login - Digital Library</title>            
        
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" href="css/login.css">
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>        
        
        <!-- APP WRAPPER -->
        <?php
            if(empty($_SESSION['id'])){
                error_reporting(0);
                if($_GET['error']==""){
                    include 'asset/login-main.php';
                }
                if($_GET['error']=="true"){
                    include 'asset/login-error.php';
                }
            }
            else{
                require_once ("koneksi.php");
                $id_anggota = $_SESSION['id'];
                $connection = new ConnectionDB();
                $conn = $connection->getConnection();
                $sql 	= "SELECT * FROM tb_admin where id_anggota=$id_anggota";
                $result = $conn->prepare($sql);
                $result->execute();
                $count = $result->rowCount();
                if($count == 1){
                    header('Location: dashboard.php');
                }else{
                    include 'asset/login-main.php';
                }
            }
        ?>
        <!-- END APP WRAPPER -->
        <?php include 'asset/js-login.php'?>
    </body>
</html>