<?php

// Xử lý tìm kiếm khi nhấn nút Tìm kiếm
if (isset($_POST['timkiem'])) {
    $keyword = $_POST['tukhoa'];

    // Truy vấn tìm kiếm theo tên truyện
    $query = "SELECT t.truyen_id, t.tenTruyen, t.tacgia, t.so_chuong, t.ngaydang, GROUP_CONCAT(th.tenTheloai SEPARATOR ', ') AS theloai
              FROM truyen AS t
              LEFT JOIN truyen_theloai AS tt ON t.truyen_id = tt.truyen_id
              LEFT JOIN theloai AS th ON tt.theloai_id = th.theloai_id
              WHERE t.tenTruyen LIKE '%$keyword%'
              GROUP BY t.truyen_id";

    // Thực thi truy vấn
    $result = mysqli_query($conn, $query);

    // Kiểm tra kết quả truy vấn
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
			?>
            <h2>Kết quả tìm kiếm:</h2>
            <table class='table'>
            <tr><th>Tên truyện</th><th>Tác giả</th><th>Thể loại</th><th>Số Chương</th><th>Ngày đăng</th></tr>
			<?php
            while ($row = mysqli_fetch_assoc($result)) {
				?>
                <tr>
				<td> <a href="index.php?quanly=truyen&id=<?php echo $row['truyen_id'] ?>"> <?php echo $row['tenTruyen'] ?></td>
				<td> <?php echo $row['tacgia'] ?> </td>
				<td> <?php echo $row['theloai'] ?> </td>
				<td> <?php echo $row['so_chuong'] ?> </td>
				<td> <?php echo $row['ngaydang'] ?> </td>
				</tr>
			<?php
            }
            echo "</table>";
        } else {
            echo "<p>Không tìm thấy kết quả phù hợp.</p>";
        }

        // Giải phóng bộ nhớ
        mysqli_free_result($result);
    } else {
        echo "<p>Lỗi truy vấn: " . mysqli_error($conn) . "</p>";
    }
}

// Đóng kết nối
mysqli_close($conn);
?>