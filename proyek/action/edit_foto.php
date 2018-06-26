<?php
session_start();
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                //Dapetin ID Pengguna dari Session
                $id_anggota = $_SESSION['id'];
                //var upload foto
                $foto = $_FILES['gambar']['name'];
                $tmp_foto = $_FILES['gambar']['tmp_name'];
                $fotobaru = $id_anggota.$foto;
                // Set Lokasi folder tempat menyimpan fotonya
                $path_foto = "../../tmp/foto/".$fotobaru;
                $sql="SELECT * from tb_foto where id_anggota=$id_anggota";
                $result = $conn->prepare($sql);
                $result->execute();
                $count=$result->rowCount();
                foreach($result as $data){}
                if($count == 0){
                    if(move_uploaded_file($tmp_foto, $path_foto)){
                        $sql="INSERT into tb_foto (id_anggota, nama_file) VALUES('$id_anggota', '$fotobaru')";
                        $query= $conn->prepare($sql);
                        $query->execute();
                        $_SESSION['foto']=$fotobaru;
                        header("location: ../member.php");
                    }else{
                        echo "Gagal Menyimpan Data";
                    }
                }else{
                    if(is_file("../../tmp/foto/".$data['nama_file'])) {// Jika foto ada
                        unlink("../../tmp/foto/".$data['nama_file']);
                    }
                    if(move_uploaded_file($tmp_foto, $path_foto)){
                        $sql="UPDATE tb_foto set nama_file = '$fotobaru' where id_anggota='$id_anggota'";
                        $query= $conn->prepare($sql);
                        $query->execute();
                        $_SESSION['foto']=$fotobaru;
                        header("location: ../member.php");
                    }else{
                        echo "Gagal Menyimpan Data";
                    }
                }
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>