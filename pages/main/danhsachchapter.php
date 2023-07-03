<?php
// Lấy truyện_id từ URL hoặc từ các biến khác tương ứng
if (isset($_GET['truyen_id'])) {
    $truyenId = $_GET['truyen_id'];
}

// Truy vấn để lấy danh sách chapter từ bảng chapter
$sql = "SELECT * FROM chapter WHERE truyen_id = $truyenId GROUP BY soThuTu";
$result = $conn->query($sql);
?>

<table class="table">
    <tr>
        <td><h5>Chương</h5></td>
        <td><h5>tên chapter</h5></td>
        <td><h5>Ngày Đăng</h5></td>
    </tr>
<?php
if ($result->num_rows > 0) {
    // Hiển thị danh sách chapter
    while ($row = $result->fetch_assoc()) {
        $chapterId = $row['chapter_id'];
        $tenChapter = $row['tenChapter'];
        $soThuTu = $row['soThuTu'];
        $ngayDang = $row['NgayDang'];
    ?>
    <!-- Hiển thị thông tin chapter -->
    <tr>
        <td><a href='index.php?quanly=doctruyen&id=<?php echo $chapterId?>'>Chương <?php echo $soThuTu;?></a></td>
        <td><?php echo $tenChapter?></td>
        <td><?php echo $ngayDang?></td>
    </tr>
    <?php
    }
    ?>
    </table>
<?php
} else {
    echo "Không tìm thấy chapter.";
}
?>