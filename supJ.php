<?php

//Connexion BD
	mysql_select_db('locationfaabc', $db);


	$sql = "DELETE FROM PJ USING PJ,PARTIE1 WHERE PARTIE1.idp = '".$_POST['idp']."' AND PARTIE1.idu = '".$_COOKIE['iduA']."' AND PARTIE1.idp = PJ.idp AND PJ.idu = '".$_POST['idu']."' ";
	$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
	
	header('Location: index.php');
?>
	