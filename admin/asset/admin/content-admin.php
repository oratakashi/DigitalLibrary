<form action="cari-user.php" method="get">
										<input type="text" placeholder="&#xF002; Pencarian" style="width:94%;font-family:Arial, FontAwesome" name="cari" id="cari">
										<input type="submit" value="Cari" class="btn" style="margin-bottom:9px;" name="submit">
										Cari Berdasarkan :
										<select name="pilihan" id="">
											<option value="nama">Nama</option>
											<option value="id_admin">Kode Admin</option>
											<option value="id_anggota">Kode Anggota</option>
											<option value="email">Email</option>
											<option value="username">Username</option>
										</select>
									</form>
									<a href="dashboard.php?page=admin-tambah"><button class="btn btn-success" style="margin-bottom:9px"><i class="icon-plus" style="margin-right:5px"></i>Tambah Admin</button></a>
									<?php
										// Mendapatkan Data Tabel
										$sql 	= 'SELECT * FROM tb_admin';
										$result = $conn->prepare($sql);
										$result->execute();
									?>  
									<table class="table table-striped table-bordered datatable-extended">
										<thead>
											<tr>
												<th>Kode Admin</th>
												<th>Kode Anggota</th>
												<th>Username</th>
												<th>Nama Admin</th>
												<th>Email</th>
												<th>Level User</th>
												<th>Aksi</th>
											</tr>
										</thead>                                    
										<tbody>
										<?php foreach($result as $row){ ?>
												<tr>
													<td><?php echo $row['id_admin']?></td>
													<td><?php echo $row['id_anggota']?></td>
													<td><?php echo $row['username']?></td>
													<td><?php echo $row['nama']?></td>
													<td><?php echo $row['email']?></td>
													<td><?php echo $row['level_user']?></td>
													<td><a href="" style="margin-right:5px"><button class="btn btn-info">Pesan</button></a><a href="action/hapus-admin.php?id_anggota=<?php echo $row['id_anggota'] ?>"><button class="btn btn-danger">Hapus</button></a></td>
												</tr>
											<?php } ?>                                   
										</tbody>
									</table>