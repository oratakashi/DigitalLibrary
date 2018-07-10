<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->

					<!-- breadcrumbs -->
						
					<!-- //breadcrumbs -->

					<div class="inner_content_w3_agile_info two_in">
					  <h2 class="w3_inner_tittle">Pengaturan Akun</h2>

							<!-- /blank -->
								<div class="blank_w3ls_agile">
									<div class="blank-page agile_info_shadow">
										<div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav nav-tabs">
                                                    <li class="<?php $src=$_GET['src'];if($src=='sidebar'){echo "active";} ?>"><a data-toggle="tab" href="#informasi">Ganti Informasi Dasar</a></li>
                                                    <li class="<?php $src=$_GET['src'];if($src=='profil'){echo "active";} ?>"><a data-toggle="tab" href="#foto">Ganti Foto Profil</a></li>
                                                    <li><a data-toggle="tab" href="#advanced">Ganti Informasi Detail</a></li>
                                                    <li class="<?php $src=$_GET['src'];if($src=='error'||$src=='success'){echo "active";} ?>"><a data-toggle="tab" href="#password">Ganti Kata Sandi</a></li>
                                                    <li><a data-toggle="tab" href="#remove">Tutup Akun</a></li>
                                                </ul>
                                                <div class="tab-content" style="background-color:white">
                                                    <div id="informasi" class="tab-pane fade in <?php $src=$_GET['src'];if($src=='sidebar'){echo "active";} ?>">
                                                        <?php
                                                            // Mendapatkan Data Tabel
                                                            $id = $_SESSION['id'];
                                                            $sql 	= "SELECT * FROM tb_anggota where id_anggota = $id";
                                                            $result = $conn->prepare($sql);
                                                            $result->execute();
                                                            foreach($result as $row){
                                                        ?>
                                                            <form action="action/edit_basic.php" method="post" class="form-horizontal">
                                                                <div class="form-group">
                                                                    <label for="nama" class="col-sm-2 control-label">Nama</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control1" name="nama" value=<?php echo $row['nama'] ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="username" class="col-sm-2 control-label">Username</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control1" name="username" value=<?php echo $row['username'] ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control1" name="email" value=<?php echo $row['email'] ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-sm-12">
                                                                        <input type="submit" name="submit" class="form-control1 btn btn-success" value="Simpan">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        <?php } ?>
                                                    </div>
                                                    <div id="foto" class="tab-pane fade in <?php $src=$_GET['src'];if($src=='profil'){echo "active";} ?>">
                                                        <form action="action/edit_foto.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <!--label for="foto" class="col-sm-2 control-label">Foto Profil</label-->
                                                                <div class="col-sm-2 ">
                                                                    <img class="col-sm-12" src="../tmp/foto/<?=$_SESSION['foto']?>" style="width:90px;height:75px">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <!--input type="file" name="gambar" id="" class="form-control1" accept="image/*"-->
                                                                    <label for="foto" class="">Foto Profil</label>
                                                                    <a href="#" class="file-input"><input class="file btn-primary" name="gambar" title="<i class='fa fa-upload'></i> Unggah Foto" type="file"></a>
                                                                    <span class="file-input-name"></span>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <?php
                                                                        require_once ("koneksi.php");
                                                                        $id = $_SESSION['id'];
                                                                        $connection = new ConnectionDB();
                                                                        $conn = $connection->getConnection();
                                                                        $sql 	= "SELECT * FROM tb_foto where id_anggota=$id";
                                                                        $result = $conn->prepare($sql);
                                                                        $result->execute();
                                                                        $count=$result->rowCount();
                                                                        if($count == 1){
                                                                    ?>
                                                                        <br>
                                                                        <a href="action/hapus_foto.php"><button type="button" class="btn btn-danger btn-flat"><i class="fa fa-warning" aria-hidden="true" style="margin-right:5px"></i>Hapus Foto Profil</button></a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="submit" name="submit" class="form-control1 btn btn-success" value="Simpan">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="advanced" class="tab-pane fade">
                                                            <?php 
                                                                // Mendapatkan Data Tabel
                                                                $id = $_SESSION['id'];
                                                                $sql 	= "SELECT * FROM tb_detailanggota where id_anggota = $id";
                                                                $result = $conn->prepare($sql);
                                                                $result->execute();
                                                                foreach($result as $row){
                                                            ?>
                                                        <form action="action/edit_advanced.php" method="post" class="form-horizontal">
                                                            
                                                            <div class="form-group">
                                                                <label for="" class="col-sm-2 control-label">Tempat & Tanggal Lahir</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control1" name="tmplahir" value="<?php echo $row['tmplahir'] ?>">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <input type="date" name="tgllahir" id="" class="form-control1" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="col-sm-2 control-label">Alamat</label>
                                                                <div class="col-sm-8">
                                                                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control" ><?= $row['alamat']?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="col-sm-2 control-label">No Hp</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control1" name="nohp" value="<?php echo $row['no_hp'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="col-sm-2 control-label">Facebook</label>
                                                                <div class="col-sm-2">
                                                                    <p style="margin-top:10px">www.facebook.com/</p>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="fb" id="" class="form-control1" value="<?php echo $row['facebook'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="col-sm-2 control-label">Instagram</label>
                                                                <div class="col-sm-2">
                                                                    <p style="margin-top:10px">www.instagram.com/</p>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="text" name="ig" id="" class="form-control1" value="<?php echo $row['instagram'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="submit" class="form-control1 btn btn-success" value="Simpan" name="submit">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php } ?>
                                                    </div>
                                                    <div id="password" class="tab-pane fade in <?php $src=$_GET['src'];if($src=='error'||$src=='success'){echo "active";} ?>">
                                                        <form action="action/edit_password.php" method="post" class="form-horizontal">
                                                            <center><p style="color:red"><?php $src=$_GET['src'];if($src=='error'){echo "Password yang anda masukan salah !!";} ?></p></center>
                                                            <center><p style="color:green"><?php $src=$_GET['src'];if($src=='success'){echo "Berhasil Memperbarui Kata Sandi";} ?></p></center>
                                                            <div class="form-group">
                                                                <label for="" class="col-sm-2 control-label">Password Sekarang</label>
                                                                <div class="col-sm-8">
                                                                    <input type="password" class="form-control1" name="password">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="col-sm-2 control-label">Password Baru</label>
                                                                <div class="col-sm-8">
                                                                    <input type="password" class="form-control1" name="npassword">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="col-sm-2 control-label">Verifikasi Password</label>
                                                                <div class="col-sm-8">
                                                                    <input type="password" class="form-control1" name="cpassword">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <input type="submit" class="form-control1 btn btn-success" value="Simpan" name="submit">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="remove" class="tab-pane fade">
                                                        <h3>Hapus Akun</h3>
                                                        <p>Semua data anda yang tersimpan di situs ini akan di hapus permanen, termasuk daftar buku favorit, dan informasi akun anda</p><br>
                                                        <p>Tindakan ini tidak dapat di ulang kembali</p>
                                                        <a href="action/hapus_akun.php"><button type="button" class="btn btn-danger btn-flat"><i class="fa fa-warning" aria-hidden="true" style="margin-right:5px"></i>Hapus Akun</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
								</div>
							<!-- //blank -->
					
							
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>