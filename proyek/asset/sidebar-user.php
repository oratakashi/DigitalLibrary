<div class="gn-scroller scrollbar1">
							<ul class="gn-menu agile_menu_drop">
								<li style="background-color:#c5c3c3">	
									<a class="profil" href="profile.php?id=<?php echo $_SESSION['nim'] ?>" style="color:black; font-size:15px;"><img src="../tmp/foto/<?php echo $_SESSION['foto'] ?>" alt="" class="foto_profil"><?php echo $_SESSION['nama'] ?></a>
								</li>
								<li><a href="member.php"> <i class="fa fa-home"></i> Beranda</a></li>
								<li>
									<a href="member.php?page=kategori"><i class="fa fa-list" aria-hidden="true"></i> Kategori </a> 
								</li>
								<li><a href="daftarbuku.php"> <i class="fa fa-book" aria-hidden="true"></i> Daftar Buku</a></li>								
								<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Akun <i class="fa fa-angle-down" aria-hidden="true"> </i></a> 
								     	<ul class="gn-submenu">
										<li class="mini_list_agile"><a href="member.php?page=pengaturan&src=sidebar"><i class="fa fa-cog" aria-hidden="true" ></i> Pengaturan Akun</a></li>
										<?php if(isset($_SESSION['level_user'])){ ?>
										<li class="mini_list_agile"><a href="../admin/"><i class="fa fa-users" aria-hidden="true" ></i> Masuk ke Panel Admin</a></li>
										<?php } ?>
										<li class="mini_list_w3"><a href="logout.php"> <i class="fa  fa-chevron-circle-left" aria-hidden="true" ></i> Log Out</a></li>
										
									</ul>
								</li>
							</ul>
						</div>