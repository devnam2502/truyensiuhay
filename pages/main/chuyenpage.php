<?php
// Kiểm tra xem session truyenId có tồn tại không
if (isset($_SESSION['truyenId'])) {
    $truyenId = $_SESSION['truyenId'];

    // Kiểm tra xem có giá trị $chapterId trong URL không
    if (isset($_GET['id'])) {
        $chapterId = $_GET['id'];

        // Truy vấn để lấy chapter_id của chương trước
        $sql = "SELECT chapter_id FROM chapter WHERE truyen_id = $truyenId AND chapter_id < $chapterId ORDER BY chapter_id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $preChapterId = $row['chapter_id'];
        } else {
            $preChapterId = null;
        }

        // Truy vấn để lấy chapter_id của chương tiếp theo
        $sql = "SELECT chapter_id FROM chapter WHERE truyen_id = $truyenId AND chapter_id > $chapterId ORDER BY chapter_id ASC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nextChapterId = $row['chapter_id'];
        } else {
            $nextChapterId = null;
        } ?>
    <div class="changePage">
        <?php

        // Hiển thị button chuyển trang trước
        if ($preChapterId) {
            echo "<a href='index.php?quanly=doctruyen&id=$preChapterId'><button>Chương trước</button></a>";
        } else {
            echo "<button disabled>Chương trước</button>";
        }

        // Hiển thị button chuyển trang tiếp theo
        if ($nextChapterId) {
            echo "<a href='index.php?quanly=doctruyen&id=$nextChapterId'><button>Chương tiếp</button></a>";
        } else {
            echo "<button disabled>Chương tiếp</button>";
        }
    } else {
        echo "Không tìm thấy chapter ID";
    }
} else {
    echo "Không tìm thấy truyện";
}
?>
</div>
<style>
    .changePage {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100px;
    }
    .changePage button {
        background-color: aquamarine;
        width: 120px;
        height: 50px;
        border-radius: 5px;
        
    }
    .changePage button:disabled {
        background-color: grey;
    }
</style>
