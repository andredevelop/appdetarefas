<?php

session_start();
	$pdo = new PDO('mysql:host=sql306.epizy.com;dbname=epiz_33384732_tarefas','epiz_33384732','Fi0XMpPgALuu');

	$user = $_POST['user'];

	$sql = $pdo->prepare("SELECT * FROM `nome_ajax` WHERE user = '$user'");

	$sql->execute();

	$nome = $sql->fetchAll();

	foreach ($nome as $key => $value) {
		for ($i=0; $i <= $key; $i++) { 
		}
		echo "<p>".$i.' - '.$value['nome']." <a href='?excluir=".$value['id']."'><i class='fa-solid fa-trash'></i></a></p>";
	}
	
?>
