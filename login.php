	<?php require_once("config/connection.php"); ?>
	<?php include("includes/header.php"); ?>	 
	<?php
	
	if(isset($_SESSION["session_username"])){
	// вывод "Session is set"; // в целях проверки
	header("Location: intropage.php");
	}

	if(isset($_POST["login"])){

	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$query =mysql_query("SELECT * FROM registration WHERE username='".$username."' AND password='".$password."'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
 {
while($row=mysql_fetch_assoc($query))
 {
	$dbusername=$row['username'];
  $dbpassword=$row['password'];
 }
  if($username == $dbusername && $password == $dbpassword)
 {
	// старое место расположения
	//session_start();
	 $_SESSION['session_username']=$username;	 
 /* Перенаправление браузера */
   header("Location: intropage.php");
	}
	} else {
	//  $message = "Invalid username or password!";
	
	echo  $message = "Неправильное имя пользователя или пароль!";
 }
	} else {
    $message = "Все поля обязательны для заполнения!";
	}
	}
	?>
	
<?php include("includes/header.php"); ?>
		<div class="container mlogin">
			<div id="login">
					<h1>Вход</h1>
				<form action="" id="loginform" method="post"name="loginform">
					<p><label for="user_login">Имя опльзователя<br>
				<input class="input" id="username" name="username"size="20"
				type="text" value=""></label></p>
					<p><label for="user_pass">Пароль<br>	
				<input class="input" id="password" name="password"size="20"
				type="password" value=""></label></p> 
					<p class="submit"><input class="button" name="login"type= "submit" value="Вход"></p> <br>
					<p class="regtext"> Еще незарегистрированы?<a href= "register.php">Регистрация</a>!</p>
					<p align= "center"> <a href= "index.html">На главную</a></p>
				</form>
			</div>
		</div>
	<?php include("includes/footer.php"); ?>