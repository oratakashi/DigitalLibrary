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
                    $password = $_POST['password'];

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