<?php
    session_start();
    if(empty($_SESSION['username'])){
          header('Location: index.php'); //mengembalikan ke login
    }else{
		require_once ("koneksi.php");
		$connection = new ConnectionDB();
        $conn = $connection->getConnection();
		$status = 1;
		$id = $_SESSION['id'];
		$sql = "UPDATE tb_anggota SET statuslogin=$status where id_anggota = :id";
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id);
		$result->execute();
		$sql = "SELECT statuslogin from tb_anggota where id_anggota = :id";
		$result = $conn->prepare($sql);
        $result->bindParam(':id', $id);
		$result->execute();
		foreach($result as $data){
			$_SESSION['status'] = $data['statuslogin'];
		}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Digital Library | Akademi Negeri Kajen</title>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="shortcut icon" href="icon.png" type="image/x-icon">
<link rel="icon" href="icon.png" type="image/x-icon">
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