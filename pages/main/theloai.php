<?php 
// Kiểm tra nếu có ID thể loại trong URL
if (isset($_GET['id'])) {
    $idTheloai = $_GET['id'];

    // Câu truy vấn SQL để lấy thông tin các truyện trong cùng một thể loại
    $sql = "SELECT truyen.truyen_id, truyen.tenTruyen, truyen.tacgia, truyen.so_chuong, truyen.NgayDang
        FROM truyen
        INNER JOIN truyen_theloai ON truyen.truyen_id = truyen_theloai.truyen_id
        WHERE truyen_theloai.theloai_id = $idTheloai";
    $result = $conn->query($sql);
    if (!$result) {
        die('Error: ' . $conn->error);
    }
    ?>
    <table class="table" style="width:100%;text-align: center;border-collapse: collapse;" border="2">
        <tr class="row1">
            <th><p> Tên truyện</p>  </th>
            <th><p> Tác giả</p>     </th>
            <th><p> Số chương</p>   </th>
            <th><p> Ngày Đăng </p>  </th>
        </tr>
        <?php 
        // Kiểm tra và hiển thị thông tin từng truyện
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $truyenId = $row['truyen_id'];
                $tenTruyen = $row["tenTruyen"];
        ?>
            <tr>
                <td><a href="index.php?quanly=truyen&id=<?php echo $truyenId?>"> <?php echo $tenTruyen?></td>
                <td><?php echo $row['tacgia']?></td>
                <td><?php echo $row['so_chuong']?></td>
                <td><?php echo $row['NgayDang']?></td>
            </tr>
        <?php
            }
        ?>
    </table>
    <?php
        } else {
            echo "Không tìm thấy truyện tương ứng.";
        }
    }
?>

<style>
    .row1 {
        background-color: lightgreen;
        border: 2px solid black;
    }
</style>