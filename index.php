<?php	
    session_start();
    if(empty($_SESSION['username'])){
    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Digital Library | Akademi Komunitas Negeri Kajen</title>
    <link rel="shortcut icon" href="proyek/icon.png" type="image/x-icon">
    <link rel="icon" href="proyek/icon.png" type="image/x-icon">
    <meta name="description" content="This is a free Bootstrap landing page theme created for BootstrapZero. Feature video background and one page design." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/animate.min.css" />
    <link rel="stylesheet" href="./css/ionicons.min.css" />
    <link rel="stylesheet" href="./css/styles.css" />
  </head>
  <body>    
    <?php 
        error_reporting(0);
        if($_GET['delete']==''){
            include 'assets/main.php';
        }else{
            include 'assets/delete.php';
        }
    ?>
    
    <footer id="footer">
        <div class="container-fluid">
        
            <span class="pull-right text-muted small">© 2018 Digital Library. All Rights Reserved | Design by <a href="http://www.github.com/oratakashi">Politeknik Negeri Bandung</a></span>
        </div>
    </footer>
    <div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-body">
        		<img src="" id="galleryImage" class="img-responsive" />
        		<p>
        		    <br/>
        		    <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">Close <i class="ion-android-close"></i></button>
        		</p>
        	</div>
        </div>
        </div>
    </div>
    <!--scripts loaded here -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.easing.min.js"></script>
    <script src="./js/wow.js"></script>
    <script src="./js/scripts.js"></script>
  </body>
</html>
    <?php }
    else{
        header('location: proyek/member.php');
    }
?>