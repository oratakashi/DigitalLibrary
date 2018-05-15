<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Daftar Buku</h2>

							<!-- /blank -->
								<div class="blank_w3ls_agile">
									<div class="blank-page agile_info_shadow">
										<p>Di urutkan sesuai Abjad</p>
										
										<table id="table">
											<thead>
												<tr>
													<th>Kode Buku</th>
													<th>Judul Buku</th>
													<th>Pengarang Buku</th>
													<th>Penerbit Buku</th>
													<th>Kategori</th>
												</tr>
											</thead>
											<tbody>
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
												<tr>
                                                <td><?php echo $row['kode_buku']?></td>
                                                <td><?php echo $row['judul']?></td>
                                                <td><?php echo $row['pengarang']?></td>
                                                <td><?php echo $row['penerbit']?></td>
                                                <td><?php echo $row['kategori']?></td>
                                            </tr>
                                        <?php } ?>                             

                                    		</tbody>                                    
										</table>
									</div>
								</div>
							<!-- //blank -->
					
							
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>