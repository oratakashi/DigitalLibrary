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
    <header id="first">
        <div class="header-content">
            <div class="inner">
                <h4>Selamat datang di</h4>
                <img src="proyek/images/logo.png" style="width:300px"></img>
                <h4 class="cursive">Belajar jadi lebih mudah dan murah</h4>
                <hr>
                <a href="proyek/login.php"  class="btn btn-primary btn-xl">Masuk sebagai Anggota</a> &nbsp;&nbsp; <a href="proyek" class="btn btn-primary btn-xl page-scroll">Masuk sebagai Pengunjung</a>
            </div>
        </div>
        <video autoplay="true" loop="true" class="fillWidth fadeIn wow collapse in" data-wow-delay="0s"  id="video-background">
            <source src="assets/video.mp4" type="video/mp4">Your browser does not support the video tag. I suggest you upgrade your browser.
        </video>
    </header>
    
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