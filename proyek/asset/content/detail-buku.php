
<section class=" bg0 p-t-65 p-b-60" >
		<div class="container" style="padding-right:10px;padding-left:10px;width:95%">
			<div class="row">
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
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
									<div class="wrap-pic-w pos-relative">
										<img src="../tmp/cover/<?php echo $fix ?>" alt="IMG-PRODUCT" style="height:550px;width:150x">
									</div>
								</div>

								
							</div>
						</div>
					</div>
				</div>
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
							<?php
								if(empty($_SESSION['username'])){
							?>
								<a href="action/favorit.php?id=<?php echo $id ?>"><button class="btn btn-success" style="padding-right:25px;padding-left:25px">
											<i class="fa fa-star" style="margin-right:5px"></i>Favorit
								</button></a>
								<?php }else{
									require_once ("koneksi.php");
									$id = $_GET['id'];
									$id_anggota = $_SESSION['id'];
									$connection = new ConnectionDB();
									$conn = $connection->getConnection();
									$sql 	= "SELECT * FROM tb_favorit where kode_buku=$id and id_anggota=$id_anggota";
									$result = $conn->prepare($sql);
									$result->execute();
									$count = $result->rowCount();
									if($count == 1){ ?>
										<a href="action/dfavorit.php?id=<?php echo $id ?>"><button class="btn btn-success" style="padding-right:25px;padding-left:25px">
											<i class="fa fa-star" style="margin-right:5px"></i>Hapus Favorit
										</button></a>
									<?php } else { ?>
										<a href="action/favorit.php?id=<?php echo $id ?>"><button class="btn btn-success" style="padding-right:25px;padding-left:25px">
											<i class="fa fa-star" style="margin-right:5px"></i>Favorit
										</button></a>
									<?php }
								}?>
							<a href="action/download.php?id=<?php echo $id ?>" target="_new"><button class="btn btn-success" style="padding-right:25px;padding-left:25px">
										Download
							</button></a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<div class="container"> 
					<h3>Deskripsi</h3><br>
					<p style="padding:10px;margin-right:10px"><?php echo $row['deskripsi']?></p>
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
											
										<p>Maaf perangkat anda tidak support untuk membuka digital library, Jika Anda Menggunakan Perangkat Mobile, Silahkan Request Tampilan Desktop di Browser Anda</p>
										</div>
									</div>
									<div class="blank_w3ls_agile">
										<div class="blank-page agile_info_shadow">
											<div class="row">
											<?php 
											$kategori = $row['kategori'];
											//$sql 	= "SELECT * FROM tb_buku where kategori='$kategori'";
											// Cek apakah terdapat data page pada URL
											$page = (isset($_GET['hal']))? $_GET['hal'] : 1;
					
											$limit = 4; // Jumlah data per halamannya

											// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
											$limit_start = ($page - 1) * $limit;
											//$sql 	= "SELECT * FROM tb_buku LIMIT $limit_start, $limit""; 
											
											$result = $conn->prepare("SELECT * FROM tb_buku where kategori = '$kategori' ORDER BY judul ASC LIMIT ".$limit_start.",".$limit);
											$result->execute();
											$no = $limit_start + 1; // Untuk penomoran tabel
											$count = $result->rowCount();
											if($count == 4){
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
												<?php } 
											}else {
												$ulang = 4 - $count;
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
															<?php } for($i=1; $i<=$ulang; $i++){
														
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
														<?php }} ?>
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
																<li><a href="?id=<?php echo $row['kode_buku'] ?>&hal=1">Pertama</a></li>
																<li><a href="?id=<?php echo $row['kode_buku'] ?>&hal=<?php echo $link_prev; ?>">&laquo;</a></li>
															<?php
															}
															?>
															<?php
																// Buat query untuk menghitung semua jumlah data
																$sql2 = $conn->prepare("SELECT COUNT(*) AS jumlah FROM tb_buku");
																$sql2->execute(); // Eksekusi querynya
																$get_jumlah = $sql2->fetch();
																$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
																$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
																$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
																$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
																
																for($i = $start_number; $i <= $end_number; $i++){
																	$link_active = ($page == $i)? ' class="active"' : '';
															?>
																<li<?php echo $link_active; ?>><a href="?id=<?php echo $row['kode_buku'] ?>&hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
																<li><a href="?id=<?php echo $row['kode_buku'] ?>&hal=<?php echo $link_next; ?>">&raquo;</a></li>
																<li><a href="?id=<?php echo $row['kode_buku'] ?>&hal=<?php echo $jumlah_page; ?>">Terakhir</a></li>
															<?php
															}
															?>
														</ul></center>
													</div>
											</div>
										</div>
									</div>
								<!-- //blank -->
					
							
	</div>
	</section>