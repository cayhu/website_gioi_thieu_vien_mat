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
    <title>BỆNH VIỆN MÁT SÀI GÒN PHÚ THỌ - Hệ Thống Chăm Sóc Mắt Uy Tín Tại Việt Nam</title>
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
                                Kiểm Tra Chẩn Đoán
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
                                                        <a href="../khiem-tra-chuan-doan/a.php" rel="nofollow" title="Tiểu phẫu - Thủ thuật">
                                                            Tiểu phẫu - Thủ thuật
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../khiem-tra-chuan-doan/Dan-su-Veneer.php" rel="nofollow" title="Khám mắt tổng quát">
                                                            Khám mắt tổng quát
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../khiem-tra-chuan-doan/Trong-rang-implant.php" rel="nofollow" title="Khám mắt chuyên sâu">
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
                                                        <a href="../bang-gia/Bang-gia-chinh-nha-nieng-rang.php"
                                                            rel="nofollow" title="Bảng giá Chỉnh nha - Niềng răng">
                                                            Bảng giá Chỉnh nha - Niềng răng
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../bang-gia/Bang-gia-boc-rang-su.php" rel="nofollow"
                                                            title="Bảng giá Bọc răng sứ">
                                                            Bảng giá Bọc răng sứ
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="../bang-gia/Bang-gia-cay-ghap-Implant.php"
                                                            rel="nofollow" title="Bảng giá Cấy ghép Implant">
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
                Nha khoa quốc tế Việt Đức - Hệ thống chuỗi nha khoa uy tín tại Việt Nam
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
                <a href="../khiem-tra-chuan-doan/a.php" target="_self">
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
                        <p>Tư vẫn phẫu thuật </p>
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
                    <h1 class="title-post">Bệnh Viện Mắt Sài Gòn Phú Thọ - Hệ thống chuỗi nha khoa uy tín tại Việt Nam</h1>
                    <section class="content loaded">
                        <div class="chi-tiet scroll_check">
                            <div class="post_info">
                                <div class="post_author pc">Tác giả: <a>admin</a> * Tham vấn y khoa: <a>Chuyên gia Về Mắt Quốc Tế Tại Bệnh Viện Mắt Sài Gòn Phú Thọ</a></div>
                                <div class="post_info_box">
                                    <p><i class="fa-solid fa-calendar"></i> 07/08/2023</p>
                                </div>
                            </div>
                            <div class="sapo">Đặc biệt trong năm 2023, Bệnh Viện Mắt Sài Gòn Phú Thọ  đã có cuộc cải tổ toàn diện từ cơ sở vật chất, trang thiết bị y tế đến quy trình khám và điều trị bệnh nhân. Mục tiêu hướng tới xây dựng phòng khám mắt tiêu chuẩn quốc tế tại khu vực miền Bắc và cả phía Nam.</div>
                            <div class="post_desc">
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Đặc biệt trong năm 2023, với sự đầu tư mạnh mẽ này. <span style="color: #3366ff;"><a style="color: #3366ff;" href="">Bệnh Viện Mắt Sài Gòn Phú Thọ</a></span>  cam kết nâng cao chất lượng dịch vụ, mang đến cho người bệnh trong nước và quốc tế những dịch vụ khám và điều trị mắt tốt nhất. Đội ngũ y bác sĩ được đào tạo bài bản, thiết bị y tế nhập khẩu từ các nước tiên tiến được trang bị đầy đủ để phục vụ nhu cầu chăm sóc sức khỏe mắt ngày một nâng cao của người dân</span>
                                </p>
                                <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><img src="https://static.nhakhoavietduc.com.vn/Nha%20khoa%20VD-%20Bai%20pr/Gi%23U1edbi-thi%23U1ec7u-c%23U00f4ng-ty.jpg" alt="nha-khoa-hien-dai" width="560" height="352"></span></p>
                                <p style="text-align: center;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;"><em>Hướng đến xây dựng Nha Khoa tiêu chuẩn&nbsp;cao&nbsp;</em></span></p>
                                <p style="text-align: center;"><br><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;"><img src="https://static.nhakhoavietduc.com.vn/Nha khoa VD- Bai pr/Gi%23U1edbi-thi%23U1ec7u-c%23U00f4ng-ty3.jpg" alt="hinh-anh-5-sao" width="560" height="362"></span></p>
                                <p style="text-align: center;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;"><em>Không gian sang trọng của Nha Khoa Quốc tế Việt Đức&nbsp;</em></span></p>
                                <h2 style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif; color: #008080;"><strong>I/ Trung tâm nha khoa thẩm mỹ 15 năm hoạt động và phát triển&nbsp;</strong></span></h2>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Nha khoa quốc tế Việt Đức thành lập từ năm 2005, được sáng lập bởi Tiến sĩ TS.BS.CKI Lê Văn Thạch - Nguyên Chủ Nhiệm Khoa Răng Hàm Mặt bệnh viện 108 và <a href=""><span style="color: #3366ff;">Tiến sĩ. Bác sĩ Trịnh Đức Mậu</span>,</a>&nbsp;tu
                                    nghiệp tại Pháp, Mỹ, Hàn Quốc và Ý, cùng sự hợp tác và chuyển giao công nghệ, quy trình từ Đức.</span>
                                </p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Hơn 15 năm phát triển, với sự đồng hành của hàng nghìn khách hàng và nỗ lực đội ngũ cán bộ y bác sĩ, nha khoa Quốc tế Việt Đức đã trở thành một trong những&nbsp;<strong>nha khoa uy tín tại Việt Nam</strong>&nbsp;và đạt được nhiều thành tích:</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Năm 2011: Đạt giải thưởng THƯƠNG HIỆU VÀNG THĂNG LONG do Thành phố Hà Nội trao tặng.</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Năm 2012: ThS.BS CKI Trịnh Đức Mậu vinh dự được vinh danh BÀN TAY VÀNG NHA KHOA và được tôn vinh cá nhân có thành tích xuất sắc trong SỰ NGHIỆP CHĂM SÓC, BẢO VỆ SỨC KHỎE CỘNG ĐỒNG NĂM 2012.</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Năm 2013: Đạt danh hiệu nha khoa có DỊCH VỤ TỐT CHO GIA ĐÌNH VÀ TRẺ EM</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Năm 2014: Đạt chứng nhận DỊCH VỤ NHA KHOA HOÀN HẢO do Tạp chí sở hữu Trí tuệ và Sáng tạo tổ chức. Đồng thời đạt TOP 10 PHÒNG KHÁM NHA KHOA UY TÍN TẠI VIỆT NAM và THƯƠNG HIỆU DANH TIẾNG ASEAN.</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Năm 2016: Vinh danh những Doanh nghiệp, Doanh nhân, Nhà quản lý có nhiều đóng góp cho Cộng đồng và Xã hội. Chủ tịch nước Trần Đại Quang khen ngợi và trao tặng kỉ niệm chương.</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Năm 2017: Nâng cấp hệ thống nha khoa hướng tới nha khoa tiêu chuẩn&nbsp;cao tại Miền Bắc</span></p>
                                <h2 style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif; color: #008080;"><strong>II/ Hướng tới xây dựng trung tâm Nha khoa tiêu chuẩn cao&nbsp;</strong></span></h2>
                                <p style="text-align: justify;"><span style="color: #ff6600; font-family: arial, helvetica, sans-serif; font-size: 14px;"><em>- Trang thiết bị, công nghệ hiện đại Châu Âu</em></span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Mục tiêu xây dựng Nha khoa theo tiêu chuẩn&nbsp;cao, hệ thống trang thiết bị tại <strong>Nha khoa Quốc tế Việt Đức</strong> được lựa chọn khắt khe và nhập khẩu trực tiếp từ Châu Âu. Việc vận hành và thử nghiệm công nghệ mới đều do các chuyên gia quốc tế đào tạo và hướng dẫn, đảm bảo quy trình thực hiện hiệu quả, an toàn và tăng thêm nhiều lợi ích cho khách hàng.</span></p>
                                <p style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 14px;">&nbsp;</span></p>
                                <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><img src="https://static.nhakhoavietduc.com.vn/Nha khoa VD- Bai pr/C%23U00f4ng-ngh%23U1ec7-hi%23U1ec7n-%23U0111%23U1ea1i3.jpg" alt="trang-thiet-bi-toi-tan" width="560" height="385"></span></p>
                                <p style="text-align: center;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;"><em>Trang thiết bị hiện đại</em></span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Nha khoa Quốc tế Việt Đức là một trong số ít <strong>nha khoa uy tín tại Việt Nam</strong>, được các chuyên gia hàng đầu thế giới lựa chọn chuyển giao công nghệ mới, tân tiến từ Châu Âu. Chuỗi công nghệ bao gồm:</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Hệ thống ghế nha khoa All - in - one Anthos L9, tích hợp các công nghệ nha khoa hiện đại hiện nay;</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Công nghệ thiết kế nụ cười Digital Smile Design, mang tới nụ cười tự nhiên, phù hợp và đẹp toàn diện</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Máy chụp và phân tích hình ảnh 3 chiều Cone Beam CT 3 trong 1, bước tiến chuẩn đoán hình ảnh</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Hệ thống kiểm soát cơn đau - Painless Systerm</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">- Hệ thống siêu vô trùng không khí Extra As....</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Hệ thống trang thiết bị, phòng thực hiện đều được vô trùng nghiêm ngặt theo tiêu chuẩn của Bộ y tế. Hệ thống vô trùng không khí Extra, lò hấp vô trùng lập trình tự động Auto Clave, tủ bảo quản vô trùng dụng cụ Pro tránh tia cực tím…</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Mỗi khách hàng sử dụng 01 bộ dụng cụ đã được khử trùng, đảm bảo vô khuẩn tối đa và hạn chế tình trạng lây nhiễm chéo trong nha khoa. Khử trùng nguồn nước sử dụng, theo tiêu chuẩn Châu Âu EN 1717.</span></p>
                                <p style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 14px;">&nbsp;</span></p>
                                <p style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 14px;">&nbsp;</span></p>
                                <p style="text-align: center;"><span style="font-family: arial, helvetica, sans-serif; font-size: 13px;"><img src="https://static.nhakhoavietduc.com.vn/Nha khoa VD- Bai pr/C%23U00f4ng-ngh%23U1ec7-hi%23U1ec7n-%23U0111%23U1ea1i5.jpg" alt="" width="560" height="385"></span></p>
                                <p style="text-align: center;"><span style="font-family: arial, helvetica, sans-serif; font-size: 14px;"><em>Hệ thống vô trùng không khí EXTRA AS</em></span></p>
                                <p style="text-align: justify;"><span style="color: #3366ff; font-size: 14px;"><em><strong><span style="font-family: arial, helvetica, sans-serif;">=&gt; Xem thêm: <a style="color: #3366ff;" href=""> Hệ thống cơ sở vật chất hiện đại, tiêu chuẩn quốc tế</a></span></strong>
                                    </em>
                                    </span>
                                </p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif; color: #ff6600;"><strong>-</strong><em> Đội ngũ bác sĩ 15 năm kinh nghiệm, tu nghiệp tại Pháp, Mỹ, Ý và Hàn Quốc</em></span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Khách hàng thực hiện dịch vụ tại <strong>Nha khoa Quốc tế Việt Đức</strong>, sẽ được hỗ trợ bởi các bác sĩ tốt nghiệp tại các trường đại học danh tiếng, như: đại học Răng Hàm Mặt, đại học Y Hà Nội..., Đội ngũ y bác sĩ luôn không ngừng nâng cao tay nghề của mình thông qua các khóa đào tạo, tu nghiệp chuyên sâu tại nước ngoài, như: Mỹ, Pháp, Thụy Sỹ, Hàn Quốc…có trên 15 năm kinh nghiệm.</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Đặc biệt, các bác sĩ tại nha khoa Việt Đức được chuyên môn hoá, chuyên sâu theo từng lĩnh vực như nha khoa tổng thể, chỉnh nha, răng sứ thẩm mỹ, Implant… giúp phục vụ khách hàng tốt nhất.</span></p>
                                <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;">&nbsp;<img src="https://static.nhakhoavietduc.com.vn/Nha khoa VD- Bai pr/Gi%23U1edbi-thi%23U1ec7u-c%23U00f4ng-ty7.jpg" alt="" width="650" height="401"></span></p>
                                <p><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="font-size: 14px;">&nbsp; &nbsp;Bác sĩ Mậu đang khám cho bệnh nhân&nbsp;</span></em>
                                    </span>
                                </p>
                                <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><img src="https://static.nhakhoavietduc.com.vn/Nha khoa VD- Bai pr/Gi%23U1edbi-thi%23U1ec7u-c%23U00f4ng-ty4.jpg" alt="chinh-hinh-rang" width="560" height="346"></span></p>
                                <p style="text-align: center;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;"><em>Bác sĩ đang chỉnh hình răng cho bênh nhân</em></span></p>
                                <p style="text-align: left;"><span style="color: #3366ff;"><em><strong><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">=&gt; Xem thêm: <a style="color: #3366ff;" href="">Đội ngũ y bác sỹ trên 15 năm kinh nghiệm</a></span></strong>
                                    </em>
                                    </span>
                                </p>
                                <p style="text-align: justify;"><span style="color: #ff6600; font-family: arial, helvetica, sans-serif; font-size: 14px;"><em>- Chính sách chăm sóc khách hàng trọn đời</em></span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Hệ thống chăm sóc khách hàng chuyên nghiệp, số hoá tất cả thông tin dữ liệu của khách hàng, giúp khách hàng nắm được tình trạng bệnh nhanh chóng và chuyên nghiệp.</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Đội ngũ chăm sóc khách hàng hỗ trợ 24/7 và chế độ chăm sóc và chính sách bảo hành trọn đời mang đến sự yên tâm và hài long cho khách hàng.</span></p>
                                <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><img src="https://static.nhakhoavietduc.com.vn/Nha khoa VD- Bai pr/Gi%23U1edbi-thi%23U1ec7u-c%23U00f4ng-ty8.jpg" alt="le-tan-nhiet-tinh" width="560" height="345"></span></p>
                                <p style="text-align: center;"><span style="font-family: arial, helvetica, sans-serif; font-size: 13px;"><em>&nbsp;<span style="font-size: 14px;">Đội ngũ lễ tân nhiệt tình, chuyên nghiệp</span></em>
                                    </span>
                                </p>
                                <h2 style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif; color: #008080;"><strong>III/ Nha khoa phát triển đồng thời răng hàm mặt và thẩm mỹ</strong></span></h2>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Đây là một điểm mạnh khác của Nha khoa Quốc tế Việt Đức với những nha khoa khác, được khách hàng và giới chuyên gia đánh giá là một trong những <strong>nha khoa chất lượng cao</strong> tại Việt Nam.&nbsp; Sự kết hợp giữa nha khoa và thẩm mỹ không chỉ&nbsp; mang đến cho khách hàng hàm răng chắc khỏe, và còn kiến tạo nụ cười đẹp phù hợp với từng khuôn mặt thông qua tác động điều chỉnh cung hàm, đưa khuôn mặt về tỉ lệ chuẩn, cân đối.</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Nha khoa quốc tế Việt Đức đã thiết kế và kiến tạo thành công hơn 30.000 nụ cười qua các dịch vụ: Niềng răng tạo cằm Vline- Đẹp bền vững, không phải phẫu thuật; Bọc răng sứ công nghệ Nano Ceramic- Tạo nụ cười tự nhiên, không xâm lấn, không đau…</span></p>
                                <p style="text-align: center;"><span style="font-family: arial, helvetica, sans-serif; font-size: 13px;"><img src="https://static.nhakhoavietduc.com.vn/Nha khoa VD- Bai pr/Gi%23U1edbi-thi%23U1ec7u-c%23U00f4ng-ty6.jpg" alt="" width="650" height="402"></span></p>
                                <p style="text-align: center;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;"><em>Khách hàng hài lòng khi sử dụng dịch vụ của Việt Đức</em></span></p>
                                <h2 style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif; color: #008080;"><strong>IV/ Nha khoa của chính trị gia, người nổi tiếng, MC và 30.000 khách hàng&nbsp;</strong></span></h2>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Sau hơn 12 năm thành lập, nha khoa Quốc tế Việt Đức hiện đang là lựa chọn của hơn 30.000 khách hàng, trong đó có đến 5.000 ca cấy ghép Implant, hơn 12.000 ca chỉnh nha và phục hình răng sứ thẩm mỹ.</span></p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;"><strong>Trung tâm Nha khoa Quốc tế Việt Đức</strong> cũng là điểm đến quen thuộc của nhiều chính trị gia, MC, diễn viên, người nổi tiếng Việt Nam như nhà văn Chu Lai, Thiếu tướng Trần Thùy, Ca sĩ Bích Phương, MC Vân Hugo, MC Hoàng Dương, Nghệ sĩ cải lương Xuân Hoa…</span></p>
                                <p style="text-align: center;"><span style="font-size: 13px; font-family: arial, helvetica, sans-serif;"><iframe src="https://www.youtube.com/embed/1PMmv-0Q8Aw" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></span></p>
                                <p style="text-align: center;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;"><em>Nha Khoa Quốc Tế Việt Đức 15 năm thành lập và phát triển</em></span></p>
                                <p style="text-align: left;"><span style="color: #3366ff;"><em><span style="font-family: arial, helvetica, sans-serif; font-size: 13px;"><strong>=&gt; Xem thêm: <a style="color: #3366ff;" href="">Quang Hải - Hùng Dũng tin tưởng lựa chọn dịch vụ nhổ răng số 8 tại Nha khoa Quốc tế Việt Đức</a></strong></span></em>
                                    </span>
                                </p>
                                <p style="text-align: justify;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;">Nha khoa Quốc tế Việt Đức đang ngày càng hoàn thiện đồng bộ cả về con người, trang thiết bị và cơ sở vật chất, hướng tới <strong>nha khoa tiêu chuẩn&nbsp;cao</strong>. Nếu bạn đang gặp bất kì vấn đề răng miệng nào, hãy nhanh tay gọi đến <strong><span style="color: #ff0000;">hotline 1900 6465</span></strong>
                                    hoặc đăng ký theo form bên dưới để nhận tư vấn miễn phí từ đội ngũ bác sỹ hàng đầu tại nha khoa.&nbsp;</span>
                                </p>
                                <p style="text-align: center;"><span style="font-size: 14px; font-family: arial, helvetica, sans-serif;"><img src="https://static.nhakhoavietduc.com.vn/dat-lich%20%282%29.jpg" alt="" width="551" height="224"></span></p>
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