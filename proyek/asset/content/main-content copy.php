<div class="inner_content">
	<div class="inner_content_w3_agile_info two_in">
						<?php include 'asset/content/slider.php'?>
							<h2 class="w3_inner_tittle">Sedang Hangat</h2>
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
												$connection = new ConnectionDB();
												$conn = $connection->getConnection();
												$sql 	= 'SELECT * FROM tb_buku ORDER BY judul ASC';
												$result = $conn->prepare($sql);
												$result->execute();
												foreach($result as $row){ 
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
														<div class="col-sm-6 col-md-3">
															<div class="thumbnail">
																<a  href="detailbuku.php?id=<?php echo $row['kode_buku'] ?>">
																	<img src="../tmp/cover/<?php echo $fix?>" alt="gambar" style="height:350px;width:280px">
																</a>
																<div class="caption">
																	<center><h3 style="font-size:17px; margin-bottom:2px"><?php echo $row['judul']?></h3></center><br>
																	<center><p style="font-size:12px; margin-top:2px">Kategori : <?php echo $row['kategori'] ?></p></center>
																	<center><p style="font-size:12px">Penulis : <?php echo $row['pengarang'] ?></p></center><br>
																	<center><a href="detailbuku.php?id=<?php echo $row['kode_buku']?>"><button class="btn btn-success">Lihat Buku</button></a></center>
																</div>
															</div>
														</div>
														<?php } ?>
											</div>
										</div>
									</div>
								<!-- //blank -->
								<h2 class="w3_inner_tittle">Rekomendasi</h2>
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
												$connection = new ConnectionDB();
												$conn = $connection->getConnection();
												$sql 	= 'SELECT * FROM tb_buku ORDER BY judul ASC';
												$result = $conn->prepare($sql);
												$result->execute();
												foreach($result as $row){ 
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
														<div class="col-sm-6 col-md-3">
															<div class="thumbnail">
																<a  href="detailbuku.php?id=<?php echo $row['kode_buku'] ?>">
																	<img src="../tmp/cover/<?php echo $fix?>" alt="gambar" style="height:350px;width:280px">
																</a>
																<div class="caption">
																	<center><h3 style="font-size:17px; margin-bottom:2px"><?php echo $row['judul']?></h3></center><br>
																	<center><p style="font-size:12px; margin-top:2px">Kategori : <?php echo $row['kategori'] ?></p></center>
																	<center><p style="font-size:12px">Penulis : <?php echo $row['pengarang'] ?></p></center><br>
																	<center><a href="detailbuku.php?id=<?php echo $row['kode_buku']?>"><button class="btn btn-success">Lihat Buku</button></a></center>
																</div>
															</div>
														</div>
														<?php } ?>
											</div>
										</div>
									</div>
								<!-- //blank -->
					
							
	</div>
					<!-- //inner_content_w3_agile_info-->
</div>