<?php
session_start();

//if ( !isset($_GET[index])

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['MSISDN']);
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<center><div class="header">
	<h2>Halaman Utama</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['sukses'])): ?>
      <div class="error success" >
		<h3>
          <?php
echo $_SESSION['sukses'];
unset($_SESSION['sukses']);
?>
      	</h3>
      </div>
  	<?php endif?>

    <!-- logged in user information -->
    <?php if (isset($_SESSION['MSISDN'])): ?>
    	<p> <a href="index.php" style="color: white;">logout</a> </p>
    <?php endif?>
</div></center>

</body>
</html>