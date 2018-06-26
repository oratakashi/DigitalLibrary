<?php 
session_start();
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        $kode_buku = $_GET['id'];
        $sql = "SELECT jumlah_download from tb_statistik where kode_buku=$kode_buku";
        $query = $conn->prepare($sql);
        $query->execute();
        foreach($query as $sebelum){}
        $jumlah = $sebelum['jumlah_download'] + 1;
        $sql = "UPDATE tb_statistik set jumlah_download=$jumlah where kode_buku=$kode_buku";
        $query = $conn->prepare($sql);
        $query->execute();
        $sql = "SELECT nama_berkas from tb_berkas where kode_buku = $kode_buku";
        $query = $conn->prepare($sql);
        $query->execute();
        foreach($query as $buku){}
        $berkas = $buku['nama_berkas'];
        header("location: ../../tmp/files/$berkas");
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>