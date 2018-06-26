<?php
/**
 * Created by PhpStorm.
 * User: putuguna
 * Date: 7/18/2016
 * Time: 8:09 AM
 */
require_once ("koneksi.php");
class Login {
    function loginToYourDashboard(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                if(empty($_POST['username']) || empty($_POST['password'])){
                    header('Location: index.php');
                }else{
                    $username = $_POST['username'];
                    $password = sha1($_POST['password']);
                    
                    $sql = "SELECT * FROM tb_admin";
                    $result = $conn->prepare($sql);
                    $result->execute();

                    foreach($result as $data){
                        if($username!=$data['username']){
                            header('Location: index.php?error=true');
                        }else if($password!=$data['password']){
                            header('Location: index.php?error=true');
                        }else{
                            session_start(); // turn the session on
                            $_SESSION['username'] = $username; // use username as the session
                            $_SESSION['nama'] = $data['nama'];
                            $_SESSION['level_user'] = $data['level_user'];
                            $_SESSION['id'] = $data['id_anggota'];
                            $_SESSION['email'] = $data['email'];
                            $id = $data['id_anggota'];
                            $sql="SELECT nim from tb_anggota where id_anggota=$id";
                            $query = $conn->prepare($sql);
                            $query -> execute();
                            foreach($query as $nim);
                            $_SESSION['nim'] = $nim['nim'];
                            $sql = "SELECT * from tb_foto where id_anggota=$id";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $count = $result->rowCount();
                            if($count == 0){
                                $_SESSION['foto']="default.jpg";
                            }else{
                                foreach($result as $hasil){}
                                $_SESSION['foto']=$hasil['nama_file'];
                            }
                            header('Location: dashboard.php');
                        }
                    }
                }
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}

$login = new Login();
$login->loginToYourDashboard();