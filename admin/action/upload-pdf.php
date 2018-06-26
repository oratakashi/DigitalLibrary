<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                //deklarasi var
                $kd_buku = $_GET['kode_buku'];
                //Mulai Buat PDF
                $sql="SELECT * from tb_berkas where kode_buku=$kd_buku";
                $result = $conn->prepare($sql);
                $result->execute();
                $count=$result->rowCount();
                if($count == 0){
                    $berkas = $_FILES['berkas']['name'];
                    $tmp_berkas = $_FILES['berkas']['tmp_name'];
                    $berkasbaru = $kd_buku.$berkas;
                    $file_type=$_FILES['berkas']['type'];
                    $path_berkas = "../../tmp/files/".$berkasbaru;
                    if($file_type=="application/pdf"){
                        if(move_uploaded_file($tmp_berkas, $path_berkas)){
                            $sql="INSERT into tb_berkas (kode_buku, nama_berkas) VALUES('$kd_buku', '$berkasbaru')";
                            $query= $conn->prepare($sql);
                            $query->execute();
                            header('Location: ../dashboard.php?page=buku');
                        }else{
                            echo "Gagal Menyimpan Data";
                        }
                    }
                }else{
                    $berkas = $_FILES['berkas']['name'];
                    $tmp_berkas = $_FILES['berkas']['tmp_name'];
                    $berkasbaru = $kd_buku.$berkas;
                    $file_type=$_FILES['berkas']['type'];
                    $path_berkas = "../../tmp/files/".$berkasbaru;
                    $sql = "SELECT * from tb_berkas where kode_buku = '$kd_buku'";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    foreach($query as $data){}
                    if(is_file("../../tmp/files/".$data['nama_berkas'])) {// Jika foto ada
                        unlink("../../tmp/files/".$data['nama_berkas']);
                    }
                    if($file_type=="application/pdf"){
                        if(move_uploaded_file($tmp_berkas, $path_berkas)){
                            $sql="UPDATE tb_berkas set nama_berkas='$berkasbaru' where kode_buku = '$kd_buku'";
                            $query= $conn->prepare($sql);
                            $query->execute();
                            header('Location: ../dashboard.php?page=buku');
                        }else{
                            echo "Gagal Menyimpan Data";
                        }
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