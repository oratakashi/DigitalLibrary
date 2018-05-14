<?php
    session_start();
    if(empty($_SESSION['username'])){
          header('Location: index.php');
    }else{
      error_reporting(0);
      if($_GET['cari']==""){
          header('Location: dashboard.php?page=buku');
      }
      else{
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <title>Admin Panel - Digital Library</title>
        <meta name="viewport" content/content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content/content="yes">
        <?php include 'asset/css.php'?>
        </head>
        <body>
        <?php include 'asset/header.php'?>
        <!-- /navbar -->
        <div class="subnavbar">
          <div class="subnavbar-inner">
            <?php 
              include 'asset/navbar-buku.php';
            ?>
            <!-- /container --> 
          </div>
          <!-- /subnavbar-inner --> 
        </div>
        <!-- /subnavbar -->

        <!-- /main -->
        <?php 
            include 'asset/content/cari_buku.php';
        ?>
        <!-- /extra -->
        <div class="footer">
          <div class="footer-inner">
            <div class="container">
              <div class="row">
                <div class="span12"> &copy; 2018 Digital Library. All Rights Reserved Design by <a href="#">Politeknik Negeri Bandung</a>. </div> 
              </div>
            </div>
          </div>
        </div>
        <?php include 'asset/js-main.php'?>
        </body>
        </html>
        <?php
      }
    }
?>

