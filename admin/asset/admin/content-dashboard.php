<center><h3>Statistik</h3></center>
<div id="big_stats" class="cf">                
    <div class="stat"> <i class="icon-book" style="color:blue"></i> <span class="value">
    <?php
        $sql 	= 'SELECT COUNT(*) FROM tb_buku';
        $result = $conn->prepare($sql);
        $result->execute();
        foreach($result as $data){}
        $hasil = $data[0];
        echo $hasil;
    ?>    
    <p>Buku Terdaftar</p></span> </div>
    <div class="stat"> <i class="icon-user" style="color:red"></i> <span class="value">
    <?php
        $sql 	= 'SELECT COUNT(*) FROM tb_anggota';
        $result = $conn->prepare($sql);
        $result->execute();
        foreach($result as $data){}
        $hasil = $data[0];
        echo $hasil;
    ?>    
    <p>Anggota Terdaftar</p></span> </div>
    <div class="stat"> <i class="icon-star" style="color:yellow"></i> <span class="value">
    <?php
        $sql 	= 'SELECT Distinct COUNT(*) FROM tb_favorit';
        $result = $conn->prepare($sql);
        $result->execute();
        foreach($result as $data){}
        $hasil = $data[0];
        echo $hasil;
    ?>
    <p>Buku Favorit</p></span> </div>
    <div class="stat"> <i class="icon-circle" style="color:green"></i> <span class="value">
    <?php
        $sql 	= 'SELECT COUNT(*) FROM tb_anggota where statuslogin=1';
        $result = $conn->prepare($sql);
        $result->execute();
        foreach($result as $data){}
        $hasil = $data[0];
        echo $hasil;
    ?>
    <p>User Online</p></span> </div>
    
                        <!-- .stat -->
</div>
<div class="cf" style="padding-top:25px">
                    <?php
                        // Mendapatkan Data Tabel
                        //$sql 	= 'SELECT * FROM tb_buku b INNER JOIN tb_statistik s where b.kode_buku=s.kode_buku order by jumlah_download DESC';
                        // Cek apakah terdapat data page pada URL
                        $page = (isset($_GET['hals']))? $_GET['hals'] : 1;
                                
                        $limit = 10; // Jumlah data per halamannya

                        // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
                        $limit_start = ($page - 1) * $limit;
                        //$sql 	= "SELECT * FROM tb_buku LIMIT $limit_start, $limit""; 
                        
                        $result = $conn->prepare("SELECT * FROM tb_buku b INNER JOIN tb_statistik s where b.kode_buku=s.kode_buku order by jumlah_download DESC LIMIT ".$limit_start.",".$limit);
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
                                            <th>Jumlah Download</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php foreach($result as $row){ $no = $no +1;?>
                                        
                                            <tr>
                                                <td><?php echo $row['kode_buku']?></td>
                                                <td><?php echo $row['judul']?></td>
                                                <td><?php echo $row['pengarang']?></td>
                                                <td><?php echo $row['penerbit']?></td>
                                                <td><?php echo $row['kategori']?></td>
                                                <td><?php echo $row['jumlah_download']?></td>
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
																<li><a href="?page=admin&hals=1">Pertama</a></li>
																<li><a href="?page=admin&?hals=<?php echo $link_prev; ?>">&laquo;</a></li>
															<?php
															}
															?>
															<?php
																// Buat query untuk menghitung semua jumlah data
																$sql2 = $conn->prepare("SELECT COUNT(*) AS jumlah FROM tb_buku b INNER JOIN tb_statistik s where b.kode_buku=s.kode_buku");
																$sql2->execute(); // Eksekusi querynya
																$get_jumlah = $sql2->fetch();
																$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
																$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
																$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
																$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
																
																for($i = $start_number; $i <= $end_number; $i++){
																	$link_active = ($page == $i)? ' class="active"' : '';
															?>
																<li<?php echo $link_active; ?>><a href="?page=admin&hals=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
																<li><a href="?page=admin&hals=<?php echo $link_next; ?>">&raquo;</a></li>
																<li><a href="?page=admin&hals=<?php echo $jumlah_page; ?>">Terakhir</a></li>
															<?php
															}
															?>
														</ul></center>
												    </div>
    <div class="cf">
        <a href="print.php"><button class="btn btn-primary"><i class="icon-print"></i> Cetak Laporan</button></a>
    </div>
</div>