<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	
	<title>Truyện Siu Hay: admin</title>
	
</head>
<body>
	<div class="container-fluid">
		<div class="row justify-content-center">
            <?php
            session_start();
            // Kết nối CSDL
            include("config.php");
            echo '<a href="../index.php"> Quay lại trang xem truyện </a>';
            include("quanlytruyen.php");
            include("danhsachtruyen.php");
            ?>
    </div>
</div>
</body>
</html>