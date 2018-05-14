<!-- Import Script Buat Login -->
<?php
	session_start();
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
        	<?php include 'asset/main-nav.php'?>
			<div class="clearfix"></div>
			<?php 
				
				if(empty($_SESSION['username'])){
					error_reporting(0);
					if($_GET['page']==""){
						include 'asset/content/main-content.php';
					}
					elseif($_GET['page']=="kategori"){
						include 'asset/content/kategori-buku.php';
					}
					elseif($_GET['page']=="login"){
						include 'asset/sessions/login.php';
					}
					elseif($_GET['page']=="daftarbuku"){
						include 'asset/content/daftar-buku.php';
					}
				}
				else{
					header('Location: member.php');
				}
			
				
			?>
		</div>
		<!-- Import Javascript dan Footer -->
		<?php include 'asset/footer.php'?>	
		<?php include 'asset/script.php'?>
	</body>
</html>