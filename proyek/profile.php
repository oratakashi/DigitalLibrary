<?php
    session_start();
    if(empty($_SESSION['username'])){
          header('Location: login.php'); //mengembalikan ke login
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
				$id = $_GET['id'];
				if($id ==  $_SESSION['nim']){
					include 'asset/content/main-profile.php';
				}else{
					require_once ("koneksi.php");
					$connection = new ConnectionDB();
                    $conn = $connection->getConnection();
                    $sql 	= "SELECT * FROM tb_anggota where nim=$id";
                    $result = $conn->prepare($sql);
					$result->execute();
					$count = $result->rowCount();
                    if($count == 1){
						include 'asset/content/user-profile.php';
					}
				}
				/*if($_GET['page']==""){
					include 'asset/content/main-profile.php';
				}*/
				
		?>
</div>
<?php include 'asset/footer.php'?>	
<?php include 'asset/script.php'?>
</body>
</html>
<?php } ?>