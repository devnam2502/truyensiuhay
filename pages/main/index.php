<?php
// Thiết lập phân trang
$truyenPerPage = 24; // Số lượng truyện trên mỗi trang
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
$offset = ($page - 1) * $truyenPerPage;

// Lấy dữ liệu từ cơ sở dữ liệu
$sql = "SELECT * FROM truyen LIMIT $offset, $truyenPerPage";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $count = 0;
    echo "<div class='container-fluid bg-secondary'>";

    while ($row = $result->fetch_assoc()) {
        $tenTruyen = $row['tenTruyen']; 
        $linkAnh = $row['anhbia']; 

        if ($count % 6 == 0) {
            echo "<div class='row'>"; 
        }

        echo "<div class='col-md-2'>";
        echo "<a class='linkTruyen' href='index.php?quanly=truyen&id=" . $row['truyen_id'] ."'><img src='$linkAnh' alt='$tenTruyen' class='truyen_img' /></a>";
		echo "<a class='linkTruyen' href='index.php?quanly=truyen&id=" . $row['truyen_id'] ."'><h5>$tenTruyen</h> </a>";
        echo "</div>";

        $count++;

        if ($count % 6 == 0) {
            echo "</div>"; 
        }
    }

    // Kiểm tra nếu dòng cuối chưa được kết thúc
    if ($count % 6 != 0) {
        echo "</div>"; 
    }

    echo "</div>"; 

    // Tạo liên kết phân trang
    $sqlCount = "SELECT COUNT(*) AS total FROM truyen";
    $resultCount = $conn->query($sqlCount);
    $rowCount = $resultCount->fetch_assoc();
    $totalTruyen = $rowCount['total'];
    $totalPages = ceil($totalTruyen / $truyenPerPage); // Tính tổng số trang

    echo "<div class='container'>";
    echo "<ul class='pagination justify-content-center'>";

    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<li class='page-item";
        if ($i == $page) {
            echo " active"; // Đánh dấu trang hiện tại
        }
        echo "'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
    }

    echo "</ul>";
    echo "</div>";
    echo "<div class='space'></div>";
} else {
    echo "Không có dữ liệu truyện.";
}

// Đóng kết nối cơ sở dữ liệu
?>


<style>
	a:hover {
		text-decoration: none;
		color: #21b7d1;
	}

    .row {
        border-top: 2px solid black;
        border-left: 2px solid black;
        border-right: 2px solid black;
        margin-bottom: 0px;
    }
    .truyen_img {
        height: 250px;
        width: 200px;
        border: 2px solid black;
        border-radius: 10px;
        margin-top: 10px;
    }

    .linkTruyen {
        color: white;
    }

    .space {
        height: 30px;
    }
    
</style>