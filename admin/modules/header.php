<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="../index.php">Viện Mắt</a>
  <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="bi bi-person-circle"></i>
    <?php  if(isset($_SESSION['dangky'])){echo ($_SESSION['dangky']);} ?>
  </button>
  <div class="dropdown-menu">
  <a class="dropdown-item" href="index.php">Tài khoản <i class="bi bi-person-circle"></i></a>
    <a class="dropdown-item" href="index.php?dangxuat=1">Đăng xuất <i class="bi bi-arrow-right-square-fill"></i></a>
    
  </div>
</div>
  <form class="form-inline"action="index.php?action=timkiem&query=them" method="POST">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="tukhoa">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="timkiem">Search</button>
  </form>
</nav>


