<?php
$errors=array(
	'name' => '',
	'sname' => '',
	'email' => '',
	'phone' => '',
);
	if (!empty($_POST)){
		if(empty($_POST['name'])){
			$errors['name']='Введите имя!';
		}
		if(empty($_POST['sname'])){
			$errors['sname']='Введите фамилию!';
		}
		if(empty($_POST['email'])){
			$errors['email']='Введите email!';
		}
		if(empty($_POST['phone'])){
			$errors['phone']='Введите номер телефона!';
		}
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
 <?php
 if (!empty($_POST['name']) && !empty($_POST['sname']) && !empty($_POST['email']) && !empty($_POST['phone'])) { 
	$filename = date('Y-m-d-H-i-s') . '-' . rand(010, 99) . '.txt'; 
	$name = $_POST['name']; 
	$sname = $_POST['sname']; 
	$email = $_POST['email']; 
	$phone = $_POST['phone']; 
	$top = $_POST['top']; 
	$pay = $_POST['paym']; 
	$SoglRas = isset($_POST['jel']) ? $_POST['jel'] : 'no'; 
	$contents = '<?php'."\n".'return'. var_export([
		'name' => $name, 
		'secondname' => $sname, 
		'email' => $email, 
		'topic' => $top, 
		'pay' => $pay, 
		'mailing' => $SoglRas,
	],true); 
	file_put_contents("logs\\".$filename, $contents); 
	header('Location: form.php');
}
 ?>
<div>
</div>
</body>
</html>
