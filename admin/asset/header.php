<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="dashboard.php?page=buku">Digital Library </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> 
                  <?php
                      require_once ("koneksi.php");
                      //$aktif = $_SESSION['username'];
                      $connection = new ConnectionDB();
                      $conn = $connection->getConnection();
                      try{
                        $sql = "SELECT * FROM tb_admin";
                        $result = $conn->prepare($sql);
                        $result->execute();
                        foreach($result as $pengguna){
                            if ($pengguna['username'] == $_SESSION['username']){
                              echo $pengguna['nama'];
                            }
                        }
                      }
                      catch (PDOException $e){
                        echo "ERROR : " . $e->getMessage();
                      }
                  ?>
            <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="asset/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>