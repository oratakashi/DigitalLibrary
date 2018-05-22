<div class="main">
  <div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-user"></i>
                <h3> Tambah Anggota</h3>
                <a href="dashboard.php?page=user" style="float:right"><button class="btn btn-danger" style="margin-right:5px;"><i class=" icon-remove" style="margin-bottom:3px;margin-left:0px;margin-right:0;color:white"></i></button></a>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <form action="action/input-anggota.php" method="post" name="tambah-anggota" class="form-horizontal">
                    <center><legend>Silakan Isi form dibawah ini</legend></center>
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="nim">NIM</label>
								<div class="controls">
                                    <input type="text" class="span6" id="nim" placeholder="NIM" name="nim">
                                    <p class="help-block">NIM Wajib di isi.</p>
								</div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="username">Username</label>
								<div class="controls">
									<input type="text" class="span6" id="username" placeholder="Username" name="username">
								</div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="nama">Nama Anggota</label>
								<div class="controls">
									<input type="text" class="span6" id="nama" placeholder="Nama Anggota" name="nama">
								</div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="email">Email</label>
								<div class="controls">
									<input type="text" class="span6" id="email" placeholder="Email" name="email">
								</div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="password">Password</label>
								<div class="controls">
									<input type="password" class="span6" id="password" placeholder="Password" name="password">
								</div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="cpassword">Konfirmasi Password</label>
								<div class="controls">
									<input type="password" class="span6" id="cpassword" placeholder="Konfirmasi Password" name="cpassword">
								</div>
                        </div>
                        <div class="form-actions">
							<button type="submit" class="btn btn-success" name="submit">Simpan</button>
						</div> 
                    </fieldset>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>