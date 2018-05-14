<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                //deklarasi var
                $kd_buku = $_POST['kd_buku'];
                $judul = $_POST['judul'];
                $pengarang = $_POST['pengarang'];
                $penerbit = $_POST['penerbit'];
                $kategori = $_POST['kategori'];
                $sql = "update tb_buku set kode_buku=:kd_buku, judul=:judul, pengarang=:pengarang, penerbit=:penerbit, kategori=:kategori where kode_buku=:kd_buku";
                    $query= $conn->prepare($sql);
                    $dataBuku = array(
                        ':kd_buku' => $kd_buku,
                        ':judul'=> $judul,
                        ':pengarang' => $pengarang,
                        ':penerbit' => $penerbit,
                        ':kategori' => $kategori                        
                    );
                    $query->bindValue( ":kd_buku", $kd_buku, PDO::PARAM_INT );
                    $query->execute($dataBuku);
                    header('Location: ../dashboard.php?page=buku');
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}
$simpan = new masukan();
$simpan -> masukdb();
?>