<?php
require_once ("../koneksi.php");
class buang {
    function buangdb(){
        $id = $_GET['id_anggota'];
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        $sql = "DELETE FROM tb_admin where id_anggota=$id";
        $result = $conn->prepare($sql);
        $result->execute();
        header('location: ../dashboard.php?page=admin');
    }
}
$simpan = new buang();
$simpan -> buangdb();
?>