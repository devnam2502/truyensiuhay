<?php
// session_start();
// Kiểm tra xem id có được truyền qua phương thức GET không
if (isset($_GET['id'])) {
    // Lấy giá trị id từ URL
    $chapterId = $_GET['id'];

    // Truy vấn thông tin của chapter
    $sql = "SELECT truyen.truyen_id, truyen.tenTruyen, truyen.folder, chapter.soThuTu
            FROM chapter
            INNER JOIN truyen ON chapter.truyen_id = truyen.truyen_id
            WHERE chapter.chapter_id = $chapterId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Lấy thông tin chapter từ kết quả truy vấn
        $row = $result->fetch_assoc();
        $truyenId = $row['truyen_id'];

        // Lưu truyện id vào session
        $_SESSION['truyenId'] = $truyenId;

        $tenTruyen = $row['tenTruyen'];
        $soThuTu = $row['soThuTu'];
        $folder = $row['folder'];

        // Tạo đường dẫn tới folder chứa chapter
        $folder_path = "$folder/chapters/chapter$soThuTu/";

        // Đọc tất cả các file hình ảnh trong folder chapter
        $image_files = glob($folder_path . "*.jpg");
        natsort($image_files);
        ?>
        <div class="container-fluid bg-secondary" name="ContainTruyen">
            <div class="box">
            <a class="backTruyen" href="http://localhost/web_mysqli/index.php?quanly=truyen&id=<?php echo $truyenId?>">Về trang truyện</a>
            <p class="currentChap"> Chương hiện tại: <?php echo $soThuTu ?></p>
            <hr color="white" width="100%" size="3px">
            <?php
            include('chuyenpage.php'); 
            ?>
            <hr color="white" width="100%" size="3px">
            <?php
            // Lặp qua từng file hình ảnh và hiển thị dưới dạng img
            foreach ($image_files as $image_file) {
                echo "<img class='mx-auto d-block' src='$image_file' alt='Chapter Image'><br>";
            }
            ?>
            <hr color="white" width="100%" size="10px">
            <?php
            include('chuyenpage.php');
            ?>
            </div>
            <div class="space"></div>
            <button class="scroll-to-top" onclick="scrollToTop()">Lên đầu trang</button>
            <script>
                // JavaScript
                // Hiển thị button khi cuộn xuống dưới một đoạn nhất định
                window.onscroll = function() { showScrollToTopButton() };

                function showScrollToTopButton() {
                    var button = document.querySelector('.scroll-to-top');
                    if (document.documentElement.scrollTop > 300) {
                        button.style.display = 'block';
                    } else {
                        button.style.display = 'none';
                    }
                }

                // Lướt lên đầu khi bấm vào button
                function scrollToTop() {
                    document.documentElement.scrollTop = 0;
                }
            </script>
            

        </div>
    
    <?php
    } else {
        // Nếu không có id được truyền, hiển thị thông báo lỗi hoặc chuyển hướng về trang khác tùy theo yêu cầu của bạn
        echo 'Lỗi: Không tìm thấy chapter';
    }
}
?>

<style>
 .box {
    padding-top: 50px;
 }
 .backTruyen {
    display: flex;
    justify-content: center;
    color: red;
    font-size: 20px;
 }
 .currentChap {
    font-size: 30px;
    color: white;
    display: flex;
    justify-content: center;
 }
 .space {
    height: 50px;
 }

 img {
    max-width: 100%;
    height: auto;
 }
 .scroll-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: none; /* Ẩn button ban đầu */
}
</style>