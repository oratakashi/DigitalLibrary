<?php 
    class gambar{
        function input{
            //=============================
            $ekstensi_diperbolehkan	= array('png','jpg');
            $nama = $_FILES['file']['name'];
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran	= $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];
            
        }
    }
?>