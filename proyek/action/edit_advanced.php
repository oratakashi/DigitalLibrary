<?php
session_start();
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        try{
            if(isset($_POST['submit'])){
                //Deklarasi
                $id_anggota = $_SESSION['id'];
                $tgllahir = $_POST['tgllahir'];
                $tmplahir = $_POST['tmplahir'];
                $alamat = $_POST['alamat'];
                $nohp = $_POST['nohp'];
                $fb = $_POST['fb'];
                $ig = $_POST['ig'];
                $sql = "UPDATE tb_detailanggota set alamat=:alamat, tmplahir=:tmplahir, tgllahir=:tgllahir, no_hp=:nohp, facebook=:fb, instagram=:ig where id_anggota=:id_anggota";
                $query = $conn -> prepare($sql);
                $dataDetail = array(
                    ':alamat' => $alamat,
                    ':tmplahir' => $tmplahir,
                    ':tgllahir' => $tgllahir,
                    ':nohp' => $nohp,
                    ':fb' => $fb,
                    ':ig' => $ig,
                    ':id_anggota' => $id_anggota
                );
                $query->bindValue( ":id_anggota", $id_anggota, PDO::PARAM_INT );
                $query->execute($dataDetail);
                header('Location: ../member.php');
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>