<div class="main">
  <div class="main-inner">
    <div class="container">
        
        <div class="row">
            <div class="span12">
                <form action="cari-buku.php" method="get">
                    <input type="text" placeholder="&#xF002; Pencarian" style="width:94%;font-family:Arial, FontAwesome" name="cari" id="cari">
                        <input type="submit" value="Cari" class="btn" style="margin-bottom:9px;" name="submit">
                        Cari Berdasarkan :
                        <select name="pilihan" id="">
                            <option value="judul">Judul</option>
                            <option value="kategori">Kategori</option>
                            <option value="kode_buku">Kode Buku</option>
                            <option value="pengarang">Pengarang</option>
                            <option value="penerbit">Penerbit</option>
                        </select>
                    </form>
            </div>
        </div>
        
        <div class="row">
            <div class="span12">
                <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Daftar Buku</h3> <a href="dashboard.php?page=buku-tambah"><button class="btn btn-success"><i class="icon-plus" style="margin-right:2px;color:white; margin-left:0px"></i> Tambah</button></a>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <?php
                        // Mendapatkan Data Tabel
                        //$sql 	= 'SELECT * FROM tb_buku';
                        // Cek apakah terdapat data page pada URL
                        $page = (isset($_GET['hals']))? $_GET['hals'] : 1;
                                
                        $limit = 10; // Jumlah data per halamannya

                        // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
                        $limit_start = ($page - 1) * $limit;
                        //$sql 	= "SELECT * FROM tb_buku LIMIT $limit_start, $limit""; 
                        
                        $result = $conn->prepare("SELECT * FROM tb_buku ORDER BY judul ASC LIMIT ".$limit_start.",".$limit);
                        $result->execute();
                        $no = $limit_start + 1; // Untuk penomoran tabel
                        $count = $result->rowCount();
                    ?>   
                    <table class="table table-striped table-bordered datatable-extended">
                                    <thead>
                                        <tr>
                                            <th>Kode Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Pengarang Buku</th>
                                            <th>Penerbit Buku</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php foreach($result as $row){ ?>
                                            <tr>
                                                <td><?php echo $row['kode_buku']?></td>
                                                <td><?php echo $row['judul']?></td>
                                                <td><?php echo $row['pengarang']?></td>
                                                <td><?php echo $row['penerbit']?></td>
                                                <td><?php echo $row['kategori']?></td>
                                                <td><a href="edit-buku.php?kode_buku=<?php echo $row['kode_buku']?>&src=daftarbuku"><button class="btn btn-info">Ubah</button></a>  <a href="action/hapus-buku.php?kode_buku=<?php echo $row['kode_buku'] ?>"><button class="btn btn-danger">Hapus</button></a></td>
                                            </tr>
                                        <?php } ?>                             
                                    </tbody>
                    </table>
                                                    <div style="cf">
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
																<li><a href="?page=buku&hals=1">Pertama</a></li>
																<li><a href="?page=buku&?hals=<?php echo $link_prev; ?>">&laquo;</a></li>
															<?php
															}
															?>
															<?php
																// Buat query untuk menghitung semua jumlah data
																$sql2 = $conn->prepare("SELECT COUNT(*) AS jumlah FROM tb_buku ");
																$sql2->execute(); // Eksekusi querynya
																$get_jumlah = $sql2->fetch();
																$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
																$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
																$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
																$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
																
																for($i = $start_number; $i <= $end_number; $i++){
																	$link_active = ($page == $i)? ' class="active"' : '';
															?>
																<li<?php echo $link_active; ?>><a href="?page=buku&hals=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
																<li><a href="?page=buku&hals=<?php echo $link_next; ?>">&raquo;</a></li>
																<li><a href="?page=buku&hals=<?php echo $jumlah_page; ?>">Terakhir</a></li>
															<?php
															}
															?>
														</ul></center>
												    </div>
                <!-- /widget-content --> 
                </div>
            </div>
</div>
        </div>
    </div>
</div>