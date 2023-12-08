<?php
session_start(); 
include("../admin/config/config.php");
?>
<?php
include_once('../header-phu.php');
?>
<?php
if(isset($_POST['lienhe'])){
    $tennguoidung = $_POST['hoten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];   
    $noidung=$_POST['noidung'];
	$time_lh = date('Y-m-d H:i:s');
    $sql_dangky = mysqli_query($mysqli,"INSERT INTO feedback(tennguoidung,email,dienthoai,noidung,time_lh,status_lh) VALUE ('".$tennguoidung."','".$email."', '".$dienthoai."', '".$noidung."',  '".$time_lh."',1 )");
    if($sql_dangky){
        echo'<p style="color:red; ">Bạn đã đăng ký thành công</p>';
       
    }
}
?>
<a href="../taikhoan/dangnhap.php">
<h1 style="text-align:center; margin-top:40px;color:#147cc0;">Đặt lịch hẹn</h1></a>
<div class="container" >
	<form method="post">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
               
                </div>
			
			</div>
			<div class="form-group">
					  <label ></label>
					  <input type="text" class="form-control" id="email" name="hoten" placeholder="Nhập Họ & Tên"  >
					</div>
			<div class="form-group">
			  <input required="true" type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
			</div>
			<div class="form-group">
			  <input required="true" type="tel" class="form-control" id="phone" name="dienthoai" placeholder="Nhập sđt">
			</div>
			<div class="form-group">
			  <label for="pwd">Lời nhắn nha sĩ:</label>
			  <textarea class="form-control" rows="3" name="noidung" placeholder="Hẹn lịch hoặc lời nhắn cho nha sĩ !"></textarea>
			</div>
			<button name="lienhe" class="btn btn-success" style="border-radius: 5px; font-size: 26px; width: 100%;" >GỬI </button>
		</div>
		<div class="col-md-6">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3716.349200839798!2d105.37647417570876!3d21.336717077129297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31349312665c7473%3A0x1f251a3508657506!2zQuG7h25oIFZp4buHbiBN4bqvdCBTw6BpIEfDsm4gUGjDuiBUaOG7jQ!5e0!3m2!1svi!2s!4v1701688891879!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</form>
</div>
</section>
<?php
include_once('../footer-phu.php');
?>