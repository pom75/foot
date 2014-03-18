<?php

//Connexion BD
	mysql_select_db('locationfaabc', $db);


	$sql = "UPDATE PARTIE1 SET PARTIE1.date= '".$_POST['date']."'  WHERE PARTIE1.idp = '".$_POST['idp']."' AND PARTIE1.idu = '".$_COOKIE['iduA']."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
	
	header('Location: index.php');
	
?>