
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách truyện</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<!-- Danh sách truyện -->
<?php
$query = "SELECT * FROM truyen";
$result = mysqli_query($conn, $query);

if (!$result) {
die("Lỗi truy vấn: " . mysqli_error($conn));
}

echo '<h5>Danh sách truyện</h5>';
?>

<table class="table">
    <tr>
        <th>Tên truyện</th>
        <th>Tác giả</th>
        <th>Số Chương</th>
        <th>Thêm Chương</th>
        <th>Folder</th>
        <th>Thao tác</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['tenTruyen']; ?></td>
        <td><?php echo $row['tacgia']; ?></td>
        <td>
            <?php
            $truyen_id = $row['truyen_id'];
            $sql = "SELECT MAX(soThuTu) AS so_chuong_moi FROM chapter WHERE truyen_id = '$truyen_id'";
            $result_chapter = mysqli_query($conn, $sql);
            $row_chapter = mysqli_fetch_assoc($result_chapter);
            $so_chuong_moi = $row_chapter['so_chuong_moi'];
            echo $so_chuong_moi !== null ? $so_chuong_moi : $row['so_chuong'];
            ?>
        </td>
        <td><a href="capnhap_sochuong.php?truyen_id=<?php echo $row['truyen_id']; ?>">Thêm chương</a></td>
        <td><?php echo $row['folder']; ?></td>
        <td>
            <a href="edit_truyen.php?truyen_id=<?php echo $row['truyen_id']; ?>">Sửa</a>
            <a href="delete_truyen.php?truyen_id=<?php echo $row['truyen_id']; ?>"
                onclick="return confirm('Bạn có chắc chắn muốn xóa truyện này?')">Xóa</a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>