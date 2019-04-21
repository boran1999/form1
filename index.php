<?php

$error = array( 
); 

if (!empty($_POST)) 
{ 
	$name = isset($_POST['name']) ? trim($_POST['name']) : null; 
	$sname = isset($_POST['sname']) ? trim($_POST['sname']) : null; 
	$email = isset($_POST['email']) ? trim($_POST['email']) : null; 
	$phone = isset($_POST['phone']) ? trim($_POST['phone']) : null; 
	$top = isset($_POST['top']) ? trim($_POST['top']) : null; 
	$pay = isset($_POST['paym']) ? trim($_POST['paym']) : null; 

	foreach (['name', 'lastname', 'email', 'phone', 'topic', 'pay'] as $key) 
	{ 
		if(empty($$key)) 
		{ 
			$error[$key] = true; 
		} 
	} 
} 
if ($error)  { 
	$filename = date('Y-m-d-H-i-s') . '-' . rand(010, 99) . '.txt'; 
	$SoglRas = isset($_POST['jel']) ? $_POST['jel'] : 'no'; 
	$contents = '<?php'."\n".'return'. var_export([
		'name' => $name, 
		'secondname' => $sname, 
		'email' => $email, 
		'topic' => $top, 
		'pay' => $pay, 
		'mailing' => $SoglRas,
	],true); 
	$dir = "logs"; 
	if(!is_dir($dir)) {
    	mkdir($dir, 0777, true);
	}
	file_put_contents("logs\\".$filename, $contents); 
	header('Location: form1.php');
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <h2 align ="left"><font color="blue">Форма регистрации</font></h2>
  <title>Test_Form</title>
 </head>
 <body bgcolor="lightblue">
  <form action="<?= $_SERVER['REQUEST_URI'];?>" method="POST">
   <p><input placeholder="*имя" name="name" value="<?= isset($_POST['name']) ? $_POST['name']:''?>" required>
    <?php
    if (!empty($_POST)){
  		echo $errors['name'];
  	}
 	?>
 </p>
   <p><input placeholder="*фамилия" name="sname" value="<?= isset($_POST['sname']) ? $_POST['sname']:''?>" required> 
    <?php
    if (!empty($_POST)){
  		echo $errors['sname'];
  	}
 	?>
 </p>
   <p><input placeholder="*электронная почта" name="email" value="<?= isset($_POST['email']) ? $_POST['email']:''?>" required>
    <?php
    if (!empty($_POST)){
  		echo $errors['email'];
  	}
 	?>
 </p>
   <p><input placeholder="*номер телефона" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone']:''?>" required>
    <?php
    if (!empty($_POST)){
  		echo $errors['phone'];
  	}
 	?>
 </p>
	<p><font color="blue">Выберите тематику конференции</font></p>
	<p>
		<select name="top" >
			<optgroup label="Topic">
    		<option value="biz" name="biz">Бизнес</option>
    		<option value="tech" name="tech">Технологии</option>
    		<option value="adv" name="adv">Реклама и Маркетинг</option>
   			</optgroup>
		</select>
	</p>
	<p><font color="blue">Выберите способ оплаты</font></p> 
	<p>
		<select name="paym">
			<optgroup label="Pay">
    		<option value="wbm" name="wbm">Web-money</option>
    		<option value="yam" name="yam">Яндекс деньги</option>
    		<option value="pp" name="pp">PayPal</option>
    		<option value="cred" name="cred">кредитная карта</option>
   			</optgroup>
		</select>
	</p>
	<input type="checkbox" name="jel" value="yes"><font color="blue">Хотите получать рассылку о конференции?</font><br>
   <p><input type="submit" value="Отправить данные"></p>
  </form>
<div>
</div>
</body>
</html>
