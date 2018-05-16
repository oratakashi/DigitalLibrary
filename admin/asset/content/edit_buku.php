<div class="main">
    <div class="main-inner">
      <div class="container">
          <div class="row">
              <div class="span12">
                  <div class="widget widget-nopad">
                  <div class="widget-header"> <i class="icon-book"></i>
                  <h3> Ubah Buku</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                    <?php
                        // Mendapatkan Data Tabel
                        $id = $_GET['kode_buku'];
                        $sql 	= "SELECT * FROM tb_buku where kode_buku = '$id'";
                        $result = $conn->prepare($sql);
                        $result->execute();
                        foreach($result as $row){
                    ?>
                  <form action="action/edit-buku.php" method="post" name="tambah-anggota" class="form-horizontal">
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
                                          <option value="Ilmu Komputer">Ilmu Komputer</option>
                                          <option value="Otomotif dan Mesin">Otomotif dan Mesin</option>
                                          <option value="Kimia Industri">Kimia Industri</option>
                                          <option value="Pelajaran Umum">Pelajaran Umum</option>
                                          <option value="Novel">Novel</option>
                                          <option value="Manga/Komik">Manga/Komik</option>
                                          <option value="Soal Latihan">Soal Latihan</option>
                                          <option value="Tugas Akir">Tugas Akhir</option>
                                      </select>
                                  </div>
                          </div>
                          <div class="control-group">
                                <label class="control-label" for="sinopsis">Sinopsis</label>
                                <div class="controls">
                                    <textarea name="sinopsis" class="span6" id="" cols="30" rows="10"></textarea>
                                </div>
                          </div>
                          <div class="form-actions">
                              <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                          </div> 
                      </fieldset>
                    </form><?php } ?>
              </div>
              </div>
          </div>
      </div>
  </div>