<?php
	include('../../config/config.php');
	if(isset($_GET['code'])){
		$code_cart = $_GET['code'];
		$sql_update ="UPDATE tuvanmienphi SET status_lh=0 where `tuvanmienphi`.`id` = '".$code_cart."' ";
		$query = mysqli_query($mysqli,$sql_update);
		header('Location:../../index.php?action=tuvanmienphi&query=lietke');
	}
	if (isset($_GET['delete'])) {
		$code_cart = $_GET['delete'];
		$sql = "DELETE FROM `tuvanmienphi` WHERE id = $code_cart";
		$result = mysqli_query($mysqli,$sql);
  
		echo '<script type="text/javascript">
			  setTimeout(function(){ location.href = "/website_gioi_thieu_vien_mat-main/admin/index.php?action=tuvanmienphi&query=lietke" }, 1000);
		  </script>';
	  }
?>