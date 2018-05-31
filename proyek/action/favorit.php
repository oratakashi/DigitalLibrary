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
                    $sql = "insert into tb_favorit (id_anggota, kode_buku) values ($id_anggota, $kode_buku)";
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