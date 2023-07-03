<?php
include("config.php");

// Kiểm tra xem truyen_id đã được truyền qua URL hay chưa
if (isset($_GET['truyen_id'])) {
    // Lấy truyen_id từ URL
    $truyenId = $_GET['truyen_id'];

    // Lấy thông tin truyện từ cơ sở dữ liệu
    $query = "SELECT * FROM truyen WHERE truyen_id = '$truyenId'";
    $result = mysqli_query($conn, $query);
    $truyen = mysqli_fetch_assoc($result);

    // Lấy danh sách thể loại từ cơ sở dữ liệu
    $query = "SELECT * FROM theloai";
    $result = mysqli_query($conn, $query);
    $theloaiList = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Lấy danh sách thể loại của truyện từ bảng truyen_theloai
    $query = "SELECT * FROM truyen_theloai WHERE truyen_id = '$truyenId'";
    $result = mysqli_query($conn, $query);
    $truyen_theloai = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Kiểm tra xem người dùng đã nhấn nút "Lưu" hay chưa
    if (isset($_POST['save'])) {
        // Lấy thông tin truyện được chỉnh sửa từ form
        $tenTruyen = $_POST['tenTruyen'];
        $tacgia = $_POST['tacgia'];
        $noidung = $_POST['noidung'];

        // Cập nhật thông tin truyện trong cơ sở dữ liệu
        $query = "UPDATE truyen SET tenTruyen = ?, tacgia = ?, noidung = ? WHERE truyen_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssi", $tenTruyen, $tacgia, $noidung, $truyenId);
        mysqli_stmt_execute($stmt);

        // Xóa danh sách thể loại hiện tại của truyện trong bảng truyen_theloai
        $query = "DELETE FROM truyen_theloai WHERE truyen_id = '$truyenId'";
        mysqli_query($conn, $query);

        // Lấy danh sách thể loại được chọn từ form
        $theLoaiIds = $_POST['the_loai'];

        // Thêm các bản ghi mới vào bảng truyen_theloai
        foreach ($theLoaiIds as $theLoaiId) {
            $query = "INSERT INTO truyen_theloai (truyen_id, theloai_id) VALUES ('$truyenId', '$theLoaiId')";
            mysqli_query($conn, $query);
        }

        echo '<p>Thành công</p> <br>';
        echo '<a href="admin.php"> nhấn để về trang quản lý </a>';
        exit();
    }
} else {
    echo 'Thất bại';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Sửa Truyện</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Thêm thể loại đã chọn vào danh sách thể loại
            $("#add_the_loai").click(function() {
                var theLoaiId = $("#theloai").val();
                var theLoaiText = $("#theloai option:selected").text();

                // Kiểm tra xem thể loại đã được chọn hay chưa
                if (theLoaiId !== "") {
                    $("#the_loai_list").append("<li>" + theLoaiText + "<input type='hidden' name='the_loai[]' value='" + theLoaiId + "'></li>");
                }
            });
        });
    </script>
</head>
<body>
    <h1>Form Sửa Truyện</h1>

    <?php if (isset($truyen)): ?>
        <form method="POST" action="">
            <label for="tenTruyen">Tên truyện:</label>
            <input type="text" id="tenTruyen" name="tenTruyen" value="<?php echo $truyen['tenTruyen']; ?>"><br><br>

            <label for="tacgia">Tác giả:</label>
            <input type="text" id="tacgia" name="tacgia" value="<?php echo $truyen['tacgia']; ?>"><br><br>

            <label for="noidung">Nội dung:</label><br>
            <textarea id="noidung" name="noidung" rows="5" cols="50"><?php echo $truyen['noidung']; ?></textarea><br><br>

            <label for="theloai">Thể loại:</label>
            <select id="theloai">
                <option value="">Chọn thể loại</option>
                <?php foreach ($theloaiList as $theloai): ?>
                    <option value="<?php echo $theloai['theloai_id']; ?>"><?php echo $theloai['tenTheloai']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="button" id="add_the_loai">Thêm thể loại</button><br><br>

            <label>Danh sách thể loại:</label>
            <ul id="the_loai_list">
                <?php foreach ($truyen_theloai as $item): ?>
                    <?php $theloaiId = $item['theloai_id']; ?>
                    <li><?php echo $theloaiList[$theloaiId - 1]['tenTheloai']; ?><input type='hidden' name='the_loai[]' value='<?php echo $theloaiId; ?>'></li>
                <?php endforeach; ?>
            </ul><br><br>

            <input type="submit" name="save" value="Lưu">
        </form>
    <?php endif; ?>
</body>
</html>
