<?php
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=vienmat;charset=utf8";
    $username = 'root';
    $password = ''; // config ở đây

    $andev = new PDO($dburl, $username, $password);
    $andev->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $andev;
}
function pdo_execute($sql, $sql_args = array())
{
    // $sql_args = array_slice(func_get_args(), 1);
    try {
        $andev = pdo_get_connection();
        $stmt = $andev->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($andev);
    }
}
function pdo_query($sql, $sql_args = array())
{
    // $sql_args = array_slice(func_get_args(), 1);
    try {
        $andev = pdo_get_connection();
        $stmt = $andev->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($andev);
    }
}
if(isset($_POST['submit'])){
    $hoten = $_POST['hoten'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    if(empty($hoten)|| empty($phone)|| empty($email)){
    $info = "ok";
        echo '<script type="text/javascript">
        Swal.fire(
            "Thành Công",
            "Thêm Danh Mục Thành Công!",
            "success"
        );
            </script>';
    }
    else{
        $sql_lietke_ph = "INSERT INTO `tuvanmienphi`(name_user,email,phone) VALUES ('$hoten','$email','$phone')";
        $query = pdo_execute($sql_lietke_ph);

    }
}
else{
    $info = "err";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0" />
    <title>BỆNH VIỆN MẮT SÀI GÒN - Hệ Thống Khám Mắt Uy Tín Tại Việt Nam</title>
    <link rel="shortcut icon" href="https://static.benhvienmatsaigonphutho.com/uploads/saigoneyehospital/common/phu-tho_1699005163.png" type="image/x-icon">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/owl-sync.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
</head>

<body id="prnew">
    <header class="menufix">
        <nav class="boxtop">
            <div class="container">
                <div class="boxtop__logo">
                    <a href="index.php">
                        <picture>
                            <img src="../images/logo/icon-logo.png" alt="">
                        </picture>
                    </a>
                </div>
                <div class="boxtop__new">
                    <h1 class="center">
                        <div class="boxtop__newlabel">
                            HỆ THỐNG CHĂM SÓC MẮT UY TÍN TẠI VIỆT NAM
                        </div>
                    </h1>
                </div>
                <a class="boxtop__call btnnkhotline" href="../lien-he/lienhe.php">
                    Liên hệ
                </a>
            </div>
        </nav>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded header">
            <div class="container">
                <button aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-left" data-target="#navbar-header" data-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="/"></a>
                <a class="call" href=""></a>
                <div class="collapse navbar-collapse" id="navbar-header">
                    <a class="logosb" href="/"></a>
                    <ul class="navbar-nav mr-auto menu">
                        <li class="dropdown">
                            <a href="../index.php" target="_self">
                                Trang chủ
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" target="_self">
                                Giới thiệu
                                <i class="fa-solid fa-angle-down menu-icon-1"></i>
                                <i class="fa-solid fa-plus menu-icon-2"></i>
                            </a>
                            <div class="dropdown-menu">
                                <article class="dd dd-2">
                                    <div class="ddnav ddnav-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li>
                                                        <a href="../gioithieu/gioi-thieu-co-so-vat-chat.php" rel="nofollow" title="Cơ sở vật chất">
                                                            Cơ sở vật chất
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../gioithieu/doi-ngu-bac-si.php" rel="nofollow" title="Đội ngũ bác sỹ">
                                                            Đội ngũ bác sỹ
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../gioithieu/chung-toi-la-ai.php" rel="nofollow" title="Chúng tôi là ai">
                                                            Chúng tôi là ai
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" target="_self">
                                Kiểm tra chuẩn đoán
                                <i class="fa-solid fa-angle-down menu-icon-1"></i>
                                <i class="fa-solid fa-plus menu-icon-2"></i>
                            </a>
                            <div class="dropdown-menu">
                                <article class="dd dd-3">
                                    <div class="ddnav ddnav-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li>
                                                        <a href="../khiem-tra-chuan-doan/Boc-rang-su-Nano-Ceramic.php" rel="nofollow" title="Tiểu phẫu - Thủ thuật">
                                                            Tiểu phẫu - Thủ thuật
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../khiem-tra-chuan-doan/Dan-su-Veneer.php" rel="nofollow" title="Khám mắt tổng quát">
                                                           Khám mắt tổng quát
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../khiem-tra-chuan-doan/Trong-rang-implant.php" rel="nofollow" title="Khám mắt chuyên sâu ">
                                                            Khám mắt chuyên sâu
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li>
                                                        <a href="../khiem-tra-chuan-doan/Cat-loi-tham-my-cong-nghe-Laser.php" rel="nofollow" title="Điều trị laser">
                                                            Điều trị laser
                                                        </a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a href="../khiem-tra-chuan-doan/Tay-trang-rang.php" rel="nofollow" title="Điều trị các bệnh về mắt">
                                                            Điều trị các bệnh về mắt
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" target="_self">
                                Tư vấn phẫu thuật
                                <i class="fa-solid fa-angle-down menu-icon-1"></i>
                                <i class="fa-solid fa-plus menu-icon-2"></i>
                            </a>
                            <div class="dropdown-menu">
                                <article class="dd dd-4">
                                    <div class="ddnav ddnav-4">
                                        <div class="row">
                                        <div class="col-lg-6">
                                                <ul>
                                                    <li>
                                                        <a href="nha-khoa-benh-ly/Han-rang.php" rel="nofollow"
                                                            title="Phẫu thuật tật khúc xạ (Mổ cận)">
                                                            Phẫu thuật tật khúc xạ (Mổ cận)
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="nha-khoa-benh-ly/Dieu-tri-tuy-cong-nghe-X-Smart.php"
                                                            rel="nofollow" title="Phẫu thuật Relex Smile">
                                                            Phẫu thuật Relex Smile
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="nha-khoa-benh-ly/Nho-rang-an- toan-song-sieu-am-Piezotome.php"
                                                            rel="nofollow"
                                                            title="Phẫu thuật Femto">
                                                            Phẫu thuật Femto Phakic ICL EVO+
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li>
                                                        <a href="../khiem-tra-chuan-doan/Dinh-da-len-rang.php"
                                                            rel="nofollow" title="Phẫu thuật Phaco điều trị đục thuỷ tinh thể">
                                                            Phẫu thuật Phaco điều trị đục thuỷ tinh thể
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../khiem-tra-chuan-doan/Nieng-rang-tao-cam-V-line.php"
                                                            rel="nofollow" title="Phẫu thuật Lác">
                                                            Phẫu thuật Lác
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" target="_self">
                                Bảng giá
                                <i class="fa-solid fa-angle-down menu-icon-1"></i>
                                <i class="fa-solid fa-plus menu-icon-2"></i>
                            </a>
                            <div class="dropdown-menu">
                                <article class="dd dd-5">
                                    <div class="ddnav ddnav-5">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <ul>
                                                    <li>
                                                        <a href="../bang-gia/Bang-gia-chinh-nha-nieng-rang.php" rel="nofollow" title="Bảng giá Chỉnh nha - Niềng răng">
                                                            Bảng giá Chỉnh nha - Niềng răng
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../bang-gia/Bang-gia-boc-rang-su.php" rel="nofollow" title="Bảng giá Bọc răng sứ">
                                                            Bảng giá Bọc răng sứ
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../bang-gia/Bang-gia-cay-ghap-Implant.php" rel="nofollow" title="Bảng giá Cấy ghép Implant">
                                                            Bảng giá Cấy ghép Implant
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" target="_self">
                                Khách hàng
                                <i class="fa-solid fa-angle-down menu-icon-1"></i>
                                <i class="fa-solid fa-plus menu-icon-2"></i>
                            </a>
                            <div class="dropdown-menu">
                                <article class="dd dd-6">
                                    <div class="ddnav ddnav-6">
                                        <div class="row">
                                        <div class="col-lg-6">
                                                <ul>
                                                    <li>
                                                        <a href="../khach-hang/Khach-hang-tieu-bieu.php" rel="nofollow"
                                                            title="Khách hàng tiêu biểu">
                                                            Khách hàng tiêu biểu
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../khach-hang/Hinh-anh-truoc-sau.php" rel="nofollow"
                                                            title="Hình ảnh trước sau">
                                                            Hình ảnh trước sau
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="" rel="nofollow" title="Bảng Giá Dịch Vụ Chung">
                                                            Bảng Giá Dịch Vụ Chung
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="" rel="nofollow" title="Video khách hàng">
                                                            Video khách hàng
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="../tintuc/tintuc.php" target="_self">
                                Tin tức hoạt động
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="menu-bg"></div>
        </nav>
    </header>
    <div class="breadcrum">
        <div class="container">
            <span id="breadcrumbs">
                <span class=""><span>Trang chủ »<span>
            <span>
                     GIỚI THIỆU » 
                </span>
            <b>
                Cơ sở vật chất hiện đại
                </b>
            </span>
            </span>
        </div>
    </div>
    <div class="post">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 post__left">
                    <div class="item-1">
                        <span class="tt-post">
                            <span class="icon-post icon-4"></span>
                        <p>Kiểm Tra Chẩn Đoán</p>
                        </span>
                    </div>
                    <div class="item-4">
                    <ul>
                    <li>
                <a href="../khiem-tra-chuan-doan/Boc-rang-su-Nano-Ceramic.php" target="_self">
                    Tiểu phẫu - Thủ thuật
                </a>
            </li>
            <li>
                <a href="../khiem-tra-chuan-doan/Dan-su-Veneer.php" target="_self">
                    Khám mắt tổng quát
                </a>
            </li>
            <li>
                <a href="../khiem-tra-chuan-doan/Trong-rang-implant.php" target="_self">
                    Khám mắt chuyên sâu
                </a>
            </li>
            <li>
                <a href="../khiem-tra-chuan-doan/Cat-loi-tham-my-cong-nghe-Laser.php" target="_self">
                    Điều trị laser
                </a>
            </li>
            <li>
                <a href="../khiem-tra-chuan-doan/Nieng-rang-mat-trong.php" target="_self">
                    Điều trị Glaucoma
                </a>
            </li>
            <li>
                <a href="../khiem-tra-chuan-doan/Dinh-da-len-rang.php" target="_self">
                    Điều trị các bệnh về mắt
                </a>
            </li>
                    </ul>
                    </div>

                    <div class="item-1">
                        <span class="tt-post">
                            <span class="icon-post icon-5"></span>
                        <p>Tư vấn phẫu thuật </p>
                        </span>
                    </div>
                <div class="item-4">
                    <ul>
                        <li>
                            <a href="../tu-van-phau-thuat/Han-rang.php" target="_self">
                                Phẫu thuật tật khúc xạ (Mổ cận)
                             </a>
                        </li>
                        <li>
                            <a href="../tu-van-phau-thuat/Dieu-tri-tuy-cong-nghe-X-Smart.php" target="_self">
                                Phẫu thuật Relex Smile
                            </a>
                        </li>
                        <li>
                            <a href="../tu-van-phau-thuat/Nho-rang-an- toan-song-sieu-am-Piezotome.php" target="_self">
                                Phẫu thuật Femto
                            </a>
                        </li>
                        <li>
                        <a href="../tu-van-phau-thuat/Dieu-tri-viem-nha-chu.php" target="_self">
                                Phẫu thuật Lasik dao OUP
                            </a>
                        </li>
                        <li>
                        <a href="../tu-van-phau-thuat/Lay-cao-rang-song-sieu-am.php" target="_self">
                                Crosslinking Khúc xạ
                        </a>
                        </li>
                        <li>
                        <a href="../tu-van-phau-thuat/Nha-khoa-tre-em.php" target="_self">
                                Phẫu thuật Phakic ICL EVO+
                        </a>
                        </li>
                        <li>
                        <a href="../tu-van-phau-thuat/Nha-khoa-tre-em.php" target="_self">
                                Phẫu thuật Phaco điều trị đục thuỷ tinh thể
                        </a>
                        </li>
                        <li>
                        <a href="../tu-van-phau-thuat/Nha-khoa-tre-em.php" target="_self">
                                Phẫu thuật Lác
                        </a>
                        </li>
                        
                    </ul>
                </div>

                    <div class="item-1">
                        <span class="tt-post">
                            <span class="icon-post icon-7"></span>
                        <p>Tin khuyến mại</p>
                        </span>
                    </div>
                    <div class="item-7">
                        <div class="tin-xn">
                            <div class="tin-xn-item">
                                <div class="img">
                                    <img alt="Cơ hội cuối năm: Khuyến mãi trồng răng Implant - off 15% chỉ từ 11.5 triệu" src="https://static.nhakhoavietduc.com.vn/2020/09/23/9bdac09ac71c3842610d.jpg">
                                </div>
                                <div class="tt">
                                    <a class="tt-1" href="../khuyen-mai/co-hoi-cuoi-nam.php">
                                        Cơ hội cuối năm: Khuyến mãi trồng răng Implant - off 15% chỉ từ 11.5 triệu
                                    </a>
                                    <br>
                                    <a class="more" href="../khuyen-mai/co-hoi-cuoi-nam.php">
                                        Xem thêm &gt;&gt;
                                    </a>
                                </div>
                            </div>
                            <div class="tin-xn-item">
                                <div class="img">
                                    <img alt="Cơ hội cuối năm: Off 15% Bọc răng sứ Nano Creramic Xinh đẹp tức thì - Tự tin khoe cá tính" src="https://static.nhakhoavietduc.com.vn/2020/11/27/321750d741d0b08ee9c1.jpg">
                                </div>
                                <div class="tt">
                                    <a class="tt-1" href="../khuyen-mai/15-boc-rang-su.php">
                                        Cơ hội cuối năm: Off 15% Bọc răng sứ Nano Creramic Xinh đẹp tức thì - Tự tin
                                        khoe cá tính
                                    </a>
                                    <br>
                                    <a class="more" href="../khuyen-mai/15-boc-rang-su.php">
                                        Xem thêm &gt;&gt;
                                    </a>
                                </div>
                            </div>
                            <div class="tin-xn-item">
                                <div class="img">
                                    <img alt="OFF 15% – Niềng răng Braces 6s Công nghệ hiện đại số 1 thế giới" src="https://static.nhakhoavietduc.com.vn/2020/10/01/2b12728784337b6d2222.jpg">
                                </div>
                                <div class="tt">
                                    <a class="tt-1" href="../khuyen-mai/nieng-rang-braces.php">
                                        OFF 15% – Niềng răng Braces 6s Công nghệ hiện đại số 1 thế giới
                                    </a>
                                    <br>
                                    <a class="more" href="../khuyen-mai/nieng-rang-braces.php">
                                        Xem thêm &gt;&gt;
                                    </a>
                                </div>
                            </div>
                            <div class="tin-xn-item">
                                <div class="img">
                                    <img alt="Niềng răng sớm đẹp sớm hấp dẫn với lãi suất 0đ" src="https://static.nhakhoavietduc.com.vn/2020/02/15/862958802714056308702812594103172285333504o.jpg">
                                </div>
                                <div class="tt">
                                    <a class="tt-1" href="../khuyen-mai/nieng-rang-som.php">
                                        Niềng răng sớm đẹp sớm hấp dẫn với lãi suất 0đ
                                    </a>
                                    <br>
                                    <a class="more" href="../khuyen-mai/nieng-rang-som.php">
                                        Xem thêm &gt;&gt;
                                    </a>
                                </div>
                            </div>
                            <div class="tin-xn-item">
                                <div class="img">
                                    <img alt="Nụ cười mới dẫn lối thành công - Off 30%  thẩm mỹ răng tiêu chuẩn Châu Âu" src="https://static.nhakhoavietduc.com.vn/2021/04/01/35.jpg">
                                </div>
                                <div class="tt">
                                    <a class="tt-1" href="../khuyen-mai/nu-cuoi-som-dan-loi.php">
                                        Nụ cười mới dẫn lối thành công - Off 30% thẩm mỹ răng tiêu chuẩn Châu Âu
                                    </a>
                                    <br>
                                    <a class="more" href="../khuyen-mai/nu-cuoi-som-dan-loi.php">
                                        Xem thêm &gt;&gt;
                                    </a>
                                </div>
                            </div>
                            <div class="tin-xn-item">
                                <div class="img">
                                    <img alt="Hè sang - Răng trắng sáng - Cười siêu sang OFF 20% thẩm mỹ răng tiêu chuẩn Châu Âu" src="https://static.nhakhoavietduc.com.vn/2021/06/14/chao-he-sang-262x178.jpg">
                                </div>
                                <div class="tt">
                                    <a class="tt-1" href="../khuyen-mai/he-sang.php">
                                        Hè sang - Răng trắng sáng - Cười siêu sang OFF 20% thẩm mỹ răng tiêu chuẩn Châu
                                        Âu
                                    </a>
                                    <br>
                                    <a class="more" href="../khuyen-mai/he-sang.php">
                                        Xem thêm &gt;&gt;
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 post__right">
                    <h1 class="title-post">BỆNH VIỆN CHUYÊN KHOA MẮT VỚI ĐỘI NGŨ Y BÁC SĨ GIÀU KINH NGHIỆM CÙNG TRANG THIẾT BỊ VẬT CHẤT HIỆN ĐẠI</h1>
                    <section class="content loaded">
                        <div class="chi-tiet scroll_check">
                            <div class="post_info">
                                <div class="post_author pc">Tác giả: <a>admin</a> * Tham vấn y khoa: <a> Chuyên gia Về Mắt Quốc Tế Tại Bệnh Viện Mắt Sài Gòn Phú Thọ</a></div>
                                <div class="post_info_box">
                                    <p><i class="fa-solid fa-calendar"></i> 07/08/2023</p>
                                </div>
                            </div>
                            <div class="sapo">Với mục tiêu xây dựng viện mắt tiêu chuẩn&nbsp;cao tại Việt Nam, bệnh viện mắt Sài Gòn Phú Thọ hợp tác, nâng cấp hệ thống trang thiết bị Châu Âu. Hệ thống trang thiết bị hiện đại không chỉ giúp hỗ trợ việc chuẩn đoán, điều trị
                                nhanh chóng chính xác mà còn đáp ứng các kỹ thuật điều trị không đau và tiêu chuẩn vô trùng khắt khe theo tiêu chuẩn Châu Âu EN 1717.</div>
                            <div class="post_desc">
                                <div id="content">
                                    <div class="service-bound">
                                        <div class="content-lft">
                                            <div class="news-list-title wow fadeInLeft animated">
                                                <div>
                                                    <div class="service-detail-bound">
                                                        <div class="service-detail-desc">
                                                            <h2><span style="font-size: 13px; font-family: arial, helvetica, sans-serif; color: #008080;"><strong>1. HỆ THỐNG THIẾT BỊ HIỆN ĐẠI&nbsp;THẾ GIỚI</strong></span></h2>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">Hệ thống thiết bị nhập khẩu trực tiếp từ Đức, tích hợp all-in-one công nghệ hiện đại hiện nay.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- Máy phẫu thuật khúc xạ Visumax.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- Máy phẫu thuật khúc xạ Mel90.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- Máy sinh hiển vi Lumera 700.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- Máy phẫu thuật Phaco.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- Máy chụp cắt lớp OCT - Master 700.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- MÁY CROSS-LINKING – KXL</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- SCHWIND AMARIS 1050RS </span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- SCHWIND AMARIS 750S  </span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- MÁY CHỤP CẮT LỚP VÕNG MẠC </span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- MÁY CENTURION SILVER </span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- FEMTO LDV Z8 </span></p>
                                                            <p style="text-align: center;"><span style="font-family: arial, helvetica, sans-serif; font-size: 13px;">Các công nghệ tích hợp được kiểm soát thông qua hệ thống phần mềm phân tích chuyên sâu, cho phép chuẩn đoán và điều trị nhanh chóng tình trạng của khách &nbsp;</span></p>
                                                            <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="../img/U1ea1i3.jpg" alt="" width="560" height="385"></span></p>
                                                            <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><em>&nbsp;Thiết bị hiện đại hiện nay</em></span></p>
                                                            <h2><span style="font-size: 13px; font-family: arial, helvetica, sans-serif; color: #008080;"><strong>2. HỆ THỐNG CÔNG NGHỆ KIỂM SOÁT CƠN ĐAU -&nbsp;<em>Pain Control System</em></strong></span></h2>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">-<strong><em>&nbsp;Hệ thống Bơi Thuốc Infusion Pump</em></strong>: kết hợp với các kỹ thuật gây tê hiện đại giúp kiểm cơn đau. Bệnh viện mắt Sài Gòn Phú Thọ ứng dụng công nghệ tự động đưa thuốc giảm đau vào máu của bệnh nhân, các dụng cụ nha khoa để loại bỏ cơn đau trực tiếp, đảm bảo liều lượng chính xác và kiểm soát hiệu quả..</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><strong><em>- Máy Đo Áp Suất Mắt</em></strong><em>&nbsp;<strong>Tonometry:&nbsp;</strong></em>Đặc biệt quan trọng trong phẫu thuật mắt, máy này giúp theo dõi áp suất mắt để ngăn chặn các biến động không mong muốn và đảm bảo an toàn cho mắt..</span></p>
                                                            <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">&nbsp;<img src="https://static.nhakhoavietduc.com.vn/Nha khoa VD- Bai pr/C%23U00f4ng-ngh%23U1ec7-hi%23U1ec7n-%23U0111%23U1ea1i4.jpg" alt="" width="560" height="385"></span></p>
                                                            <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><em>Hệ thống kiếm soát cơn đau, giúp khách hàng không còn cảm thấy đau đớn&nbsp;</em></span></p>
                                                            <h2><span style="font-size: 13px; font-family: arial, helvetica, sans-serif; color: #008080;"><strong>3. HỆ THỐNG KHÁM MẮT HIỆN ĐẠI</strong></span></h2>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">Hệ thống khám mắt tại Phòng khám đa khoa Quốc tế áp dụng công nghệ khử trùng bằng ánh sáng cực tím tiêu diệt vi khuẩn và mầm bệnh, đảm bảo môi trường khám vô trùng tuyệt đối.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><strong>Công nghệ chuẩn đoán và tư vấn</strong></span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- Máy quét mắt tia cực nhanh OCT hiện đại nhất hiện nay, quét lớp cắt mắt chi tiết để phát hiện sớm bệnh lý.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- Phần mềm mô phỏng mắt 3D giúp phân tích chính xác tình trạng mắt, hỗ trợ bác sĩ đưa ra phương án điều trị phù hợp.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">- Công nghệ trí tuệ nhân tạo hỗ trợ chẩn đoán hình ảnh, phát hiện bất thường sớm.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><strong>Thiết bị phẫu thuật tiên tiến</strong></span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">Áp dụng công nghệ phẫu thuật Laser điều trị các bệnh lý về mắt như cận thị, viêm kết mạc, đục thủy tinh thể. Thiết bị phẫu thuật tự động hoá cao, đảm bảo độ chính xác và an toàn cho người bệnh.</span></p>
                                                            <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">Với trang thiết bị hiện đại cùng đội ngũ bác sĩ giỏi, Viện Mắt Sài Gòn Phú Thọ là địa chỉ khám và điều trị bệnh lý mắt uy tín hàng đầu khu vực.</span></p>
                                                            <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><img src="https://static.nhakhoavietduc.com.vn/Nha khoa VD- Bai pr/C%23U00f4ng-ngh%23U1ec7-hi%23U1ec7n-%23U0111%23U1ea1i5.jpg" alt="may-vo-trung-khong-khi" width="560"></span></p>
                                                            <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><em>Hệ thống máy vô trùng không khí EXTRA AS</em></span></p>
                                                                                                                   <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">Với hệ thống công nghệ tân tiến bậc Châu Âu, Bệnh Viện Mắt Sài Gòn Phú Thọ đã và đang là lựa chọn của hơn 20.000 khách hàng mỗi năm, điểm đến của các Chính trị gia, MC và người nổi tiếng.</span></p>
                                                            <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><img src="https://static.nhakhoavietduc.com.vn/Bai%20cong%20nghe%20hien%20dai/dat-lich.jpg" alt="lien-he-dat-lich" width="560"></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="ibox-content">
            </div>
            <!--End ibox content-->
        </div>
    </div>

    <section class="cateReg loaded">
        <div class="container">
        <div class="cateReg__box">
                <h4>Đăng ký tư vấn miễn phí</h4>
                <form id="form-1" action="" method="POST" role="form">
                    <div class="form-group field-customerregisterform-name required">
                        <input type="text" name="hoten" class="form-input form" id="fname" placeholder="Họ tên">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group field-customerregisterform-name required">
                        <input type="text" name="phone" class="form-input form" id="fphone" placeholder="Số điện thoại">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group field-customerregisterform-name required">
                        <input type="text" name="email" class="form-input form" id="femail" placeholder="Email">
                        <span class="form-message"></span>
                    </div>
                    <div class="regist">
                        <button type="submit" name="submit" class="btn btn-success">Gửi thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="home home9 loaded">
        <div class="container">
            <h2 class="homeTitle homeTitle-center"></h2>
            <div class="icon-title">
                <h2 class="homeTitle homeTitle-center"></h2>
            </div>
            <div class="home9__box">
                <div class="tabs row" id="tabs">
                    <a class="tab tuvan col-lg-4 col-xs-4 active" href="#tuvan">
                        <h2 class="homeTitle homeTitle-center"></h2>
                        <div class="tit">
                            <h2 class="homeTitle homeTitle-center">
                                Tư vấn Về Mắt
                            </h2>
                            <div class="homeLine homeLine-left">
                                <h2 class="homeTitle homeTitle-center"></h2>
                            </div>
                        </div>
                    </a>
                    <a class="tab tinnhakhoa col-lg-4 col-xs-4" href="#tinnhakhoa">
                        <h2 class="homeTitle homeTitle-center"></h2>
                        <div class="tit">
                            <h2 class="homeTitle homeTitle-center">
                                Tin Viện Mắt
                            </h2>
                            <div class="homeLine homeLine-left">
                                <h2 class="homeTitle homeTitle-center"></h2>
                            </div>
                        </div>
                    </a>
                    <a class="tab cauhoi col-lg-4 col-xs-4" href="#cauhoi">
                        <h2 class="homeTitle homeTitle-center"></h2>
                        <div class="tit">
                            <h2 class="homeTitle homeTitle-center">
                                Câu hỏi thường gặp
                            </h2>
                            <div class="homeLine homeLine-left">
                                <h2 class="homeTitle homeTitle-center"></h2>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="owl-carousel owl-theme">
                    <div class="item" data-hash="tuvan">
                        <div class="box scrollbar" id="style-3">
                            <div class="force-overflow">
                                <div class="box-item">
                                    <div class="box-item-1">1</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Bọc răng sứ Titan có bị đen không? 
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">2</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Tháo răng sứ có đau không? 
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">3</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Chế độ bảo hành răng sứ
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">4</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Răng sứ Cercon có mấy loại?
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">5</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Phải làm gì khi răng sứ bị lung lay? 
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">6</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Cách chăm sóc răng bọc sứ để bền chắc
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">7</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Góc tư vấn: Dán sứ Veneer có tốt không, có an toàn không?
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">8</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Cách chăm sóc răng sứ thẩm mỹ
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">9</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Răng sứ có tẩy trắng được không?
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">10</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Trồng răng sứ vĩnh viễn có đau không?
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">11</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Bọc răng sứ Cercon giá rẻ tại Hà Nội
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-1">12</div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Răng sứ Titan giá bao nhiêu tiền là hợp lý? 
                                        </a>
                                        <a class="reply" href="">
                                            trả lời
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item" data-hash="tinnhakhoa">
                        <div class="box scrollbar" id="style-2">
                            <div class="force-overflow">
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Thực hiện tiêm chủng Vaccine Covid -19, Nha khoa Quốc tế Việt Đức sẵn sàng tham gia cùng ngành Y tế chống dịch" src="https://static.nhakhoavietduc.com.vn/2021/07/31/21909985841356258532125105921772915875086182n.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Thực hiện tiêm chủng Vaccine Covid -19, Nha khoa Quốc tế Việt Đức sẵn sàng tham gia cùng ngành Y tế chống dịch
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Nụ cười dành tặng bố - Tìm lại nụ cười để hiểu nhau và hạnh phúc hơn" src="https://static.nhakhoavietduc.com.vn/2020/01/18/screenshot2.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Nụ cười dành tặng bố - Tìm lại nụ cười để hiểu nhau và hạnh phúc hơn
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Ts.Bs Mậu xúc động tri ân Người Thầy quá cố của mình Ts.Bs CKI Lê Văn Thạch - Nguyên Chủ nhiệm khoa RHM Bệnh viện 108 " src="https://static.nhakhoavietduc.com.vn/2020/01/17/c614b74ecf31376f6e20.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Ts.Bs Mậu xúc động tri ân Người Thầy quá cố của mình Ts.Bs CKI Lê Văn Thạch - Nguyên Chủ nhiệm khoa RHM Bệnh viện 108 
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Review tiệc tất niên 2019 - Công ty Cổ Phần y Dược Quốc tế Việt Đức " src="https://static.nhakhoavietduc.com.vn/2020/01/16/screenshot1.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Review tiệc tất niên 2019 - Công ty Cổ Phần y Dược Quốc tế Việt Đức 
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Đông đảo các nghệ sĩ khách mời đặc biệt tham dự chương trình tất niên - Year End Party 2019" src="https://static.nhakhoavietduc.com.vn/2020/01/15/screenshot8.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Đông đảo các nghệ sĩ khách mời đặc biệt tham dự chương trình tất niên - Year End Party 2019
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Công ty Cổ phần Y dược Quốc tế Việt Đức rộn ràng Tiệc tất niên " src="https://static.nhakhoavietduc.com.vn/2020/01/14/f5a0136.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Công ty Cổ phần Y dược Quốc tế Việt Đức rộn ràng Tiệc tất niên 
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Thư cảm ơn quý khách hàng - Đối tác của Công ty cổ phần Y dược quốc tế Việt Đức" src="https://static.nhakhoavietduc.com.vn/2020/01/14/f5a0063.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Thư cảm ơn quý khách hàng - Đối tác của Công ty cổ phần Y dược quốc tế Việt Đức
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="TS.BS Trịnh Đức Mậu – Đôi bàn tay tài hoa kiến tạo những nụ cười vàng" src="https://static.nhakhoavietduc.com.vn/2020/01/13/cream-and-mint-singles-awareness-day-quote-instagram-post.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            TS.BS Trịnh Đức Mậu – Đôi bàn tay tài hoa kiến tạo những nụ cười vàng
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Thông báo Chương trình Gala Tất niên 2019 - Chào Xuân Canh Tý 2020" src="https://static.nhakhoavietduc.com.vn/2020/01/10/8162072626426544158430022348170508916228096o.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Thông báo Chương trình Gala Tất niên 2019 - Chào Xuân Canh Tý 2020
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Niềng răng tạo cằm Vline: Mặt thon gọn cười tự tin " src="https://static.nhakhoavietduc.com.vn/2020/01/09/pink-and-slate-grey-photo-beauty-influencer-minimalism-facebook-post-set-1.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Niềng răng tạo cằm Vline: Mặt thon gọn cười tự tin 
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Tri ân 20.000 khách hàng mỗi năm tặng quà lên đến 20 triệu đồng" src="https://static.nhakhoavietduc.com.vn/2019/12/31/web-tri-an-01.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Tri ân 20.000 khách hàng mỗi năm tặng quà lên đến 20 triệu đồng
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                                <div class="box-item">
                                    <div class="box-item-11">
                                        <img alt="Thông báo nghỉ Tết dương lịch năm 2020" src="https://static.nhakhoavietduc.com.vn/2019/12/26/8053466826104036257347488434059650323709952o.jpg">
                                    </div>
                                    <div class="box-item-2">
                                        <a class="dec" href="">
                                            Thông báo nghỉ Tết dương lịch năm 2020
                                        </a>
                                        <a class="reply" href="">
                                            xem thêm
                                        </a>
                                        <a class="more" href="">&gt;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item" data-hash="cauhoi">
                        <div class="box scrollbar" id="style-1">
                            <div class="force-overflow">
                                <ul>
                                    <li>
                                        <a href="" title="Cảnh báo: Sâu 4 răng hàm nhưng chần chừ không điều trị sớm dẫn đến mất 14 răng hàm">
                                            Cảnh báo: Sâu 4 răng hàm nhưng chần chừ không điều trị sớm dẫn đến mất 14 răng hàm
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Chị chị em em nhà người ta rủ nhau đi làm răng và nhận được cái kết bất ngờ">
                                            Chị chị em em nhà người ta rủ nhau đi làm răng và nhận được cái kết bất ngờ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Cô nàng du học sinh Anh và hành trình tìm lại nụ cười tỏa nắng">
                                            Cô nàng du học sinh Anh và hành trình tìm lại nụ cười tỏa nắng
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Khánh Linh: Cô gái sau 24 năm mới nở nụ cười tự tin ">
                                            Khánh Linh: Cô gái sau 24 năm mới nở nụ cười tự tin 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="2 năm niềng răng là hoàn toàn xứng đáng với kết quả nhận được">
                                            2 năm niềng răng là hoàn toàn xứng đáng với kết quả nhận được
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Cùng Khoa – Hóa soái ca sau chỉnh nha tại Nha khoa Quốc tế Việt Đức ">
                                            Cùng Khoa – Hóa soái ca sau chỉnh nha tại Nha khoa Quốc tế Việt Đức 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Khách hàng Phương Linh: Niềng răng không đau như em nghĩ ">
                                            Khách hàng Phương Linh: Niềng răng không đau như em nghĩ 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Cô giáo dạy tiếng anh tự tin lựa chọn chỉnh nha mắc cài sứ">
                                            Cô giáo dạy tiếng anh tự tin lựa chọn chỉnh nha mắc cài sứ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Thùy Linh: Từ cô nàng lạnh lùng trở nên thân thiện tràn đầy năng lượng sau niềng răng Braces 6S">
                                            Thùy Linh: Từ cô nàng lạnh lùng trở nên thân thiện tràn đầy năng lượng sau niềng răng Braces 6S
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Cảm ơn bác sĩ từ lúc sinh ra hôm nay em mới cười xinh và tự tin thế này">
                                            Cảm ơn bác sĩ từ lúc sinh ra hôm nay em mới cười xinh và tự tin thế này
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Câu chuyện khách hàng: Chị Hiền Trang – Chỉnh nha giúp mình hoàn toàn tự tin ">
                                            Câu chuyện khách hàng: Chị Hiền Trang – Chỉnh nha giúp mình hoàn toàn tự tin 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Bạn gái từ Thái Nguyên lựa chọn niềng răng mắc cài sứ, sở hữu ngay nụ cười rạng rỡ">
                                            Bạn gái từ Thái Nguyên lựa chọn niềng răng mắc cài sứ, sở hữu ngay nụ cười rạng rỡ
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Xóa sổ biệt danh Linh vâu sở hữu ngay nụ cười tỏa nắng sau niềng răng Braces 6S">
                                            Xóa sổ biệt danh Linh vâu sở hữu ngay nụ cười tỏa nắng sau niềng răng Braces 6S
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Đừng ngại thay đổi bản thân để tự tin, khỏe mạnh hơn">
                                            Đừng ngại thay đổi bản thân để tự tin, khỏe mạnh hơn
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Nha khoa Quốc tế Việt Đức lựa chọn số 1 của gia đình doanh nhân Thúy Anh">
                                            Nha khoa Quốc tế Việt Đức lựa chọn số 1 của gia đình doanh nhân Thúy Anh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Khách hàng Trần Thu Hương “ lão hóa ngược” sau thẩm mỹ 20 răng sứ E.Max">
                                            Khách hàng Trần Thu Hương “ lão hóa ngược” sau thẩm mỹ 20 răng sứ E.Max
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Lý do nào khiến GS Nguyễn Tuấn Anh lựa chọn Nha khoa Quốc tế Việt Đức để thẩm mỹ nụ cười của mình? ">
                                            Lý do nào khiến GS Nguyễn Tuấn Anh lựa chọn Nha khoa Quốc tế Việt Đức để thẩm mỹ nụ cười của mình? 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Bác sĩ giải đáp: Niềng răng có hết móm không?  ">
                                            Bác sĩ giải đáp: Niềng răng có hết móm không?  
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Bọc 20 răng sứ Emax - Nụ cười mới trọn niềm vui">
                                            Bọc 20 răng sứ Emax - Nụ cười mới trọn niềm vui
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Khách hàng 45 tuổi niềng răng mắc cài – Tưởng không hiệu quả mà hiệu quả không tưởng">
                                            Khách hàng 45 tuổi niềng răng mắc cài – Tưởng không hiệu quả mà hiệu quả không tưởng
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Cô gái trẻ 30 năm không có răng tìm lại nụ cười mới nhờ trồng răng implant all on 4">
                                            Cô gái trẻ 30 năm không có răng tìm lại nụ cười mới nhờ trồng răng implant all on 4
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Tự tin cười rạng ngời nhờ lựa chọn Niềng răng Braces 6s ">
                                            Tự tin cười rạng ngời nhờ lựa chọn Niềng răng Braces 6s 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Lấy lại 10 năm thanh xuân với cấy răng Implant 5S">
                                            Lấy lại 10 năm thanh xuân với cấy răng Implant 5S
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" title="Đầu tư cho nụ cười – Tự tin trong cuộc sống">
                                            Đầu tư cho nụ cười – Tự tin trong cuộc sống
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="foot">
        <div class="foot__container container">
            <div class="footBox">
                <div class="footItemBrand">
                    <div class="footItemBrand-logo">
                        <a href="../index.php">
                            <picture>
                                <source media="(min-width:769px)" 
                                     srcset="../images/logo/icon-logo.png">
                                <img src="../images/logo/icon-logo.png">
                            </picture>
                        </a>
                    </div>
                    <div class="titi">
                        <h3>HỆ THỐNG CHĂM SÓC MẮT UY TÍN TẠI VIỆT NAM</h3>
                    </div>
                    <div class="footItemSocial">
                        <a class="boxtop__call-2" href="tel:">
                            088 876 78 68
                        </a>
                        <a class="footItemSocial-facebook" href="https://www.facebook.com/matsaigonphutho?mibextid=ZbWKwL&_rdc=2&_rdr" rel="nofollow" target="_blank"></a>
                    <a class="footItemSocial-youtube" href="https://www.youtube.com/@matsaigonphutho" rel="nofollow" target="_blank"></a>
                        <a class="footItemSocial-skype" href="" rel="nofollow" target="_blank"></a>
                    </div>
                    <div class="website">
                        <a href="" rel="nofollow" target="_blank">
                            <span>Website</span> https://benhvienmatsaigonphutho.com </a>
                        <a href="tel:">
                            <span>Bác sĩ tư vấn 24/7</span> 088 876 78 68 </a>
                    </div>
                </div>
                <div class="footBoxRight">
                    <div class="footBoxCity">
                        <div class="footItemCity">
                            <div class="footItemCity-name">
                                Đơn vị chủ quản
                            </div>
                            <div class="footItemCityContact">
                                <a class="footItemCityContact-add" href="" rel="nofollow" target="_blank">
                                    Đ. Nguyễn Tất Thành, P. Vân Cơ, TP. Việt Trì, Tỉnh Phú Thọ.
                            </a>
                            <a>
                                Điện thoại: 088 876 78 68
                            </a>
                            <a>
                                Hotline: 088 876 78 68
                            </a>
                            <a>
                                Email: pt.phongnhansu@saigoneyehospital.com
                            </a>
                            </div>
                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:;" id="to_top" style="display: block;"></a>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="../js/owl-sync.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>
    <script src="../js/jquery-modal-video.js"></script>
    <script src="../js/global.js"></script>
    <script src="../js/validate.js"></script>
    <script>
        validator({
            form: '#form-1',
            rules: [
                validator.isRequired("#fname", "Họ và tên không được bỏ trống!"),
                validator.isRequired("#fphone", "Số điện thoại không được bỏ trống!"),
                validator.phone("#fphone", "Số điện thoại không đúng định dạng"),
                validator.isEmail("#femail", "Email không đúng định dạng"),
                validator.isRequired("#femail", "Email không được bỏ trống!"),
            ]
        });
    </script>
</body>

</html>