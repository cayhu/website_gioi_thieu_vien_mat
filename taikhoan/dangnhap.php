<?php
session_start(); 
include("../admin/config/config.php");
?>
<?php
  
   if(isset($_POST["dangnhap"])){
        $email=$_POST['email'];
        $matkhau=md5($_POST['password']);
        $sql=  "SELECT * FROM tbl_dangky WHERE email = '".$email."' AND matkhau='".$matkhau."' LIMIT 1";   
        $row=mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
          if($count>0){
              $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            $_SESSION['id_khachhang'] = $row_data['id_dangky'];
			$_SESSION['role_id'] = $row_data['role_id'];
			
			$_SESSION['email'] = $row_data['email'];
			if($_SESSION['role_id'] == 4){
           header ("Location:index.php");
			}else{
				header ("Location:../admin/index.php");

			}
		}else{
			echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng,vui lòng nhập lại.");</script>';
		}
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="https://gokisoft.com/uploads/2021/03/s-568-ico-web.jpg" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style=" background-size: cover; background-repeat: no-repeat;box-shadow: 2px 2px 2px 2px #9ac9f5;">
	<div class="container">
		<div class="panel panel-primary" style="width: 480px; margin: 0px auto; margin-top: 50px; background-color: white; padding: 10px; border-radius: 5px; border:solid 1px black;">
			<div class="panel-heading">
				<h2 class="text-center">Đăng Nhập</h2>
				<h5 style="color: red;" class="text-center"></h5>
			</div>
			<div class="panel-body">
				<form autocomplete="off" method="POST">
				<label>Email:</label>

					<div style="text-align:center; " class="form-group">
					  <input class="form-control" id="email" type="text" name="email" placeholder="Email..." autocomplete="off" >
					</div>
				<label>Mật khẩu:</label>

					<div style="text-align:center;" class="form-group">
					
					  <input class="form-control" id="email"type="password" name="password" autocomplete="off" placeholder="Mật khẩu">
					</div>
					<div style="text-align: center;">
					<input type="submit" name="dangnhap" value="Đăng nhập" class="btn btn-success"></input>
					</div>					
				</form>
			</div>
		</div>
	</div>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>