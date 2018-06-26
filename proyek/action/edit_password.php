<?php
session_start();
require_once ("../koneksi.php");
class masukan {
    function masukdb(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        try{
            if(isset($_POST['submit'])){
                //Deklarasi Variabel
                $id = $_SESSION['id'];
                $password = sha1($_POST['password']);
                $npassword = sha1($_POST['npassword']); //Enscrypt Password
                $cpassword = sha1($_POST['cpassword']);
                $sql = "SELECT * from tb_admin where id_anggota = '$id'";
                $result = $conn->prepare($sql);
                $result->execute();
                $count=$result->rowCount();
                foreach($result as $data){}
                if($count==1){
                    if($password!=$data['password']){
                        header('location: ../member.php?page=pengaturan&src=error');
                    }else{
                        if($cpassword!=$npassword){
                            header('location: ../member.php?page=pengaturan&src=error');
                        }
                        else{
                            $sql="UPDATE tb_admin set password = '$npassword' where id_anggota = '$id'";
                            $result=$conn->prepare($sql);
                            $result->execute();
                            $sql="UPDATE tb_anggota set password = '$npassword' where id_anggota = '$id'";
                            $result=$conn->prepare($sql);
                            $result->execute();
                            header('location: ../member.php?page=pengaturan&src=success');
                        }
                    }
                }else{
                    $sql = "SELECT * from tb_anggota where id_anggota = '$id'";
                    $result = $conn->prepare($sql);
                    $result->execute();
                    foreach($result as $data){}
                    if($password!=$data['password']){
                        header('location: ../member.php?page=pengaturan&src=error');
                    }else{
                        if($cpassword!=$npassword){
                            header('location: ../member.php?page=pengaturan&src=error');
                        }
                        else{
                            $sql="UPDATE tb_anggota set password = '$npassword' where id_anggota = '$id'";
                            $result=$conn->prepare($sql);
                            $result->execute();
                            header('location: ../member.php?page=pengaturan&src=success');
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