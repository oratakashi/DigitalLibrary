<div class="main">
  <div class="main-inner">
    <div class="container">
        
        <div class="row">
            <div class="span12">
                <form action="cari-buku.php" method="Get">
                <?
                    $cari = $_GET['cari'];
                    $pilihan = $_GET['pilihan']; 
                    echo "<h3>Hasil Pencarian dari $pilihan : $cari</h3>"?>
                <a href="dashboard.php?page=buku"><button class="btn btn-success" style="margin-bottom:20px;"><i class="icon-caret-left" style="margin-right:5px;"></i>Kembali</button></a>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="span12">
                <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Daftar Buku</h3> <a href="dashboard.php?page=buku-tambah"><button class="btn btn-success" ><i class="icon-plus" style="margin-right:2px;"></i>Tambah</button></a>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <?php
                        // Mendapatkan Data Tabel dari pencarian
                        if(isset($_GET['submit'])){
                            $cari = $_GET['cari'];
                            $pilihan = $_GET['pilihan'];
                            $sql 	= "SELECT * FROM tb_buku where $pilihan like '%".$cari."%'";
                            $result = $conn->prepare($sql);
                            $result->execute();
                        }
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
                                        <?php foreach($result as $row){ ?> <!-- Perulangan untuk menampilkan isi Hasil Pencarian-->
                                            <tr>
                                                <td><?php echo $row['kode_buku']?></td>
                                                <td><?php echo $row['judul']?></td>
                                                <td><?php echo $row['pengarang']?></td>
                                                <td><?php echo $row['penerbit']?></td>
                                                <td><?php echo $row['kategori']?></td>
                                                <td><a href="edit-buku.php?kode_buku=<?php echo $row['kode_buku']?>"><button class="btn btn-info">Ubah</button></a>  <a href="action/hapus-buku.php?kode_buku=<?php echo $row['kode_buku'] ?>"><button class="btn btn-danger">Hapus</button></a></td>
                                            </tr>
                                        <?php } ?>                             
                                    </tbody>
                    </table>
                <!-- /widget-content --> 
                </div>
            </div>
</div>
        </div>
    </div>
</div>