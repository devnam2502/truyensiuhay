<div class="DanhSachTheoDoi">
  <h3>Danh sách theo dõi</h3>
</div>
<table style="width:100%;text-align: center;border-collapse: collapse;" border="2">
  <tr>
    <th>Tên truyện</th>
    <th>Tác giả</th>
    <th>Thể loại</th>
    <th>Số Chương</th>
    <th>Ngày Đăng</th>
    <th>Sửa</th>
  </tr>
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

  $sql = "SELECT t.truyen_id, t.tenTruyen, t.tacgia, COUNT(DISTINCT c.chapter_id) AS so_chuong, MAX(c.NgayDang) AS NgayDang, GROUP_CONCAT(DISTINCT tl.tenTheLoai SEPARATOR ', ') AS danh_sach_the_loai
        FROM truyen t
        INNER JOIN chapter c ON t.truyen_id = c.truyen_id
        INNER JOIN truyen_theloai tt ON t.truyen_id = tt.truyen_id
        INNER JOIN theloai tl ON tt.theloai_id = tl.theloai_id
        INNER JOIN theodoi td ON t.truyen_id = td.truyen_id
        WHERE td.user_id = $_SESSION[user_id]
        GROUP BY t.truyen_id";
  $result = $conn->query($sql);
  if (!$result) {
    die('Error: ' . $conn->error);
  }

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
        <td>
          <form action="index.php?quanly=huytheodoi" method="post">
            <input type="hidden" name="truyen_id" value="<?php echo $row['truyen_id'] ?>">
            <button type="submit">Hủy theo dõi</button>
          </form>
        </td>
      </tr>
    <?php
    }
  } else {
    echo "<tr><td colspan='6'>Không có dữ liệu theo dõi.</td></tr>";
  }
  ?>
</table>

<style>
      .DanhSachTheoDoi {
        display: flex;
        justify-content: center;
        background-color: lightgreen;
        border-top: 2px solid black;
        border-left: 2px solid black;
        border-right: 2px solid black;
        margin-top: -4px;
      }
    </style>