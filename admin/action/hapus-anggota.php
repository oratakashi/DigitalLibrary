<?php
require_once ("../koneksi.php");
class buang {
    function buangdb(){
        $id = $_GET['id_anggota'];
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        $sql = "DELETE FROM tb_anggota where id_anggota=$id";
        $result = $conn->prepare($sql);
        $result->execute();
        header('location: ../dashboard.php?page=user');
    }
}
$simpan = new buang();
$simpan -> buangdb();
?>