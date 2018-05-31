<div class="inner_content">
	<div class="inner_content_w3_agile_info two_in">
							<h2 class="w3_inner_tittle">Pencarian Buku</h2>
								<!-- /blank -->
									<div class="warning_w3ls_agile">
										<div class="blank-page agile_info_shadow">
											
											<p>Maaf perangkat anda tidak support untuk membuka digital library</p>
										</div>
									</div>
									<div class="blank_w3ls_agile">
										<div class="blank-page agile_info_shadow">
										<div class="row">
												<?php 
                                                require_once ("koneksi.php");
                                                $cari = $_GET['q'];
												$connection = new ConnectionDB();
												$conn = $connection->getConnection();
												$sql 	= "SELECT * FROM tb_buku where judul like '%".$cari."%'";
												$result = $conn->prepare($sql);
												$result->execute();
                                                $count = $result->rowCount();
                                                if($count == 1){
                                                    foreach($result as $row){ 
                                                        ?>				
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="thumbnail">
                                                                    <a  href="detailbuku.php?id=<?php echo $row['kode_buku'] ?>">
                                                                        <img src="images/park.jpg" alt="Park">
                                                                    </a>
                                                                    <div class="caption">
                                                                        <center><h3 style="font-size:17px; margin-bottom:2px"><?php echo $row['judul']?></h3></center><br>
                                                                        <center><p style="font-size:12px; margin-top:2px">Kategori : <?php echo $row['kategori'] ?></p></center>
                                                                        <center><p style="font-size:12px">Penulis : <?php echo $row['pengarang'] ?></p></center><br>
                                                                        <center><a href="detailbuku.php?id=<?php echo $row['kode_buku']?>"><button class="btn btn-success">Lihat Buku</button></a></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <?php } }
                                                    else{
                                                        echo "Hasil Pencarian dari $cari Tidak Ditemukan";
                                                    }?>
											</div>
										</div>
									</div>
								<!-- //blank -->
								<h2 class="w3_inner_tittle">Pencarian Anggota</h2>
								<!-- /blank -->
									<div class="warning_w3ls_agile">
										<div class="blank-page agile_info_shadow">
											
											<p>Maaf perangkat anda tidak support untuk membuka digital library</p>
										</div>
									</div>
									<div class="blank_w3ls_agile">
										<div class="blank-page agile_info_shadow">
                                        <div class="row">
												<?php 
                                                require_once ("koneksi.php");
                                                $cari = $_GET['q'];
												$connection = new ConnectionDB();
												$conn = $connection->getConnection();
												$sql 	= "SELECT * FROM tb_anggota where nama like '%".$cari."%'";
												$result = $conn->prepare($sql);
												$result->execute();
                                                $count = $result->rowCount();
                                                if($count == 1){
                                                    foreach($result as $row){ 
                                                        ?>				
                                                            <div class="col-sm-6 col-md-3">
                                                                <div class="thumbnail">
                                                                    <a  href="profile.php?id=<?php echo $row['nim'] ?>">
                                                                        <img src="images/park.jpg" alt="Park">
                                                                    </a>
                                                                    <div class="caption">
                                                                        <center><h3 style="font-size:17px; margin-bottom:2px"><?php echo $row['nama']?></h3></center><br>
                                                                        <center><p style="font-size:12px; margin-top:2px">NIM : <?php echo $row['nim'] ?></p></center>
                                                                        <center><p style="font-size:12px"><?php if($row['statuslogin'] == 1){?><i class="fa fa-circle" style="color:green"></i> Online<?php } else{?><i class="fa fa-circle" ></i> Offline <?php } ?></p></center><br>
                                                                        <center><a href="profile.php?id=<?php echo $row['nim']?>"><button class="btn btn-success">Lihat Profil</button></a></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <?php } }
                                                    else{
                                                        echo "Hasil Pencarian dari $cari Tidak Ditemukan";
                                                    }?>
											</div>
										</div>
										</div>
									</div>
								<!-- //blank -->
					
							
	</div>
					<!-- //inner_content_w3_agile_info-->
</div>