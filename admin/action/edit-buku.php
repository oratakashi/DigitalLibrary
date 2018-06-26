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
                //var upload foto
                $foto = $_FILES['gambar']['name'];
                $tmp_foto = $_FILES['gambar']['tmp_name'];
                $fotobaru = $kd_buku.$foto;
                // Set Lokasi folder tempat menyimpan fotonya
                $path_foto = "../../tmp/cover/".$fotobaru;
                $sql = "update tb_buku set kode_buku=:kd_buku, judul=:judul, pengarang=:pengarang, penerbit=:penerbit, kategori=:kategori, sinopsis=:sinopsis, deskripsi=:deskripsi where kode_buku=:kd_buku";
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
                $sql="SELECT * from tb_cover where kode_buku = $kd_buku";
                $query=$conn->prepare($sql);
                $query->execute();
                foreach($query as $data){}
                    if(is_file("../../tmp/cover/".$data['nama_file'])) {// Jika foto ada
                        unlink("../../tmp/cover/".$data['nama_file']);
                    }
                    if(move_uploaded_file($tmp_foto, $path_foto)){
                        $sql="UPDATE tb_cover set nama_file = '$fotobaru' where kode_buku='$kd_buku'";
                        $query=$conn->prepare($sql);
                        $query->execute();   
                        header('Location: ../dashboard.php?page=buku');
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