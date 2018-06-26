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
                $sinopsis = $_POST['sinopsis'];
                $deskripsi = $_POST['deskripsi'];
                //var upload buku
                $foto = $_FILES['gambar']['name'];
                $tmp_foto = $_FILES['gambar']['tmp_name'];
                $fotobaru = $kd_buku.$foto;
                // Set path folder tempat menyimpan fotonya
                $path_foto = "../../tmp/cover/".$fotobaru;

                //=============================
                $sql = "insert into tb_buku values (:kd_buku, :judul, :pengarang, :penerbit, :kategori, :sinopsis, :deskripsi)";
                $query= $conn->prepare($sql);
                $dataBuku = array(
                    ':kd_buku' => $kd_buku,
                    ':judul'=> $judul,
                    ':pengarang' => $pengarang,
                    ':penerbit' => $penerbit,
                    ':kategori' => $kategori,
                    ':sinopsis' => $sinopsis,                    
                    ':deskripsi' => $deskripsi
                );
                $query->bindValue( ":kd_buku", $kd_buku, PDO::PARAM_INT );
                $query->execute($dataBuku);
                if(move_uploaded_file($tmp_foto, $path_foto)){
                    $sql="INSERT into tb_cover (kode_buku, nama_file) VALUES('$kd_buku', '$fotobaru')";
                    $query= $conn->prepare($sql);
                    $query->execute();
                    header("location: ../edit-buku.php?kode_buku=$kd_buku&src=tambahbuku");
                }else{
                    echo "Gagal Menyimpan Data";
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