<?php
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                $nim = $_POST['nim'];
                $username = $_POST['username'];
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $password = sha1($_POST['password']); //Encrypt Password menggunakan SHA1
                $cpassword = sha1($_POST['cpassword']);
                
                if($password == $cpassword){
                    $sql = "insert into tb_anggota (nim,username,nama,email, password) 
                    values (:nim, :username, :nama, :email, :password)";
                    $query= $conn->prepare($sql);
                    $dataAnggota = array(
                        ':nim' => $nim,
                        ':username' => $username,
                        ':nama' => $nama,
                        ':email' => $email,
                        ':password' => $password
                    );
                    $query->bindValue( ":nim", $nim, PDO::PARAM_INT );
                    $query->execute($dataAnggota);
                    
                    header('Location: ../dashboard.php?page=user');
                }
                else{
                    echo "Password dan Konfirmasi Password tidak sama";
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