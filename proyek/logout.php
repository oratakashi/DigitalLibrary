<?php
class Logout {
    function getOut(){
        session_start();
        require_once ("koneksi.php");
		$connection = new ConnectionDB();
        $conn = $connection->getConnection();
		$status = 0;
		$id = $_SESSION['id'];
		$sql = "UPDATE tb_status SET statuslogin=$status where id_anggota = :id";
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id);
		$result->execute();
        session_destroy();
        header('Location: index.php');
        exit;
    }
}

$logout = new Logout();
$logout->getOut();