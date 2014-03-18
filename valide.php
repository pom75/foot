<?php

$nom = 'Anomymous';
$titre = 'Foot Hériot';
$nb = '';
$date = 'Dimanche';

if(isset($_COOKIE['nomA'])){
	$nom =$_COOKIE['nomA'];
	verfi();
	bd();
}else{
	header('Location: connexion.php');
}




function verfi(){
	global $nom;
	global $titre;
	global $nb;
	global $date;
	if(isset($_POST['titre'])){
		$titre = $_POST['titre'];
	}else{
		header('Location: cree.php');
	}
	if(isset($_POST['date'])){
		$date = $_POST['date'];
	}else{
		header('Location: cree.php');
	}
	if(isset($_POST['nb'])){
		$nb = $_POST['nb'];
	}else{
		header('Location: cree.php');
	}
}


function bd(){
	global $nom;
	global $titre;
	global $nb;
	global $date;
	
	$titre .= ' par '.$nom;
	
	//Connexion BD
	mysql_select_db('locationfaabc', $db);
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	
	
	//Insertion
	$req = $bdd->prepare("INSERT INTO PARTIE1(idu,titre,date,nb) VALUES( :idu, :titre , :date, :nb)");
	$req->execute(array(
		'idu' => $_COOKIE['iduA'],
	    'titre' => $titre,
	    'date' => $date,
	    'nb' => $nb
	));
	        
	
	mysql_close($db);
	header('Location: index.php');

}


?>