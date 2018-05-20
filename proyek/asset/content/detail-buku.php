<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
				Men
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Lightweight Jacket
			</span>
		</div>
	</div>
<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
									<div class="wrap-pic-w pos-relative">
										<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">
									</div>
								</div>

								
							</div>
						</div>
					</div>
				</div>
				                            <?php
												// Mendapatkan Data Tabel
                                                require_once ("koneksi.php");
                                                $id = $_GET['id'];
												$connection = new ConnectionDB();
												$conn = $connection->getConnection();
												$sql 	= "SELECT * FROM tb_buku where kode_buku=$id";
												$result = $conn->prepare($sql);
												$result->execute();
												foreach($result as $row){
                                                } 
											?>
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $row['judul']?>
						</h4>

						<span class="mtext-106 cl2">
							<table>
								<tbody>
									<tr>
										<td style="background-color:white">Kode Buku </td>
										<td style="background-color:white"><?php echo $row['kode_buku'] ?></td>
									</tr>
									<tr>
										<td style="background-color:white">Penulis </td>
										<td style="background-color:white"><?php echo $row['pengarang'] ?></td>
									</tr>
									<tr>
										<td style="background-color:white">Penerbit </td>
										<td style="background-color:white"><?php echo $row['penerbit'] ?></td>
									</tr>
									<tr>
										<td style="background-color:white">Kategori </td>
										<td style="background-color:white"><?php echo $row['kategori'] ?></td>
									</tr>
								</tbody>
							</table>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $row['sinopsis']?>
						</p>
						
						<!--  -->
						<div class="p-t-33">
                            <button class="btn btn-success" style="padding-right:25px;padding-left:25px">
										<i class="fa fa-star" style="margin-right:5px"></i>Favorit
							</button>
							<button class="btn btn-success" style="padding-right:25px;padding-left:25px">
										Download
							</button>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<div class="container"> 
					<h3>Deskripsi</h3><br>
					<?php echo $row['deskripsi']?>
				</div>
			</div>
			<div class="inner_content_w3_agile_info two_in">
		
			<!-- //blank -->
					
							
	    </div>
		<div class="inner_content_w3_agile_info two_in">
								<center><h2 class="w3_inner_tittle">Rekomendasi Buku <?php echo $row['kategori'] ?></h2></center>
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
											$kategori = $row['kategori'];
											$sql 	= "SELECT * FROM tb_buku where kategori='$kategori'";
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
																<center><h3 style="font-size:18px"><?php echo $row['judul']?></h3></center><br>
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
	</section>