<?php 

	$conn = new mysqli("localhost","root","","truyensiuhay","3306");

	// Check connection
	if ($conn->connect_errno) {
	  echo "Kết nối MYSQLi lỗi" . $mconn->connect_error;
	  exit();
	}

?>