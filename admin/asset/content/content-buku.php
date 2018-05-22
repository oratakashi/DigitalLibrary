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
                        $sql 	= 'SELECT * FROM tb_buku';
                        $result = $conn->prepare($sql);
                        $result->execute();
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