<?php
include("config.php");

// Kiểm tra xem truyen_id đã được truyền qua URL hay chưa
if (isset($_GET['truyen_id'])) {
    // Lấy truyen_id từ URL
    $truyenId = $_GET['truyen_id'];

    mysqli_begin_transaction($conn);

    try {
        // Thực hiện truy vấn DELETE để xóa bản ghi trong bảng "truyen"
        $query = "DELETE FROM truyen WHERE truyen_id = '$truyenId'";
        mysqli_query($conn, $query);

        // Thực hiện truy vấn DELETE để xóa bản ghi trong bảng "truyen_theloai"
        $query = "DELETE FROM truyen_theloai WHERE truyen_id = '$truyenId'";
        mysqli_query($conn, $query);

        // Commit giao dịch nếu không có lỗi
        mysqli_commit($conn);

        // Chuyển hướng về trang admin.php hoặc hiển thị thông báo thành công
        header("Location: admin.php");
        exit();
    } catch (Exception $e) {
        // Nếu có lỗi, rollback giao dịch
        mysqli_rollback($conn);

        // Hiển thị thông báo lỗi hoặc chuyển hướng về trang admin.php
        echo "Đã xảy ra lỗi: " . $e->getMessage();
        exit();
    }
} else {
    exit();
}
?>