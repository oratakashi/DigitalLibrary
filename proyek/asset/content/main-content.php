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
													// Mendapatkan Data Tabel
													require_once ("koneksi.php");
													$connection = new ConnectionDB();
													$conn = $connection->getConnection();
													$sql 	= 'SELECT * FROM tb_buku ORDER BY judul ASC';
													$result = $conn->prepare($sql);
													$result->execute();
													foreach($result as $row){ 
												?>				
													<div class="col-sm-6 col-md-3">
														<div class="thumbnail">
															<a  href="detailbuku.php?id=<?php echo $row['kode_buku'] ?>">
																<img src="images/park.jpg" alt="Park">
															</a>
															<div class="caption">
																<center><h3 style="font-size:20px"><?php echo $row['judul']?></h3></center><br>
																<p style="font-size:12px"><?php echo $row['sinopsis'] ?></p>
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
												?>				
													<div class="col-sm-6 col-md-3">
														<div class="thumbnail">
															<a  href="detailbuku.php?id=<?php echo $row['kode_buku'] ?>">
																<img src="images/park.jpg" alt="Park">
															</a>
															<div class="caption">
																<center><h3 style="font-size:20px"><?php echo $row['judul']?></h3></center><br>
																<p style="font-size:12px"><?php echo $row['sinopsis'] ?></p>
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