<div class="inner_content">
<div class="inner_content">
	<div class="inner_content_w3_agile_info two_in">
								<!-- /blank -->
									<div class="warning_w3ls_agile">
										<div class="blank-page agile_info_shadow">
											
											<p>Maaf perangkat anda tidak support untuk membuka digital library</p>
										</div>
									</div>
									<div class="blank_w3ls_agile">
										<div class="blank-page agile_info_shadow">
                                            <div class="row">
                                                <div class="thumbnail col-md-3" >
                                                    <img src="images/park.jpg" alt="Park" height="600px">
                                                </div>
                                                <div class="col-md-9">
                                                    <?php
                                                        require_once ("koneksi.php");
                                                        $nim = $_GET['id'];
                                                        $connection = new ConnectionDB();
                                                        $conn = $connection->getConnection();
                                                        $sql 	= "SELECT * FROM tb_anggota where nim=$nim";
                                                        $result = $conn->prepare($sql);
                                                        $result->execute();
                                                        foreach($result as $data){
                                                        }
                                                        $id = $data['id_anggota'];
                                                        $sql 	= "SELECT * FROM tb_detailanggota where id_anggota=$id";
                                                        $result = $conn->prepare($sql);
                                                        $result->execute();
                                                        foreach($result as $row){
                                                        }
                                                        /*$sql 	= "SELECT statuslogin FROM tb_anggota where id_anggota=$id";
                                                        $result = $conn->prepare($sql);
                                                        $result->execute();
                                                        foreach($result as $status){
                                                        }*/
                                                    ?>
                                                    <h2 class="w3_inner_tittle" style="margin-top:130px; margin-bottom:5px"><?php echo $data['nama']?></h2>
                                                    <p>NIM : <?php echo $_GET['id']?>  <?php if($data   ['statuslogin'] == 1){?><i class="fa fa-circle" style="color:green"></i> Online<?php } else{?><i class="fa fa-circle" ></i> Offline <?php } ?>
                                                    </p>
                                                </div>
                                                <hr width='100%' size='20' >
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-4">
                                                        <center><p>Informasi Anggota</p></center>
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
                                                                    <td style="background-color:white"><?php echo $data['tmplahir']." , ".$row['tgllahir'] ?></td>
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
                                                            <p>Sosial Media</p>
                                                            <a><button class="btn btn-info"><i class="fa fa-facebook" style="margin-right:5px"></i>Facebook</button></a>
                                                            <a><button class="btn btn-info"><i class="fa fa-instagram" style="margin-right:5px"></i>Instagram</button></a>
                                                        </div></center>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <center><h2 class="w3_inner_tittle" style="font-size:20px">Buku Favorit</h2></center>
                                                        <div class="row">
                                                            <?php 
                                                            require_once ("koneksi.php");
                                                            $connection = new ConnectionDB();
                                                            $conn = $connection->getConnection();
                                                            $id_anggota = $row['id_anggota'];
                                                            $sql 	= "SELECT * FROM tb_favorit f INNER JOIN tb_buku b where f.kode_buku=b.kode_buku and f.id_anggota=$id_anggota";
                                                            $result = $conn->prepare($sql);
                                                            $result->execute();
                                                            $count = $result->rowcount();
                                                            if($count==1){
                                                                foreach($result as $row){?>
                                                                    <div class="col-sm-4 col-md-3">
                                                                        <div class="thumbnail">
                                                                            <a  href="detailbuku.php?id=<?php echo $row['kode_buku'] ?>">
                                                                                <img src="images/park.jpg" alt="Park">
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
                                                            }else{
                                                                echo "<center>Anda Belum Mempunyai Buku Favorit</center>";
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
</div>