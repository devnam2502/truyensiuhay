<div id="main">
	<div class="maincontent">
		<?php
		if (isset($_GET['quanly'])) {
			$tam = $_GET['quanly'];
		} else {
			$tam = '';
		}
		if ($tam == 'theloai') {
			include("main/theloai.php");

		} elseif ($tam == 'danhsachtruyen') {
			include("main/danhsachtruyen.php");

		} elseif ($tam == 'danhsachchapter') {
			include("main/danhsachchhapter.php");

		} elseif ($tam == 'doctruyen') {
			include("main/doctruyen.php");

		} elseif ($tam == 'binhluan') {
			include("main/binhluan.php");

		} elseif ($tam == 'baiviet') {
			include("main/baiviet.php");

		} elseif ($tam == 'danhsachtheodoi') {
			include("main/danhsachtheodoi.php");

		} elseif ($tam == 'huytheodoi') {
			include("main/huytheodoi.php");

		} elseif ($tam == 'lienhe') {
			include("main/lienhe.php");

		} elseif ($tam == 'truyen') {
			include("main/truyen.php");

		} elseif ($tam == 'dangky') {
			include("main/dangky.php");

		} elseif ($tam == 'dangnhap') {
			include("main/dangnhap.php");

		} elseif ($tam == 'dangxuat') {
			include("main/dangxuat.php");

		} elseif ($tam == 'timkiem') {
			include("main/timkiem.php");

		} elseif ($tam == 'thaydoimatkhau') {
			include("main/thaydoimatkhau.php");
		} else {
			include("main/index.php");
		}
		?>
	</div>
</div>
</div>
</div>