<?php

//Connexion BD
	mysql_select_db('locationfaabc', $db);


	$sql = "UPDATE PARTIE1 SET PARTIE1.butA= '".$_POST['ba']."',PARTIE1.butB= '".$_POST['bb']."'  WHERE idp = '".$_POST['idp']."' AND idu = '".$_COOKIE['iduA']."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
	
	header('Location: index.php');
	
?>