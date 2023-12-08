<div class="clear"></div>
<div class="main">
<?php
            if(isset($_GET['action']) && $_GET['query']){
                $tam = $_GET['action'];
                $query = $_GET['query'];

            }else{
                $tam ='';
                $query ='';

            }


           if($tam=='khachhang' && $query =='lietke'){
                include("modules/khachhang/lietke.php");
            }elseif($tam=='quanlyslide' && $query =='them'){
                include("modules/quanlyslide/lietke.php");
            }elseif($tam=='tuvanmienphi' && $query =='lietke'){
                include("modules/tuvanmienphi/lietke.php");
       
            }else{
                 include("modules/dashboard.php");
            }
        ?>
</div>