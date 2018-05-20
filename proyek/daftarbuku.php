<!-- Import Script Buat Login -->
<?php
	session_start();
	if(empty($_SESSION['username'])){
		?>
		<!DOCTYPE html>
		<html lang="zxx">
			<head>
				<title>Digital Library | Akademi Komunitas Negeri Kajen</title>
				<!-- Import JQuery dan CSS -->
				<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
				<?php include 'asset/css.php'?>
			</head>
			<body>
				<div class="wthree_agile_admin_info">
					<?php include 'asset/main-nav.php'?>
					<div class="clearfix"></div>
					<?php 
						error_reporting(0);
						if($_GET['kategori']==""){
                            include 'asset/content/daftar-buku.php';
                        }
                        else{
                            include 'asset/content/daftar-buku.php';
                        }
					?>
				</div>
				<!-- Import Javascript dan Footer -->
				<?php include 'asset/footer.php'?>	
				<?php include 'asset/script.php'?>
			</body>
		</html>
  	<?php }else{
?>
<!-- HTML di Mulai -->
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>Digital Library | Akademi Komunitas Negeri Kajen</title>
		<!-- Import JQuery dan CSS -->
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<?php include 'asset/css.php'?>
	</head>
	<body>
		<div class="wthree_agile_admin_info">
			<?php include 'asset/user-nav.php'?>
			<div class="clearfix"></div>
			<?php 
				error_reporting(0);
				if($_GET['kategori']==""){
					include 'asset/content/daftar-buku.php';
				}
				else{
					include 'asset/content/daftar-buku.php';
				}
			?>
		</div>
		<!-- Import Javascript dan Footer -->
		<?php include 'asset/footer.php'?>	
		<?php include 'asset/script.php'?>
	</body>
</html>
<?php } ?>