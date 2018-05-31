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
                $password = sha1($_POST['password']);
                $cpassword = sha1($_POST['cpassword']);//Encrypt Password menggunakan SHA1
                $lvluser = $_POST['lvluser'];
                
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
                    $sql = "SELECT id_anggota from tb_anggota where nim=$nim";
                    $cariid= $conn->prepare($sql);
                    $cariid->execute();
                    foreach($cariid as $ids){}
                    $id = $ids['id_anggota'];
                    $sql = "insert into tb_admin (id_anggota,username,nama,email, password, level_user) 
                    values (:id_anggota, :username, :nama, :email, :password, :level_user)";
                    $result= $conn->prepare($sql);
                    $dataAdmin= array(
                        ':id_anggota' => $id,
                        ':username' => $username,
                        ':nama' => $nama,
                        ':email' => $email,
                        ':password' => $password,
                        ':level_user' => $lvluser
                    );
                    $nyoba= $conn->prepare($sql);
                    $nyoba->bindValue( ":id_anggota", $id, PDO::PARAM_INT );
                    $nyoba->execute($dataAdmin);
                    header('Location: ../dashboard.php?page=admin');
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