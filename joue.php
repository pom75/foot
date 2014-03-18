<?php

$nom = '';
$idp = '';
$balle = '';

if(isset($_COOKIE['nomA'])){
	$nom =$_COOKIE['nomA'];
	connecter();
}else{
	header('Location: connexion.php');
}


function connecter(){
	global $nom;
	global $titre;
	global $nb;
	global $date;
	
	if(isset($_POST['idp'])){
		$idp = $_POST['idp'];
	}else{
		header('Location: index.php');
	}if(isset($_POST['balle'])){
		$balle = true ;
	}else{
		$balle = false;
	}
	
	
	//Connexion BD
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	
	
	mysql_select_db('locationfaabc', $db);
	                
	//Requette
	$sql = "SELECT * FROM PJ WHERE idp = '".$_POST['idp']."'";
	$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
	$a = 0;
	$b = 0;
	$equipe = false;
	
	while ($dn = mysql_fetch_assoc($req)) {
		if($dn['equipe'] == false ){
			$a++;
		}else{
			$b++;
		}
	}

	if($_POST['nb'] == ($a+$b)){
		header('Location: index.php');
	}else{
	
	if($_POST['nb']/2 <= $a){
		$equipe = true;
	}else if($_POST['nb']/2 <= $b){
		$equipe = false;
	}else{
		$equipe = rand (0, 1);
	}
	
	
	$req = $bdd->prepare("INSERT INTO PJ(idu,idp,balle,equipe) VALUES( :idu, :idp, :balle, :equipe)");
	$req->execute(array(
		'idu' => $_COOKIE['iduA'],
		'idp' => $idp,
	    'balle' => $balle,
	    'equipe' => $equipe
	));
	
	header('Location: index.php');
	}

}


?>