<?php

$sql_theloai = "SELECT * FROM theloai ORDER BY theloai_id DESC";
$query_theloai = mysqli_query($conn, $sql_theloai);



if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
  unset($_SESSION['dangky']);
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 100%">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?quanly=danhsachtruyen">Danh sách truyện</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="index.php?quanly=lienhe">Liên hệ</a></li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-expanded="false">
          Thể Loại
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <table class="table-reponsive" name="listTheloai">
            <?php
            $sql = "SELECT theloai_id, tenTheloai FROM theloai";
            $result = $conn->query($sql);
            $count = 0;

            if ($result->num_rows > 0) {
              $count = 0;
              // Hiển thị danh sách thể loại
              while ($row = $result->fetch_assoc()) {
                if ($count % 8 == 0) {
                  echo '<tr>';
                }
                echo '<td><a href="index.php?quanly=theloai&id=' . $row["theloai_id"] . '">' . $row["tenTheloai"] . '</a></td>';
                $count++;
                if ($count % 8 == 0) {
                  echo '</tr>';
                }
              }
              // Nếu số thể loại không chia hết cho 8, đóng hàng cuối cùng
              if ($count % 8 != 0) {
                echo '</tr>';
              }
            } else {
              echo "<tr><td colspan='1'>Không có thể loại nào.</td></tr>";
            }
            ?>
          </table>
        </div>
      </li>

      <?php
      if (isset($_SESSION['dangky'])) {

        ?>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangxuat">Đăng xuất</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=danhsachtheodoi">Danh sách theo dõi</a></li>
        <?php
      } else {
        ?>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangky">Đăng ký</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangnhap">Đăng Nhập</a></li>
        <?php
      }
      ?>


    </ul>
    <form class="form-inline my-2 my-lg-0" action="index.php?quanly=timkiem" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Nhập tên truyện..." name="tukhoa"
        aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="timkiem" type="submit">Tìm kiếm</button>
    </form>
  </div>
</nav>


<style>
  table[name="listTheloai"] {
    background-color: gray;
    border: 2px solid black;
  }

  table[name="listTheloai"] td,
  tr {
    border: none;
    padding: 6px;
  }

  table[name="listTheloai"] a {
    color: white;
    text-decoration: none;
  }

  table[name="listTheloai"] a:hover {
    color: lightskyblue;
  }
</style>