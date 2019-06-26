<?php

	if ($_GET['s']) {
		$item_buscado = $_GET['s'];

		$con = new PDO('mysql: host=localhost; dbname=banco-teste;','root','', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

		$sql = "SELECT * FROM posts WHERE titulo LIKE :busc";
		$sql = $con->prepare($sql);
		$sql->bindValue(':busc', '%'.$item_buscado.'%', PDO::PARAM_STR);
		$sql->execute();



		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			$resultado[] = $row['titulo'];
		}

		echo json_encode($resultado);
	}