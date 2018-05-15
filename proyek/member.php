<?php
    session_start();
    if(empty($_SESSION['username'])){
          header('Location: index.php'); //mengembalikan ke login
    }else{
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Digital Library | Akademi Negeri Kajen</title>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<?php include 'asset/css.php'?>
</head>
<body>
<div class="wthree_agile_admin_info">
        <?php include 'asset/user-nav.php'?>
		<div class="clearfix"></div>
		<?php 

			
				error_reporting(0);
				if($_GET['page']==""){
					include 'asset/content/main-content.php';
				}
				if($_GET['page']=="kategori"){
					include 'asset/content/kategori-user.php';
				}
				if($_GET['page']=="daftarbuku"){
					include 'asset/content/daftar-buku.php';
				}
		?>
</div>
<?php include 'asset/footer.php'?>	
<?php include 'asset/script.php'?>
</body>
</html>
<?php } ?>