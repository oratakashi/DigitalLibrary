<div class="inner_content">
<div class="inner_content">
	<div class="inner_content_w3_agile_info two_in">
								<!-- /blank -->
									<div class="warning_w3ls_agile">
										<div class="blank-page agile_info_shadow">
											
											<p>Maaf perangkat anda tidak support untuk membuka digital library</p>
										</div>
									</div>
									<div class="blank_w3ls_agile">
										<div class="blank-page agile_info_shadow">
                                            <div class="row">
                                                <div class="thumbnail col-md-3" >
                                                    <img src="images/park.jpg" alt="Park" height="600px">
                                                </div>
                                                <div class="col-md-9">
                                                    <?php
                                                        require_once ("koneksi.php");
                                                        $id = $_SESSION['id'];
                                                        $connection = new ConnectionDB();
                                                        $conn = $connection->getConnection();
                                                        $sql 	= "SELECT * FROM tb_detailanggota where id_anggota=$id";
                                                        $result = $conn->prepare($sql);
                                                        $result->execute();
                                                        foreach($result as $row){
                                                        }
                                                    ?>
                                                    <h2 class="w3_inner_tittle" style="margin-top:130px; margin-bottom:5px"><?php echo $_SESSION['nama']?></h2>
                                                    <p>NIM : <?php echo $_SESSION['nim']?>  <?php if($_SESSION['status'] == 1){?><i class="fa fa-circle" style="color:green"></i> Online<?php } else{?><i class="fa fa-circle" ></i> Offline <?php } ?>
                                                    </p>
                                                    <a style="float:right; margin-bottom:10px; margin-left:5px"><button class="btn btn-success"><i class="fa fa-cog"></i></button></a>
                                                    <a style="float:right; margin-bottom:10px; margin-left:10px"><button class="btn btn-success"><i class="fa fa-list"></i> Log Aktifitas</button></a>
                                                    <a style="float:right; margin-bottom:10px"><button class="btn btn-success"><i class="fa fa-envelope"></i> Kirim Pesan</button></a>
                                                </div>
                                                <hr width='100%' size='20' >
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-4">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="background-color:white">Nama Lengkap</td>
                                                                    <td style="background-color:white"><?php echo $_SESSION['nama'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="background-color:white">NIM</td>
                                                                    <td style="background-color:white"><?php echo $_SESSION['nim'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="background-color:white">Email</td>
                                                                    <td style="background-color:white"><?php echo $_SESSION['email'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <center><h2 class="w3_inner_tittle" style="font-size:20px">Buku Favorit</h2></center>
                                                    
                                                    </div>
                                            </div>
										</div>
									</div>
								<!-- //blank -->
					
							
	</div>
					<!-- //inner_content_w3_agile_info-->
</div>
</div>