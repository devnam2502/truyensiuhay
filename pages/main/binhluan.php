<?php
// Kiểm tra nếu form gửi bình luận được submit
if (isset($_POST['submit'])) {
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (isset($_SESSION['user_id'])) {
        // Lấy dữ liệu từ form
        $userId = $_SESSION['user_id'];
        $truyenId = $_SESSION['truyen_id'];
        $noidung = $_POST['noidung'];
        $ngayDang = date('Y-m-d');

        // Thực hiện truy vấn để thêm bình luận vào cơ sở dữ liệu
        $sql = "INSERT INTO binhluan (truyen_id, user_id, noidung, NgayDang) 
                VALUES ('$truyenId', '$userId', '$noidung', '$ngayDang')";
        $conn->query($sql);
    }
}

// Lấy danh sách bình luận từ cơ sở dữ liệu
$truyenId = $_SESSION['truyen_id'];
$sql = "SELECT users.tentaikhoan, binhluan.noidung, binhluan.NgayDang
        FROM binhluan
        INNER JOIN users ON binhluan.user_id = users.id_users
        WHERE binhluan.truyen_id = '$truyenId'
        ORDER BY binhluan.NgayDang DESC";
$result = $conn->query($sql);
if (!$result) {
    echo "Lỗi truy vấn: " . $conn->error;
}
?>

<div class="container-fluid">
    <div class="boxbl">
    <h4>Danh sách bình luận</h4>
    <hr color=red size=2px>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Người dùng</th>
                <th>Nội dung bình luận</th>
                <th>Ngày đăng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['tentaikhoan'] . "</td>";
                    echo "<td>" . $row['noidung'] . "</td>";
                    echo "<td>" . $row['NgayDang'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Không có bình luận nào.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <hr color=red size=2px>
    <?php
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (isset($_SESSION['user_id'])) {
        // Hiển thị form viết bình luận
        ?>
        <h4>Viết bình luận</h4>
        <form method="POST" action="index.php?quanly=truyen&id=<?php echo $_SESSION['truyen_id']; ?>">
            <div class="form-group">
                <label for="noidung">Nội dung:</label>
                <textarea class="form-control" id="noidung" name="noidung" rows="3"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Gửi bình luận</button>
        </form>
        <?php
    } else {
        // Hiển thị thông báo đăng nhập
        echo "<p>Đăng nhập để viết bình luận</p>";
    } 
    ?>
    </div>
</div>

<style>
.boxbl {
    width: 100%;
    border: 1px solid red;
}

</style>