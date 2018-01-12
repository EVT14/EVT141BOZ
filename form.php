<?php
	$msg_box = ""; // в этой переменной будем хранить сообщения формы
	
	if($_POST['btn_submit']){
		$errors = array(); // контейнер для ошибок
		// проверяем корректность полей
		if($_POST['user_name'] == "") 	 $errors[] = "Поле 'Ваше имя' не заполнено!";
		if($_POST['user_email'] == "") 	 $errors[] = "Поле 'Ваш e-mail' не заполнено!";
		if($_POST['text_comment'] == "") $errors[] = "Поле 'Текст сообщения' не заполнено!";

		// если форма без ошибок
		if(empty($errors)){		
			// собираем данные из формы
			$message  = "Имя пользователя: " . $_POST['user_name'] . "<br/>";
			$message .= "E-mail пользователя: " . $_POST['user_email'] . "<br/>";
			$message .= "Текст письма: " . $_POST['text_comment'];		
			send_mail($message); // отправим письмо
			// выведем сообщение об успехе
			$msg_box = "<span style='color: green;'>Сообщение успешно отправлено!</span>";
		}else{
			// если были ошибки, то выводим их
			$msg_box = "";
			foreach($errors as $one_error){
				$msg_box .= "<span style='color: red;'>$one_error</span><br/>";
			}
		}
	}
	
	// функция отправки письма
	function send_mail($message){
		// почта, на которую придет письмо
		$mail_to = "di.push@mail.ru"; 
		// тема письма
		$subject = "Письмо с обратной связи";
		
		// заголовок письма
		$headers= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
		$headers .= "From: Тестовое письмо <no-reply@test.com>\r\n"; // от кого письмо
		
		// отправляем письмо 
		mail($mail_to, $subject, $message, $headers);
	}
?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html>

  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Обратная связь</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
     
  </head>

 <body>
            <div id="container">
			    <div id="header">
					<div id="logo">
						<a href="index.html" alt="Домой"><img src="pic/flogol.png"  href="index.html" height="70px" width="auto"></a> 
					</div>
					<div id="name">
								<a class= "name-style" href="index.html" alt="Домой">HTML Help </a>  
								
					</div>
					<div id="enter"> 
								<a href="login.php" alt="Вход"> Вход  </a>
								<a href="register.php" alt="Регистрация"> Регистрация  </a>
								<a href="logout.php" alt="Выход"> Выход  </a>
					</div>
						
				</div>
						
						 <div id="navigation">
						
							<ul id="navbar">
							  <li><a href="index.html">Главная</a></li>
							  <li><a href="html_help.html">HTML</a>
									<ul>
										<li><a href="html_help.html">Введение</a></li>
										<li><a href="lesson/less1.html">Задание 1</a></li>
										<li><a href="lesson/less2.html">Задание 2</a></li>
										<li><a href="lesson/less3.html">Задание 3</a></li>
										<li><a href="lesson/less4.html">Задание 4</a></li>
										<li><a href="lesson/less5.html">Задание 5</a></li>
										<li><a href="lesson/less6.html">Задание 6</a></li>
										<li><a href="lesson/less7.html">Задание 7</a></li>
										<li><a href="lesson/less8.html">Задание 8</a></li>
										<li><a href="lesson/less9.html">Задание 9</a></li>
										<li><a href="lesson/less10.html">Задание 10</a></li>
										<li><a href="lesson/less11.html">Задание 11</a></li>
										<li><a href="lesson/less12.html">Задание 12</a></li>
										<li><a href="lesson/less13.html">Задание 13</a></li>
										<li><a href="lesson/less14.html">Задание 14</a></li>
										<li><a href="lesson/less15.html">Задание 15</a></li>
										<li><a href="lesson/less16.html">Задание 16</a></li>
										<li><a href="lesson/less17.html">Задание 17</a></li>
										<li><a href="lesson/less18.html">Заключение</a></li>
										
									</ul>
								</li>
							  <li><a href="#">Контакты</a>
								<ul>
								    <li><a href="form.php">Напишите нам</a></li>
								</ul>
							  </li>
							  <li><a href="maps.html">Карта </a></li>
							</ul>
							 
                        </div>
 
 
                        <div id="menu">
						</div>
 
                        <div id="content">
						
							<div class="slider">
								<div class= "mail_style">
							
									<br/>
										<?= $msg_box; // вывод сообщений ?>
										<br/>
										<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" name="frm_feedback">
											<label>Ваше имя:</label><br/>
											<input type="text" name="user_name" value="<?=($_POST['user_name']) ? $_POST['user_name'] : ""; // сохраняем то, что вводили?>" /><br/>
											
											<label>Ваш e-mail:</label><br/>
											<input type="text" name="user_email" value="<?=($_POST['user_email']) ? $_POST['user_email'] : ""; // сохраняем то, что вводили?>" /><br/>
											
											<label>Текст сообщения:</label><br/>
											<textarea name="text_comment"><?=($_POST['text_comment']) ? $_POST['text_comment'] : ""; // сохраняем то, что вводили?></textarea>
											
											<br/>
											<input type="submit" value="Отправить" name="btn_submit" />
										</form>
								</div>			
						
							</div>
                        </div>
 
                        <div id="clear">
 
                        </div> 
                       
                        <div id="footer">
							<div id="footer-text">
								<p>&copy; 2017, ЭВТ-14-1боз</p>
							</div>
                        </div>
            </div>
 

</body>
</html>
