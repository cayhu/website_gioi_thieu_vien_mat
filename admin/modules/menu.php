<?php
            if(!isset($_SESSION['dangky'])){
              header('Location:../index.php');
 } 
?>
<?php
           if(isset($_GET['dangxuat'])&&$_GET['dangxuat'] == 1){
            unset($_SESSION['dangky']);
            header('Location:../index.php');        
        }
?>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">  
    </li>
  </ul>
</nav>	
<div class="container-fluid">
  <div class="row">
 <?php

if( $_SESSION['role_id'] == 1){
  //admin
 ?>
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a style="color:blue" class="nav-link active" href="index.php?action=dashboard&query=them">
              <i class="bi bi-house-fill"></i>
              Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?action=khachhang&query=lietke">
              <i class="bi bi-people-fill"></i>
              Khách hàng
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=tuvanmienphi&query=lietke">
              <i class="bi bi-people-fill"></i>
              Tư vấn miễn phí
            </a>
          </li>
        </ul>
      </div>
    </nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<?php } ?>