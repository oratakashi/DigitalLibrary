<div class="container">
<ul class="mainnav">
        <li class="active"><a href="dashboard.php?page=buku"><i class="icon-book"></i><span>Kelola Buku</span> </a> </li>
        <li><a href="dashboard.php?page=user"><i class="icon-user"></i><span>Kelola User</span> </a> </li>
        <?php if($_SESSION['level_user']=='admin'){ ?>
        <li><a href="dashboard.php?page=admin"><i class="icon-cogs"></i><span>Admin Panel</span> </a> </li> <?php } ?>
</ul>
</div>