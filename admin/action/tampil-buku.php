<?php
require_once ("../koneksi.php");
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();
        try{
            $sql = 'select * from tb_buku';
            $query = $conn->query($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
?>