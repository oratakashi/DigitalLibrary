<div class="main">
    <div class="main-inner">
      <div class="container">
          <div class="row">
              <div class="span12">
                  <div class="widget widget-nopad">
                  <div class="widget-header"> <i class="icon-book"></i>
                  <h3> Tambah Buku</h3>
                  <a href="dashboard.php?page=buku" style="float:right"><button class="btn btn-danger" style="margin-right:5px;"><i class=" icon-remove" style="margin-bottom:3px;margin-left:0px;margin-right:0;color:white"></i></button></a>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                    <div class="tabbable">
							<ul class="nav nav-tabs">
							<li class="active"><a href="#dashboard" data-toggle="tab">Informasi Buku</a>
							<li><a href="#admin" data-toggle="tab">Unggah File Pdf</a>
							</li>
							</ul>
							
							<br>
							
								<div class="tab-content">
									<div class="tab-pane active" id="dashboard">
                                        <form action="action/input-buku.php" method="post" name="tambah-anggota" class="form-horizontal" enctype="multipart/form-data">
                                            <center><legend>Silakan Isi form dibawah ini</legend></center>
                                            <fieldset>
                                                <div class="control-group">
                                                    <label class="control-label" for="kd_buku">Kode Buku</label>
                                                        <div class="controls">
                                                            <input type="text" class="span6" id="kd_buku" placeholder="Kode Buku" name="kd_buku">
                                                            <p class="help-block">Kode Buku Wajib di isi.</p>
                                                        </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="judul">Judul Buku</label>
                                                        <div class="controls">
                                                            <input type="text" class="span6" id="judul" placeholder="Judul buku" name="judul">
                                                        </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="pengarang">Pengarang Buku</label>
                                                        <div class="controls">
                                                            <input type="text" class="span6" id="pengarang" placeholder="Pengarang Buku" name="pengarang">
                                                        </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="penerbit">Penerbit Buku</label>
                                                        <div class="controls">
                                                            <input type="text" class="span6" id="penerbit" placeholder="Penerbit Buku" name="penerbit">
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
                                                            <textarea name="sinopsis" class="span6" id="" cols="30" rows="10"></textarea>
                                                        </div>
                                                </div>
                                                <div class="control-group">
                                                        <label class="control-label" for="deskripsi">Deskripsi</label>
                                                        <div class="controls">
                                                            <textarea name="deskripsi" class="span6" id="" cols="30" rows="10"></textarea>
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
                                        </form>
									</div>
									<div class="tab-pane" id="admin">
                                        <form action="action/input-buku.php" method="post" name="tambah-anggota" class="form-horizontal" enctype="multipart/form-data">
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
  </div>