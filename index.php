<?php 
session_start();
	$_SESSION['user'] = $_SERVER['REMOTE_ADDR'];

	$pdo = new PDO('mysql:host=sql306.epizy.com;dbname=epiz_33384732_tarefas','epiz_33384732','Fi0XMpPgALuu');
?>
<!DOCTYPE html>
<html>
<head>
	<!-- metatags -->
	<meta name="description" content="Desenvolvedor fullstack - taréfas - todo - lista de taréfas"/>
	<meta name="keywords" content="desenvolvimento web,seo,marketing digital,programação,cursos online,web design,front-end,web developer,back-end,php,pacajus,controle financeiro" />
	<meta name="robots" content="index,follow" />
	<meta name="author" content="Francisco André | Dev. Web, mobile">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0" />
	<!-- charset -->
	<meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/4537/4537264.png">
	<!-- font awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/d76df92ddf.js" crossorigin="anonymous"></script>
	<title>Lita de tarefas</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="msg">
		<h4><i class="fa-solid fa-check"></i> Tarefa registrada!</h4>
	</div><!-- msgLogin -->
	
	<form method="post">
		<span>O que vai fazer hoje?</span>
		<input type="text" name="tarefa" id="tarefa">
		<input type="hidden" name="user" value="<?php echo $_SESSION['user'] ?>">

		<input id="enviar" type="submit" name="enviar" value="Adicionar">
	</form>
	
	<div class="nomeRetorno">
		<?php

			if (isset($_GET['excluir'])) {
				$id = (int)$_GET['excluir'];
				$pdo->exec("DELETE FROM `nome_ajax` WHERE id = $id");
				echo "<script>alert('Tarefa excluída com sucesso!');</script>";
				echo '<script>javascript:history.back();</script>';
			}

			$user = $_SESSION['user'];

			$sql = $pdo->prepare("SELECT * FROM `nome_ajax` WHERE user = '$user'");

			$sql->execute();

			$nome = $sql->fetchAll();

			foreach ($nome as $key => $value) {
				
				for ($i=0; $i <= $key; $i++) { 
				}
				echo "<p>".$i.' - '.$value['nome']." <a href='?excluir=".$value['id']."'><i class='fa-solid fa-trash'></i></a></p>";
			}
		?>
	</div><!-- nomeRetorno -->


<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="cadAjax.js"></script>

</body>
</html>