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
        $sql = "SELECT nama_file from tb_cover where kode_buku=$id";
        $result = $conn->prepare($sql);
        $result->execute();
        foreach($result as $data){}
        //var upload buku
        if(is_file("../../tmp/cover/".$data['nama_file'])) {// Jika foto ada
            unlink("../../tmp/cover/".$data['nama_file']);
        }
        $sql = "SELECT nama_file from tb_cover where kode_buku=$id";
        $result->execute();
        foreach($result as $data){}
        if(is_file("../../tmp/files/".$data['nama_berkas'])) {// Jika file ada
            unlink("../../tmp/files/".$data['nama_berkas']);
        }
        $sql = "DELETE FROM tb_cover where kode_buku=$id";
        header('location: ../dashboard.php?page=buku');
    }
}
$simpan = new buang();
$simpan -> buangdb();
?>