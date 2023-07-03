<?php
// Kiểm tra nếu có ID truyện trong URL
if (isset($_GET['id'])) {
    $truyenId = $_GET['id'];
    $_SESSION['truyen_id'] = $truyenId;

    // Câu truy vấn SQL để lấy thông tin truyện dựa trên ID
    $sql = "SELECT * FROM truyen WHERE truyen_id = '$truyenId'";
    $result = $conn->query($sql);

    // Kiểm tra và hiển thị thông tin truyện
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <div class="container-fluid bg-dark">
            <table class="table1">
                <tr>
                    <td class="col1">
                        <img src="<?php echo $row['anhbia'] ?>" alt="Hình ảnh" class="image">
                    </td>
                    <td class="col2">
                        <p> Tên truyện: <?php echo $row['tenTruyen'] ?></p>
                        <p> Tác giả: <?php echo $row['tacgia'] ?></p>
                        <p> Nội dung: <?php echo $row['noidung'] ?></p>
                        <p> Ngày đăng: <?php echo $row['NgayDang'] ?></p>
                        <p class="theloai"> Thể loại:
                            <?php
                            // Lấy truyen_id từ SESSION hoặc URL
                            $truyenId = isset($_SESSION['truyen_id']) ? $_SESSION['truyen_id'] : $_GET['id'];

                            // Câu truy vấn SQL để lấy thông tin thể loại của truyện
                            $sql = "SELECT theloai.theloai_id, theloai.tenTheloai FROM truyen_theloai
                                    INNER JOIN theloai ON truyen_theloai.theloai_id = theloai.theloai_id
                                    WHERE truyen_theloai.truyen_id = '$truyenId'";
                            $result = $conn->query($sql);

                            // Kiểm tra và hiển thị danh sách thể loại
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $theloaiId = $row['theloai_id'];
                                    $tenTheloai = $row['tenTheloai'];
                                    $link = "index.php?quanly=theloai&id=$theloaiId";
                                    echo "<a href='$link'>$tenTheloai</a> ";
                                }
                            }
                            ?>
                        </p>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];

                            // Kiểm tra xem đã tồn tại cặp user_id - truyen_id trong bảng theodoi chưa
                            $checkQuery = "SELECT * FROM theodoi WHERE user_id = '$user_id' AND truyen_id = '$truyenId'";
                            $checkResult = $conn->query($checkQuery);

                            if ($checkResult->num_rows > 0) {
                                // Đã theo dõi truyện này
                                echo "<a href='index.php?quanly=danhsachtheodoi'><p class='followed'>Đã theo dõi truyện này.</p></a>";
                            } else {
                                // Chưa theo dõi truyện này
                                ?>
                                <form method="post" action="">
                                    <input type="hidden" name="truyen_id" value="<?php echo $truyenId ?>">
                                    <button type="submit" name="theodoi" class="button">Theo dõi</button>
                                </form>
                                <?php
                            }
                        } else {
                            echo "Vui lòng đăng nhập để sử dụng chức năng này.";
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <div class="box">
                <ul class="nav nav-tabs">
                    <li class="nav-item bg-info rounded">
                        <a class="nav-link active" id="tab1" data-toggle="tab" href="#content1">Danh sách chương</a>
                    </li>
                    <li class="nav-item bg-info rounded">
                        <a class="nav-link" id="tab2" data-toggle="tab" href="#content2">Bình luận</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="content1" class="tab-pane fade show active">
                        <?php
                        include("danhsachchapter.php");
                        ?>
                    </div>
                    <div id="content2" class="tab-pane fade">
                        <?php
                        include('binhluan.php');
                        ?>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Không tìm thấy truyện.";
    }
} else {
    echo "Không có ID truyện.";
}

if (isset($_POST['theodoi'])) {
    // Kiểm tra xem đã đăng nhập hay chưa (kiểm tra user_id trong session)
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $truyen_id = $_POST['truyen_id'];

        // Kiểm tra xem đã tồn tại cặp user_id - truyen_id trong bảng theodoi chưa
        $checkQuery = "SELECT * FROM theodoi WHERE user_id = '$user_id' AND truyen_id = '$truyen_id'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            // Cặp user_id - truyen_id đã tồn tại, không cần thêm vào lại
            echo "Đã theo dõi truyện này.";
        } else {
            // Thêm cặp user_id - truyen_id vào bảng theodoi
            $insertQuery = "INSERT INTO theodoi (user_id, truyen_id) VALUES ('$user_id', '$truyen_id')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "Đã thêm vào danh sách theo dõi.";

                // Hiển thị thông báo nổi và thực hiện reload lại trang sau khi nhấp vào nút OK
                ?>
                <script>
                    alert("Đã thêm vào danh sách theo dõi.");
                    window.location.reload();
                </script>
                <?php
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }
    } else {
        echo "Vui lòng đăng nhập để sử dụng chức năng này.";
    }
}
?>
<style>
    .table1 {
        display: table;
        margin: auto;
        padding: 10px;
        border: 2px solid orange;
        border-radius: 5px;
        width: 90%;
        background-color: #292826;
    }

    .table1 img {
        padding: 10px;
        height: 400px;
        width: 300px;
    }

    .table1 tr {
        height: 400px;
    }

    .table1 td.col1 {
        width: 20%;
    }

    .table1 td.col2 {
        width: 80%;
    }

    .table1 p {
        font-size: 20px;
        line-height: 1.5;
        color: white;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box {
        padding-top: 20px;
        padding-bottom: 100px;
        align-items: center;
        width: 100%;
    }

    .nav a {
        color: black;
    }

    .theloai a {
        color: lightskyblue;
        text-decoration: none;
    }

    .theloai a:hover {
        color: lightcoral;
        transition: 0.5s;
    }

    .followed {
        color: white;
    }
</style>