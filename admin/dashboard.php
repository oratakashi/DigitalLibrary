<?php
    session_start();
    if(empty($_SESSION['username'])){
          header('Location: index.php'); //mengembalikan ke login
    }else{
      require_once ("koneksi.php");
      $id_anggota = $_SESSION['id'];
			$connection = new ConnectionDB();
			$conn = $connection->getConnection();
			$sql 	= "SELECT * FROM tb_admin where id_anggota=$id_anggota";
			$result = $conn->prepare($sql);
			$result->execute();
      $count = $result->rowCount();
      if($count == 1){
        error_reporting(0);
        if($_GET['page']==""){
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
                  error_reporting(0);

                  if($_GET['page']=="buku"){
                      include 'asset/navbar-buku.php';
                  }
                  elseif($_GET['page']=="buku-tambah"){
                    include 'asset/navbar-buku.php';
                  }
                  elseif($_GET['page']=="user"){
                    include 'asset/navbar-user.php';
                  }
                  elseif($_GET['page']=="user-tambah"){
                    include 'asset/navbar-user.php';
                  }
                  elseif($_GET['page']=="admin"){
                    include 'asset/navbar-admin.php';
                  }
                  elseif($_GET['page']=="admin-tambah"){
                    include 'asset/navbar-admin.php';
                  }
                ?>
                <!-- /container --> 
              </div>
              <!-- /subnavbar-inner --> 
            </div>
            <!-- /subnavbar -->

            <!-- /main -->
            <?php 
                error_reporting(0);

                if($_GET['page']=="user"){
                    include 'asset/user.php';
                }
                elseif($_GET['page']=="buku"){
                  include 'asset/buku.php';
                }
                elseif($_GET['page']=="admin"){
                  include 'asset/admin.php';
                }
                elseif($_GET['page']=="admin-tambah"){
                  include 'asset/admin.php';
                }
                elseif($_GET['page']=="buku-tambah"){
                  include 'asset/content/tambah-buku.php';
                }
                elseif($_GET['page']=="user-tambah"){
                  include 'asset/content/tambah-user.php';
                }
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
    }else{
      
      header('location: index.php');
    }
  }
?>

