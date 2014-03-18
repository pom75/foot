<?php

//Connexion BD
	mysql_select_db('locationfaabc', $db);


	$sql = "DELETE FROM PARTIE1 WHERE idp = '".$_POST['idp']."' AND idu = '".$_COOKIE['iduA']."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
	
	header('Location: index.php');
	
?>
	