<?php
session_start();
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            $id_anggota = $_SESSION['id'];
            $sql="SELECT * from tb_foto where id_anggota=$id_anggota";
            $result = $conn->prepare($sql);
            $result->execute();
            $count=$result->rowCount();
            foreach($result as $data){}
            if(is_file("../../tmp/foto/".$data['nama_file'])) {// Jika foto ada
                unlink("../../tmp/foto/".$data['nama_file']);
            }
            $sql = "DELETE from tb_foto where id_anggota=$id_anggota";
            $result = $conn->prepare($sql);
            $result->execute();
            if(isset($_SESSION['foto'])){
                unset($_SESSION['foto']);
            }
            $sql = "SELECT * from tb_foto where id_anggota=$id_anggota";
            $result = $conn->prepare($sql);
            $result->execute();
            $count = $result->rowCount();
            if($count == 0){
                $_SESSION['foto']="default.jpg";
            }
            header('location: ../member.php');

        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>