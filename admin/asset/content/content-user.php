<div class="main">
  <div class="main-inner">
    <div class="container">
        
        <div class="row">
            <div class="span12">
                <form action="cari-user.php" method="get">
                    <input type="text" placeholder="&#xF002; Pencarian" style="width:94%;font-family:Arial, FontAwesome" name="cari" id="cari">
                    <input type="submit" value="Cari" class="btn" style="margin-bottom:9px;" name="submit">
                    Cari Berdasarkan :
                    <select name="pilihan" id="">
                        <option value="nama">Nama</option>
                        <option value="nim">NIM</option>
                        <option value="id_anggota">Kode Anggota</option>
                        <option value="email">Email</option>
                        <option value="username">Username</option>
                    </select>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="span12">
                <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Daftar Anggota</h3> <a href="dashboard.php?page=user-tambah"><button class="btn btn-success"><i class="icon-plus" style="margin-right:2px;"></i> Tambah</button></a>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <?php
                        // Mendapatkan Data Tabel
                        $sql 	= 'SELECT * FROM tb_anggota';
                        $result = $conn->prepare($sql);
                        $result->execute();
                    ?>   
                    <table class="table table-striped table-bordered datatable-extended">
                                    <thead>
                                        <tr>
                                            <th>Kode Anggota</th>
                                            <th>NIM</th>
                                            <th>Username</th>
                                            <th>Nama Anggota</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php foreach($result as $row){ ?>
                                            <tr>
                                                <td><?php echo $row['id_anggota']?></td>
                                                <td><?php echo $row['nim']?></td>
                                                <td><?php echo $row['username']?></td>
                                                <td><?php echo $row['nama']?></td>
                                                <td><?php echo $row['email']?></td>
                                                <td><a href="action/hapus-anggota.php?id_anggota=<?php echo $row['id_anggota'] ?>"><button class="btn btn-danger">Hapus</button></a></td>
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