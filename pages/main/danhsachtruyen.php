<div class="DanhSachTruyen">
  <h3>Danh sách truyện</h3>
</div>
<tr>
  <?php
  // Số truyện hiển thị trên mỗi trang
  $truyenPerPage = 24;

  // Xác định trang hiện tại
  if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
  } else {
    $currentPage = 1;
  }

  // Tính vị trí bắt đầu lấy dữ liệu
  $start = ($currentPage - 1) * $truyenPerPage;

  $sql = "SELECT t.truyen_id, t.tenTruyen, t.tacgia, t.so_chuong, t.NgayDang, GROUP_CONCAT(tl.tenTheLoai SEPARATOR ', ') AS danh_sach_the_loai
        FROM truyen t
        JOIN truyen_theloai tt ON t.truyen_id = tt.truyen_id
        JOIN theloai tl ON tt.theloai_id = tl.theloai_id
        GROUP BY t.truyen_id";
  $result = $conn->query($sql);
  if (!$result) {
    die('Error: ' . $conn->error);
  }
  ?>
  <table style="width:100%;text-align: center;border-collapse: collapse;" border="2">
    <tr>
      <th>Tên truyện</th>
      <th>Tác giả</th>
      <th>Thể loại</th>
      <th>Số Chương</th>
      <th>Ngày đăng</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td> <a href="index.php?quanly=truyen&id=<?php echo $row['truyen_id'] ?>"> <?php echo $row['tenTruyen'] ?></td>
          <td>
            <?php echo $row['tacgia'] ?>
          </td>
          <td>
            <?php echo $row['danh_sach_the_loai'] ?>
          </td>
          <td>
            <?php echo $row['so_chuong'] ?>
          </td>
          <td>
            <?php echo $row['NgayDang'] ?>
          </td>
        </tr>
      <?php
      }
    }
    ?>
  </table>
  <div class="space"></div>

    <style>
      .DanhSachTruyen {
        display: flex;
        justify-content: center;
        background-color: lightgreen;
        border-top: 2px solid black;
        border-left: 2px solid black;
        border-right: 2px solid black;
        margin-top: -4px;
      }
      .space {
        height: 30px;
      }
    </style>