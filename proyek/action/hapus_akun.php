<?php
session_start();
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        try{
            $id_anggota = $_SESSION['id'];
            $sql = "DELETE from tb_anggota where id_anggota='$id_anggota'";
            $query= $conn->prepare($sql);
            $query->execute();
            session_destroy();
            header('location: ../../index.php?delete=true');
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>