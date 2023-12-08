<?php
	include('../../config/config.php');
	if(isset($_GET['code'])){
		$code_cart = $_GET['code'];
		$sql_update ="UPDATE feedback SET status_lh=0 where `feedback`.`id_feedback` = '".$code_cart."' ";
		$query = mysqli_query($mysqli,$sql_update);
		header('Location:../../index.php?action=khachhang&query=lietke');
	}
	if (isset($_GET['delete'])) {
		$code_cart = $_GET['delete'];
		$sql = "DELETE FROM `feedback` WHERE id_feedback = $code_cart";
		$result = mysqli_query($mysqli,$sql);
  
		echo '<script type="text/javascript">
			  setTimeout(function(){ location.href = "/website_gioi_thieu_vien_mat-main/admin/index.php?action=khachhang&query=lietke" }, 1000);
		  </script>';
	  }
?>