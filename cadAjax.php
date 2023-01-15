<?php 
	$pdo = new PDO('mysql:host=sql306.epizy.com;dbname=epiz_33384732_tarefas','epiz_33384732','Fi0XMpPgALuu');

	$tarefa = $_POST['tarefa'];
	$user = $_POST['user'];
	
	$sql = $pdo->prepare("INSERT INTO `nome_ajax` VALUES (null,?,?) ");

	$sql->execute(array($user,$tarefa));

?>

