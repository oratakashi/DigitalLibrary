<?php
require_once ("../koneksi.php");
class buang {
    function buangdb(){
        $id = $_GET['kode_buku'];
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        $sql = "DELETE FROM tb_buku where kode_buku=$id";
        $result = $conn->prepare($sql);
        $result->execute();
        header('location: ../dashboard.php?page=buku');
    }
}
$simpan = new buang();
$simpan -> buangdb();
?>