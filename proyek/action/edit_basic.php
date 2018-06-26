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
                $nama = $_POST['nama'];
                $id_anggota = $_SESSION['id'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $sql = "SELECT * from tb_admin where id_anggota=$id_anggota";
                $query= $conn->prepare($sql);
                $query->execute();
                $count = $query->rowCount();
                if($count == 1){
                    $sql="UPDATE tb_admin set username=:username, email=:email, nama=:nama where id_anggota=:id_anggota";
                    $query= $conn->prepare($sql);
                    $dataAdmin = array(
                        ':username' => $username,
                        ':email' => $email,
                        ':nama' => $nama,
                        ':id_anggota' => $id_anggota
                    );
                    $query->bindValue( ":id_anggota", $id_anggota, PDO::PARAM_INT );
                    $query->execute($dataAdmin);
                    header('Location: ../member.php?page=pengaturan');
                }else{
                    $nama = $_POST['nama'];
                    $id_anggota = $_SESSION['id'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $sql="UPDATE tb_anggota set username=:username, email=:email, nama=:nama where id_anggota=:id_anggota";
                    $query= $conn->prepare($sql);
                    $dataAdmin = array(
                        ':username' => $username,
                        ':email' => $email,
                        ':nama' => $nama,
                        ':id_anggota' => $id_anggota
                    );
                    $query->bindValue( ":id_anggota", $id_anggota, PDO::PARAM_INT );
                    $query->execute($dataAdmin);
                    $_SESSION['username']=$username;
                    $_SESSION['email']=$email;
                    $_SESSION['nama']=$nama;
                    header('Location: ../member.php');
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