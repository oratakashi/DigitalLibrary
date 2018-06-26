<?php
    session_start();
    require_once ("../koneksi.php");
    class masukan {
        function masukdb(){
            $connection = new ConnectionDB();
            $conn = $connection->getConnection();
            if(empty($_SESSION['username'])){
                header('Location: ../login.php'); //mengembalikan ke login
            }else{
                $kode_buku = $_GET['id'];
                $id_anggota = $_SESSION['id'];
                try{
                    $sql = "delete from tb_favorit where id_anggota = $id_anggota and kode_buku = $kode_buku";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute();
                    header("location: ../detailbuku.php?id=$kode_buku");
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
        }
    }
    $simpan = new masukan();
    $simpan -> masukdb();
?>