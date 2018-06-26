<div class="main">
    <div class="main-inner">
      <div class="container">
            <class="row">
                <div class="span12">
                    <div class="widget widget-nopad">
                    <div class="widget-header"> <i class="icon-book"></i>
                    <h3> Ubah Buku</h3>
                    <a href="dashboard.php?page=buku" style="float:right"><button class="btn btn-danger" style="margin-right:5px;"><i class=" icon-remove" style="margin-bottom:3px;margin-left:0px;margin-right:0;color:white"></i></button></a>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <?php
                        $id = $_GET['kode_buku'];
                        $src = $_GET['src'];
                    ?>
                    <div class="tabbable">
						<ul class="nav nav-tabs">
                            <li class="<?php if($src=='daftarbuku'){echo 'active';} ?>"><a href="#dashboard" data-toggle="tab">Informasi Buku</a>
                            <li class="<?php if($src=='tambahbuku'){echo 'active';} ?>"><a href="#admin" data-toggle="tab">Unggah File Pdf</a>
                            </li>
						</ul>
						<br>
                        <div class="tab-content">
                            <div class="tab-pane <?php if($src=='daftarbuku'){echo 'active';} ?>" id="dashboard">
                                <?php
                                    $sql 	= "SELECT * FROM tb_buku where kode_buku = '$id'";
                                    $result = $conn->prepare($sql);
                                    $result->execute();
                                    foreach($result as $row){
                                ?>
                                <form action="action/edit-buku.php" method="post" name="tambah-anggota" class="form-horizontal" enctype="multipart/form-data">
                                    <center><legend>Silakan Isi form dibawah ini</legend></center>
                                    <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="kd_buku">Kode Buku</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="kd_buku" placeholder="Kode Buku" name="kd_buku" value=<?php echo $row['kode_buku']?>>
                                                <p class="help-block">Kode Buku Wajib di isi.</p>
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="judul">Judul Buku</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="judul" placeholder="Judul buku" name="judul" value=<?php echo $row['judul']?>>
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="pengarang">Pengarang Buku</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="pengarang" placeholder="Pengarang Buku" name="pengarang" value=<?php echo $row['pengarang']?>>
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="penerbit">Penerbit Buku</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="penerbit" placeholder="Penerbit Buku" name="penerbit" value=<?php echo $row['penerbit']?>>
                                            </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="kategori">Kategori</label>
                                            <div class="controls">
                                                <select name="kategori" id="kategori">
                                                    <option value="">Kategori</option>
                                                    <option value="Komputer">Komputer</option>
                                                    <option value="Mesin">Mesin</option>
                                                    <option value="Kimia">Kimia</option>
                                                    <option value="Umum"> Umum</option>
                                                    <option value="Novel">Novel</option>
                                                    <option value="Komik">Komik</option>
                                                    <option value="Soal">Soal</option>
                                                    <option value="TugasAkhir">Tugas Akhir</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="control-group">
                                            <label class="control-label" for="sinopsis">Sinopsis</label>
                                            <div class="controls">
                                                <textarea name="sinopsis" class="span6" id="" cols="30" rows="10" value="<?php echo $row['sinopsis'] ?>"></textarea>
                                            </div>
                                    </div>
                                    <div class="control-group">
                                            <label class="control-label" for="deskripsi">Deskripsi</label>
                                            <div class="controls">
                                                <textarea name="deskripsi" class="span6" id="" cols="30" rows="10" value="<?php echo $row['deskripsi'] ?>"></textarea>
                                            </div>
                                    </div>
                                    <div class="control-group">
                                            <label class="control-label" for="gambar">Cover Buku</label>
                                            <div class="controls">
                                                <input type="file"  name="gambar" id="" accept="image/*">
                                            </div>
                                    </div>                          
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                                    </div> 
                                </fieldset>
                                </form><?php } ?>
                            </div>
                            <div class="tab-pane <?php if($src=='tambahbuku'){echo 'active';} ?>" id="admin">
                                <form action="action/upload-pdf.php?kode_buku=<?php echo $id ?>" method="post" name="tambah-anggota" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label" for="berkas">File Buku</label>
                                        <div class="controls">
                                            <input type="file"  name="berkas" id="" accept="application/pdf">
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                                        </div> 
                                    </div>
                                </form>
							</div>
                        </div>

              </div>
              </div>
            </div>
      </div>
  </div>