<div class="inner_content">
	<div class="inner_content_w3_agile_info two_in">
							<h2 class="w3_inner_tittle">Pencarian Buku</h2>
								<!-- /blank -->
									<div class="warning_w3ls_agile"> <!-- Memeriksa Compability Resolusi Layar -->
										<div class="blank-page agile_info_shadow">
											
										<p>Maaf perangkat anda tidak support untuk membuka digital library, Jika Anda Menggunakan Perangkat Mobile, Silahkan Request Tampilan Desktop di Browser Anda</p>
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
												//$sql 	= "SELECT * FROM tb_buku where judul like '%".$cari."%'";
												$page = (isset($_GET['hals']))? $_GET['hals'] : 1;
					
												$limit = 8; // Jumlah data per halamannya

												// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
												$limit_start = ($page - 1) * $limit;
												
												$result = $conn->prepare("SELECT * FROM tb_buku where judul like '%".$cari."%' ORDER BY judul ASC LIMIT ".$limit_start.",".$limit);
												$result->execute();
												$no = $limit_start + 1; // Untuk penomoran tabel
												$count = $result->rowCount();
                                                if($count == 0){ //JIka Data Tidak Ditemukan
                                                    echo "Hasil Pencarian dari $cari Tidak Ditemukan";
                                                }
                                                else{ //Jika Data Di Temukan
                                                    if($count == 8){ //Jika Data Lebih atau Sama Dengan 8
                                                        foreach($result as $row){ 
															$no = $no+1;
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
                                                    }elseif($count <= 4){ //Jika Data Kurang dari 4
														$ulang = 4 - $count;
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
													}else{ //Jika Data 5 - 7 Buah
														$ulang = 8 - $count;
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
													}        
                                                }?>
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
																<li><a href="?q=<?php echo $cari ?>&hals=1">Pertama</a></li>
																<li><a href="?q=<?php echo $cari ?>&hals=<?php echo $link_prev; ?>">&laquo;</a></li>
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
																<li<?php echo $link_active; ?>><a href="?q=<?php echo $cari ?>&hals=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
																<li><a href="?q=<?php echo $cari ?>&hals=<?php echo $link_next; ?>">&raquo;</a></li>
																<li><a href="?q=<?php echo $cari ?>&hals=<?php echo $jumlah_page; ?>">Terakhir</a></li>
															<?php
															}
															?>
														</ul></center>
													</div>
												</div>
										</div>
									</div>
								<!-- //blank -->
								<h2 class="w3_inner_tittle">Pencarian Anggota</h2>
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
                                                require_once ("koneksi.php");
                                                $cari = $_GET['q'];
												$connection = new ConnectionDB();
												$conn = $connection->getConnection();
												//$sql 	= "SELECT * FROM tb_anggota where nama like '%".$cari."%'";
												$page = (isset($_GET['hals']))? $_GET['hals'] : 1;
					
												$limit = 8; // Jumlah data per halamannya

												// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
												$limit_start = ($page - 1) * $limit;
												//$sql 	= "SELECT * FROM tb_buku LIMIT $limit_start, $limit""; 
												
												$result = $conn->prepare("SELECT * FROM tb_anggota where nama like '%".$cari."%' ORDER BY nama ASC LIMIT ".$limit_start.",".$limit);
												$result->execute();
												$no = $limit_start + 1; // Untuk penomoran tabel
												$count = $result->rowCount();
                                                if($count == 0){
                                                    echo "Hasil Pencarian dari $cari Tidak Ditemukan";
                                                    }
                                                    else{
														if($count==8){
															foreach($result as $row){ 
																$no = $no + 1;
																$id = $row['id_anggota'];
																$sql = "SELECT * from tb_foto where id_anggota=$id";
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
																			<a  href="profile.php?id=<?php echo $row['nim'] ?>">
																				<img src="../tmp/foto/<?php echo $fix ?>" alt="Park" style="height:350px;width:280px">
																			</a>
																			<div class="caption">
																				<center><h3 style="font-size:17px; margin-bottom:2px"><?php echo $row['nama']?></h3></center><br>
																				<center><p style="font-size:12px; margin-top:2px">NIM : <?php echo $row['nim'] ?></p></center>
																				<center><p style="font-size:12px"><?php if($row['statuslogin'] == 1){?><i class="fa fa-circle" style="color:green"></i> Online<?php } else{?><i class="fa fa-circle" ></i> Offline <?php } ?></p></center><br>
																				<center><a href="profile.php?id=<?php echo $row['nim']?>"><button class="btn btn-success">Lihat Profil</button></a></center>
																			</div>
																		</div>
																	</div>
															<?php }  
														}elseif($count<=4){
															$ulang = 4 - $count;
															foreach($result as $row){ 
																$no = $no + 1;
																$id = $row['id_anggota'];
																$sql = "SELECT * from tb_foto where id_anggota=$id";
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
																			<a  href="profile.php?id=<?php echo $row['nim'] ?>">
																				<img src="../tmp/foto/<?php echo $fix ?>" alt="Park" style="height:350px;width:280px">
																			</a>
																			<div class="caption">
																				<center><h3 style="font-size:17px; margin-bottom:2px"><?php echo $row['nama']?></h3></center><br>
																				<center><p style="font-size:12px; margin-top:2px">NIM : <?php echo $row['nim'] ?></p></center>
																				<center><p style="font-size:12px"><?php if($row['statuslogin'] == 1){?><i class="fa fa-circle" style="color:green"></i> Online<?php } else{?><i class="fa fa-circle" ></i> Offline <?php } ?></p></center><br>
																				<center><a href="profile.php?id=<?php echo $row['nim']?>"><button class="btn btn-success">Lihat Profil</button></a></center>
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
														}else{
															$ulang = 8 - $count;
															foreach($result as $row){ 
																$no = $no + 1;
																$id = $row['id_anggota'];
																$sql = "SELECT * from tb_foto where id_anggota=$id";
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
																			<a  href="profile.php?id=<?php echo $row['nim'] ?>">
																				<img src="../tmp/foto/<?php echo $fix ?>" alt="Park" style="height:350px;width:280px">
																			</a>
																			<div class="caption">
																				<center><h3 style="font-size:17px; margin-bottom:2px"><?php echo $row['nama']?></h3></center><br>
																				<center><p style="font-size:12px; margin-top:2px">NIM : <?php echo $row['nim'] ?></p></center>
																				<center><p style="font-size:12px"><?php if($row['statuslogin'] == 1){?><i class="fa fa-circle" style="color:green"></i> Online<?php } else{?><i class="fa fa-circle" ></i> Offline <?php } ?></p></center><br>
																				<center><a href="profile.php?id=<?php echo $row['nim']?>"><button class="btn btn-success">Lihat Profil</button></a></center>
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
														}
                                                          
                                                    }?>
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
																<li><a href="?q=<?php echo $cari ?>&hals=1">Pertama</a></li>
																<li><a href="?q=<?php echo $cari ?>&hals=<?php echo $link_prev; ?>">&laquo;</a></li>
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
																<li<?php echo $link_active; ?>><a href="?q=<?php echo $cari ?>&hals=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
																<li><a href="?q=<?php echo $cari ?>&hals=<?php echo $link_next; ?>">&raquo;</a></li>
																<li><a href="?q=<?php echo $cari ?>&hals=<?php echo $jumlah_page; ?>">Terakhir</a></li>
															<?php
															}
															?>
														</ul></center>
													</div>
												</div>
											</div>
										</div>
										</div>
									</div>
								<!-- //blank -->
					
							
	</div>
					<!-- //inner_content_w3_agile_info-->
</div>