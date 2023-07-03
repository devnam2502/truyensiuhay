<?php
include("config.php");

// Truy vấn lấy thông tin từ bảng theloai
$theloaiQuery = "SELECT * FROM theloai";
$theloaiResult = mysqli_query($conn, $theloaiQuery);

// Truy vấn lấy thông tin từ bảng truyen
$truyenQuery = "SELECT * FROM truyen";
$truyenResult = mysqli_query($conn, $truyenQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trang quản lý truyện</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Thêm thể loại
            $(".add_the_loai_btn").click(function() {
                var html = '<div><select name="the_loai[]"><option value="">Chọn thể loại</option><?php while ($row = mysqli_fetch_assoc($theloaiResult)) { echo "<option value=\'" . $row['theloai_id'] . "\'>" . $row['tenTheloai'] . "</option>"; } ?></select><button type="button" class="remove_the_loai_btn">Xóa</button></div>';
                $("#the_loai_wrapper").append(html);
            });

            // Xóa thể loại
            $(document).on("click", ".remove_the_loai_btn", function() {
                $(this).parent().remove();
            });
        });
    </script>
</head>
<body>
    <div class="container-fluid border">
        <div class="row justify-content-center">
            <div class="col">
                <!-- Form thêm truyện mới -->
                <h2>Thêm truyện mới</h2>
                    <!-- Các trường nhập thông tin truyện -->
                    <form class="addTruyen" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off">
                    <table class="table">
                        <tr>
                            <td><label for="tenTruyen">Tên truyện:</label></td>
                            <td><input type="text" name="tenTruyen" required></td>
                        </tr>
                        <tr>
                            <td><label for="tacgia">Tác giả:</label></td>
                            <td><input type="text" name="tacgia" ></td>
                        </tr>  
                        <tr> 
                            <td><label for="anhbia">Ảnh bìa:</label></td>
                            <td><textarea name="anhbia" rows="2" placeholder="viết đúng định dạng folder\\file.abc"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="folder">Thư mục:</label></td>
                            <td><textarea name="folder" rows="2" placeholder="viết đúng định dạng folder\\file.abc"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="noidung">Nội dung:</label></td>
                            <td><textarea name="noidung" rows="4"></textarea></td>
                        </tr>
                            <td><label for="ngayDang">Ngày đăng:</label></td>
                            <td><input type="date" name="ngayDang"></td>
                        </tr>
                    <!-- Các dòng chọn thể loại -->
                        <tr>
                            <td><div id="the_loai_wrapper">
                                <div>
                                    <select name="the_loai[]">
                                        <option value="">Chọn thể loại</option>
                                        <?php while ($row = mysqli_fetch_assoc($theloaiResult)) { ?>
                                            <option value="<?php echo $row['theloai_id']; ?>"><?php echo $row['tenTheloai']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <button type="button" class="remove_the_loai_btn">Xóa</button>
                                </div>
                            </div></td>                        
                            <!-- Nút thêm thể loại -->
                            <td><button type="button" class="add_the_loai_btn">Thêm thể loại</button><td>
                        </tr>                   
                        <tr>                   
                            <td><input type="submit" name="add_truyen" value="Thêm truyện"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <?php
    // Xử lý thêm truyện mới
    if (isset($_POST['add_truyen'])) {
        // Lấy thông tin từ các trường nhập liệu và thực hiện truy vấn INSERT
        // ...
    }
    ?>
</body>
</html>


<?php
// Xử lý thêm truyện mới
if (isset($_POST['add_truyen'])) {
    $tenTruyen = $_POST['tenTruyen'];
    $noidung = $_POST['noidung'];
    $tacgia = $_POST['tacgia'];
    $anhbia = $_POST['anhbia'];
    $folder = $_POST['folder'];
    $ngayDang = $_POST['ngayDang'];

    // Thực hiện truy vấn INSERT vào bảng "truyen"
    $query = "INSERT INTO truyen (tenTruyen, noidung, tacgia, anhbia, folder, NgayDang)
              VALUES ('$tenTruyen', '$noidung', '$tacgia', '$anhbia', '$folder', '$ngayDang')";
    mysqli_query($conn, $query);

    // Lấy truyen_id vừa được INSERT
    $truyenId = mysqli_insert_id($conn);

    // Lưu thông tin thể loại vào bảng "truyen_theloai"
    if (isset($_POST['the_loai'])) {
        $theLoaiIds = $_POST['the_loai'];
        foreach ($theLoaiIds as $theLoaiId) {
            // Thực hiện truy vấn INSERT vào bảng "truyen_theloai"
            $query = "INSERT INTO truyen_theloai (truyen_id, theloai_id) VALUES ('$truyenId', '$theLoaiId')";
            mysqli_query($conn, $query);
        } 
    } else {
        echo 'Thêm thành công';
        exit();
    }

}
?>
</body>
</html>

<style>
 .col {
    border: 1px solid black;
 }
</style>