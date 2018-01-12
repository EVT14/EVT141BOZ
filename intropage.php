<?php session_start();
	if(!isset($_SESSION["full_name"])):
	header("location:login.php");
	else:
	?>
	
<?php include("includes/header.php"); ?>
<div id="welcome">
<h2>Добро пожаловать, <span><?php echo $_SESSION['full_name'];?>! </span></h2>
  <p><a href="logout.php">Выйти</a> из системы</p>
</div>
	
<?php include("includes/footer.php"); ?>
	
<?php endif; ?>