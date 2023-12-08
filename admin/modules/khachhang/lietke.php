<?php
// phân trang
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
if (isset($_GET['trang'])) {
  $page = $_GET['trang'];
} else {
  $page = '';
}
if ($page == '' || $page == 1) {
  $begin = 0;
} else {
  $begin = ($page * 20) - 20;
}
?>
<?php

$sql_lietke_ph = "SELECT * FROM feedback ORDER BY feedback.id_feedback DESC LIMIT $begin,20";
$query_lietke_ph = mysqli_query($mysqli, $sql_lietke_ph);
?>
<div class="row" style="margin-top: 20px;">
  <div class="col-md-12 table-responsive">
    <h3 class="the_h">Phản hồi & Liên hệ</h3>
    <table class="table table-bordered table-hover" style="margin-top: 20px;">
      <thead>
        <tr style="text-align: center;">
          <th>STT</th>
          <th>Tên khách hàng</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th>Nội dung</th>
          <th>Thời gian</th>
          <th>Tình trạng</th>
          <th>Thao tác</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_ph)) {
          $i++;
        ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tennguoidung'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['dienthoai'] ?></td>

            <td><?php echo $row['noidung'] ?></td>
            <td><?php echo $row['time_lh'] ?></td>
            <td><?php
                if ($row['status_lh'] == 1) {
                  echo '<a href="modules/khachhang/xuly.php?code=' . $row['id_feedback'] . '"><button  class="btn btn-warning">Chưa xem</button></a>';
                } else {
                  echo '<button  class="btn btn-secondary">Đã xem</button>';
                }
                ?></td>
            <td class="text-center">
              <a href="modules/khachhang/xuly.php?delete=' <?php echo $row['id_feedback']?> '"><button  class="btn btn-danger">Xóa</button></a>
            </td>
          </tr>
        <?php
        }
        ?>
        </tr>
      </thead>
    </table>
    <?php
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM feedback");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count / 20);
    ?>
    <nav style="  width: 0%; margin: auto;margin-top: 70px;" aria-label="Page navigation example">
      <ul class="pagination">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        <?php
        // phân trang
        for ($i = 1; $i <= $trang; $i++) {
        ?>
          <span class="page-item"><a class="page-link" <?php if ($i == $page) {
                                                          echo 'style="background: #bfbfbf;"';
                                                        } else {
                                                          echo '';
                                                        } ?> href="index.php?action=quanlyphanhoi&query=lietke&trang=<?php echo $i ?>"><?php echo $i ?></a></span>
        <?php
        }
        ?>
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>