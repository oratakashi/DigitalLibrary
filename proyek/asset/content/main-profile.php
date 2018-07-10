
<div class="inner_content" >
	<div class="inner_content_w3_agile_info two_in" >
								<!-- /blank -->
									<div class="warning_w3ls_agile">
										<div class="blank-page agile_info_shadow">
											
                                        <p>Maaf perangkat anda tidak support untuk membuka digital library, Jika Anda Menggunakan Perangkat Mobile, Silahkan Request Tampilan Desktop di Browser Anda</p>
										</div>
									</div>
									<div class="blank_w3ls_agile">
										<div class="blank-page agile_info_shadow" >
                                            <div class="row">
                                                <div class="thumbnail col-md-3" >
                                                
                                                    <img src="../tmp/foto/<?php echo $_SESSION['foto'] ?>" alt="Park" style="height:250px;width:300px">
                                                    <a href="member.php?page=pengaturan&src=profil"><button class="btn btn-success col-md-12"><i class="fa fa-pencil"></i> Ganti Foto Profil</button></a>
                                                    
                                                    </div>
                                                <div class="col-md-9">
                                                    <?php
                                                        require_once ("koneksi.php");
                                                        $id = $_SESSION['id'];
                                                        $connection = new ConnectionDB();
                                                        $conn = $connection->getConnection();
                                                        $sql 	= "SELECT * FROM tb_detailanggota where id_anggota=$id";
                                                        $result = $conn->prepare($sql);
                                                        $result->execute();
                                                        foreach($result as $row){
                                                        }
                                                        $nim = $_GET['id'];
                                                        $sql 	= "SELECT * FROM tb_anggota where nim=$nim";
                                                        $result = $conn->prepare($sql);
                                                        $result->execute();
                                                        foreach($result as $data){
                                                        }
                                                    ?>
                                                    <h2 class="w3_inner_tittle" style="margin-top:130px; margin-bottom:5px"><?php echo $data['nama']?></h2>
                                                    <p>NIM : <?php echo $data['nim']?>  <?php if($data['statuslogin'] == 1){?><i class="fa fa-circle" style="color:green"></i> Online<?php } else{?><i class="fa fa-circle" ></i> Offline <?php } ?>
                                                    </p>
                                                    <a href="member.php?page=pengaturan&src=sidebar" style="float:right; margin-bottom:10px"><button class="btn btn-success"><i class="fa fa-pencil"></i> Edit Profil</button></a>
                                                </div>
                                                <hr width='100%' size='20' >
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-4">
                                                        <center><p><i class="fa fa-user"></i> Informasi Anggota</p></center>
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="background-color:white">Nama Lengkap</td>
                                                                    <td style="background-color:white"><?php echo $data['nama'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="background-color:white">NIM</td>
                                                                    <td style="background-color:white"><?php echo $data['nim'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="background-color:white">Tempat & Tgl Lahir</td>
                                                                    <td style="background-color:white"><?php echo $row['tmplahir']." , ".$row['tgllahir'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="background-color:white">Email</td>
                                                                    <td style="background-color:white"><?php echo $data['email'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="background-color:white">Alamat</td>
                                                                    <td style="background-color:white"><?php echo $row['alamat'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="background-color:white">No HP</td>
                                                                    <td style="background-color:white"><?php echo $row['no_hp'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <center><div>
                                                            <p><i class="fa fa-globe"></i> Sosial Media</p>
                                                            <a href="http://facebook.com/<?php echo $row['facebook'] ?>"><button class="btn btn-info"><i class="fa fa-facebook" style="margin-right:5px"></i>Facebook</button></a>
                                                            <a href="http://instagram.com/<?php echo $row['instagram'] ?>"><button class="btn btn-info"><i class="fa fa-instagram" style="margin-right:5px"></i>Instagram</button></a>
                                                        </div></center>
                                                        
                                                    </div>
                                                    <div class="col-md-8">
                                                        <center><h2 class="w3_inner_tittle" style="font-size:20px">Buku Favorit</h2></center>
                                                        <div class="row">
                                                            <?php 
                                                            require_once ("koneksi.php");
                                                            $connection = new ConnectionDB();
                                                            $conn = $connection->getConnection();
                                                            $id_anggota = $_SESSION['id'];
                                                            //$sql 	= "SELECT * FROM tb_favorit f INNER JOIN tb_buku b where f.kode_buku=b.kode_buku and f.id_anggota=$id_anggota order by judul ASC";
                                                            // Cek apakah terdapat data page pada URL
                                                            $page = (isset($_GET['hals']))? $_GET['hals'] : 1;
                                
                                                            $limit = 3; // Jumlah data per halamannya

                                                            // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
                                                            $limit_start = ($page - 1) * $limit;
                                                            
                                                            $result = $conn->prepare("SELECT * FROM tb_favorit f INNER JOIN tb_buku b where f.kode_buku=b.kode_buku and f.id_anggota=$id_anggota order by judul ASC LIMIT ".$limit_start.",".$limit);
                                                            $result->execute();
                                                            $no = $limit_start + 1; // Untuk penomoran tabel
                                                            $count = $result->rowCount();
                                                            if($count==0){
                                                                echo "<center>Anda Belum Mempunyai Buku Favorit</center>";
                                                                
                                                            }elseif($count==3){
                                                                foreach($result as $row){
                                                                    $no = $no +1;
                                                                    $id = $row['kode_buku'];
                                                                    $sql = "SELECT * from tb_cover where kode_buku=$id";
                                                                    $hasil = $conn->prepare($sql);
                                                                    $hasil->execute();
                                                                    $count = $hasil->rowCount();
                                                                    if($count == 1){
                                                                        foreach($hasil as $foto){}
                                                                        $fix = $foto['nama_file'];
                                                                    }else{
                                                                        $fix = "default.jpg";
                                                                    }            
                                                                    ?>
                                                                    <div class="col-sm-4 col-md-4">
                                                                        <div class="thumbnail">
                                                                            <a  href="detailbuku.php?id=<?php echo $row['kode_buku'] ?>">
                                                                            <img src="../tmp/cover/<?php echo $fix?>" alt="gambar" style="height:350px;width:280px">
                                                                            </a>
                                                                            <div class="caption">
                                                                                <center><h3 style="font-size:15px; margin-bottom:2px"><?php echo $row['judul']?></h3></center><br>
                                                                                <center><p style="font-size:11px; margin-top:2px">Kategori : <?php echo $row['kategori'] ?></p></center>
                                                                                <center><p style="font-size:11px">Penulis : <?php echo $row['pengarang'] ?></p></center>
                                                                                <center><a href="detailbuku.php?id=<?php echo $row['kode_buku']?>"><button class="btn btn-success">Lihat Buku</button></a></center>
                                                                                <a></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php }
                                                            ?>
                                                            <div class="row">
                                                                <center><ul class="pagination">
                                                                    <?php
                                                                    if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                                                                    ?>
                                                                        <li class="disabled"><a href="#">Pertama</a></li>
                                                                        <li class="disabled"><a href="#">&laquo;</a></li>
                                                                    <?php
                                                                    }else{ // Jika page bukan page ke 1
                                                                        $link_prev = ($page > 1)? $page - 1 : 1;
                                                                    ?>
                                                                        <li><a href="?id=<?php echo $_SESSION['nim'] ?>&hals=1">Pertama</a></li>
                                                                        <li><a href="?id=<?php echo $_SESSION['nim'] ?>&hals=<?php echo $link_prev; ?>">&laquo;</a></li>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                        // Buat query untuk menghitung semua jumlah data
                                                                        $sql2 = $conn->prepare("SELECT COUNT(*) AS jumlah FROM tb_favorit f INNER JOIN tb_buku b where f.kode_buku=b.kode_buku and f.id_anggota=$id_anggota");
                                                                        $sql2->execute(); // Eksekusi querynya
                                                                        $get_jumlah = $sql2->fetch();
                                                                        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                                                                        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                                                        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                                                                        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                                                                        
                                                                        for($i = $start_number; $i <= $end_number; $i++){
                                                                            $link_active = ($page == $i)? ' class="active"' : '';
                                                                    ?>
                                                                        <li<?php echo $link_active; ?>><a href="?id=<?php echo $_SESSION['nim'] ?>&hals=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                                    <?php 
                                                                        }
                                                                    ?>
                                                                    <!-- LINK NEXT AND LAST -->
                                                                    <?php
                                                                    // Jika page sama dengan jumlah page, maka disable link NEXT nya
                                                                    // Artinya page tersebut adalah page terakhir 
                                                                    if($page == $jumlah_page){ // Jika page terakhir
                                                                    ?>
                                                                        <li class="disabled"><a href="#">&raquo;</a></li>
                                                                        <li class="disabled"><a href="#">Terakhir</a></li>
                                                                    <?php
                                                                    }else{ // Jika Bukan page terakhir
                                                                        $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                                                                    ?>
                                                                        <li><a href="?id=<?php echo $_SESSION['nim'] ?>&hals=<?php echo $link_next; ?>">&raquo;</a></li>
                                                                        <li><a href="?id= <?php echo $_SESSION['nim'] ?>&hals=<?php echo $jumlah_page; ?>">Terakhir</a></li>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </ul></center>
                                                            </div>
                                                            <?php
                                                            }else{
                                                                $ulang = 3 - $count;
                                                                foreach($result as $row){
                                                                    $no = $no +1;
                                                                    $id = $row['kode_buku'];
                                                                    $sql = "SELECT * from tb_cover where kode_buku=$id";
                                                                    $hasil = $conn->prepare($sql);
                                                                    $hasil->execute();
                                                                    $count = $hasil->rowCount();
                                                                    if($count == 1){
                                                                        foreach($hasil as $foto){}
                                                                        $fix = $foto['nama_file'];
                                                                    }else{
                                                                        $fix = "default.jpg";
                                                                    }            
                                                                    ?>
                                                                    <div class="col-sm-4 col-md-4">
                                                                        <div class="thumbnail">
                                                                            <a  href="detailbuku.php?id=<?php echo $row['kode_buku'] ?>">
                                                                            <img src="../tmp/cover/<?php echo $fix?>" alt="gambar" style="height:350px;width:280px">
                                                                            </a>
                                                                            <div class="caption">
                                                                                <center><h3 style="font-size:15px; margin-bottom:2px"><?php echo $row['judul']?></h3></center><br>
                                                                                <center><p style="font-size:11px; margin-top:2px">Kategori : <?php echo $row['kategori'] ?></p></center>
                                                                                <center><p style="font-size:11px">Penulis : <?php echo $row['pengarang'] ?></p></center>
                                                                                <center><a href="detailbuku.php?id=<?php echo $row['kode_buku']?>"><button class="btn btn-success">Lihat Buku</button></a></center>
                                                                                <a></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php }
                                                                for($i=1; $i<=$ulang; $i++){
														
                                                                    ?>	
                                                                        <div class="col-sm-6 col-md-3">
                                                                                <div class="thumbnail" style="visibility: hidden;">
                                                                                    <a  href="detailbuku.php?id=0">
                                                                                    <img src="../tmp/cover/default.jpg" alt="gambar" style="height:350px;width:280px;visibility: hidden;">
                                                                                    </a>
                                                                                    <div class="caption">
                                                                                        <center><h3 style="font-size:17px; margin-bottom:2px; visibility: hidden;">NONE</h3></center><br>
                                                                                        <center><p style="font-size:12px; margin-top:2px;visibility: hidden;">Kategori : NONE</p></center>
                                                                                        <center><p style="font-size:12px;visibility: hidden;">Penulis : NONE</p></center><br>
                                                                                        <center><a href="detailbuku.php?id=0" style="visibility: hidden;"><button class="btn btn-success">Lihat Buku</button></a></center>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    <?php }
                                                            
                                                            ?>
                                                            <div class="row">
                                                                <center><ul class="pagination">
                                                                    <?php
                                                                    if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                                                                    ?>
                                                                        <li class="disabled"><a href="#">Pertama</a></li>
                                                                        <li class="disabled"><a href="#">&laquo;</a></li>
                                                                    <?php
                                                                    }else{ // Jika page bukan page ke 1
                                                                        $link_prev = ($page > 1)? $page - 1 : 1;
                                                                    ?>
                                                                        <li><a href="?id=<?php echo $_SESSION['nim'] ?>&hals=1">Pertama</a></li>
                                                                        <li><a href="?id=<?php echo $_SESSION['nim'] ?>&hals=<?php echo $link_prev; ?>">&laquo;</a></li>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                        // Buat query untuk menghitung semua jumlah data
                                                                        $sql2 = $conn->prepare("SELECT COUNT(*) AS jumlah FROM tb_favorit f INNER JOIN tb_buku b where f.kode_buku=b.kode_buku and f.id_anggota=$id_anggota");
                                                                        $sql2->execute(); // Eksekusi querynya
                                                                        $get_jumlah = $sql2->fetch();
                                                                        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                                                                        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                                                        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                                                                        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                                                                        
                                                                        for($i = $start_number; $i <= $end_number; $i++){
                                                                            $link_active = ($page == $i)? ' class="active"' : '';
                                                                    ?>
                                                                        <li<?php echo $link_active; ?>><a href="?id=<?php echo $_SESSION['nim'] ?>&hals=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                                    <?php 
                                                                        }
                                                                    ?>
                                                                    <!-- LINK NEXT AND LAST -->
                                                                    <?php
                                                                    // Jika page sama dengan jumlah page, maka disable link NEXT nya
                                                                    // Artinya page tersebut adalah page terakhir 
                                                                    if($page == $jumlah_page){ // Jika page terakhir
                                                                    ?>
                                                                        <li class="disabled"><a href="#">&raquo;</a></li>
                                                                        <li class="disabled"><a href="#">Terakhir</a></li>
                                                                    <?php
                                                                    }else{ // Jika Bukan page terakhir
                                                                        $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                                                                    ?>
                                                                        <li><a href="?id=<?php echo $_SESSION['nim'] ?>&hals=<?php echo $link_next; ?>">&raquo;</a></li>
                                                                        <li><a href="?id= <?php echo $_SESSION['nim'] ?>&hals=<?php echo $jumlah_page; ?>">Terakhir</a></li>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </ul></center>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                    </div>
                                                </div>
                                            </div>
										</div>
									</div>
								<!-- //blank -->
					
							
	</div>
					<!-- //inner_content_w3_agile_info-->
</div>
