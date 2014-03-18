<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="revisit-after" content="0 days"/>
        <title>Foot Heriot</title>
        <link rel="stylesheet" href="css.css" type="text/css" media="screen" charset="utf-8"/>
    </head>

    <body>
        <div id="container">
            <div id="banner">
            	  <script language="JavaScript1.2"> 
                    var number_of_slideshows=7
                    var interval=2000 
                    var linked=7
                    var slideshows=new Array(number_of_slideshows) 
                    for (i=0; i <number_of_slideshows; i++) 
                        slideshows[i]=new Array() 

                    slideshows[0][0]='ban.png' 
                    slideshows[0][1]='ban1.png' 
                    slideshows[0][2]='ban2.png' 
                    slideshows[0][3]='ban3.png' 
                    slideshows[0][4]='ban4.png' 
                    slideshows[0][5]='ban5.png'
                    slideshows[0][6]='ban6.png'  
 

                    var slidelinks=new Array(number_of_slideshows) 
                    for (i=0; i <number_of_slideshows; i++) 
                        slidelinks[i]=new Array() 

                    slidelinks[0][0]='www.soozig.com' 
                    slidelinks[0][1]='www.soozig.com' 
                    slidelinks[0][2]='www.soozig.com'
                    slidelinks[0][3]='www.soozig.com' 
                    slidelinks[0][4]='www.soozig.com' 
                    slidelinks[0][5]='www.soozig.com'  
                    slidelinks[0][6]='www.soozig.com'  


                    function clickredir(){ 
                        window.location=slidelinks[maininc][subinc] 
                    } 
                    var maininc=0 
                    var subinc=0 
                    if (linked) 
                        document.write('<img src="'+slideshows[0][0]+'" name="multislide" width="960" height="200" border=0>') 
                    else 
                        document.write('<img src="'+slideshows[0][0]+'" name="multislide">') 
                    function slideit(){ 
                        subinc= (subinc<slideshows[maininc].length-1)? subinc+1: 0 
                        document.images.multislide.src=slideshows[maininc][subinc] 
                    } 
                    function setslide(which){ 
                        clearInterval(runit) 
                        maininc=which 
                        subinc=0 
                        runit=setInterval("slideit()",interval) 
                    } 
                    runit=setInterval("slideit()",interval) 
                </script> 
            </div>
            <div id="nav_5">
                <ul>
                    <li><a href="index.php">Prochains Match</a></li>
                    <li><a href="match.php">Match joué</a></li>
                    <li><a href="class.php">Classement</a></li>
                    <?php
                    if(!isset($_COOKIE['nomA'])){
	                    echo('<li><a href="inscription.php">Inscription</a></li>');
	                    echo('<li><a href="connexion.php">Connexion</a></li>');
                    }else{
                    	echo('<li><a href="cree.php">Créé une partie</a></li>');
                    	echo('<li><a href="deconnexion.php">Se déconnecter</a></li>');
	                    echo('<li><div id="pseudo">'.$_COOKIE['nomA'].'</div></li>');
                    	
                    }
                    
                    ?>
                </ul>
            </div>


            <div id="list">

                <?php
                mysql_select_db('locationfaabc', $db);
                
                //Requette
                $sql = "SELECT * FROM PARTIE1 WHERE butA != 0 AND butB != 0 ORDER BY `idp` DESC";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
                
                
                //Affcihage
                while ($dn = mysql_fetch_assoc($req)) {
                	//Requette Joueurs
                	$joueur = array();
                	$a = array();
            	    $b = array();
                	$sql1 = "SELECT * FROM PJ,USER1 WHERE idp = '".$dn['idp']."'  AND PJ.idu = USER1.idu ORDER BY `idpj`";
            	    $req1 = mysql_query($sql1) or die('Erreur SQL !<br>' . $sql1 . '<br>' . mysql_error());
            	    while ($dn1 = mysql_fetch_assoc($req1)) {
            	    	$buff[0]=$dn1['nom'];
            	    	$buff[1]=$dn1['balle'];
            	    	$buff[2]=$dn1['idu'];
            	    	$joueur[] = $buff;
            	    	if($dn1['equipe'] == false){
	            	    	$a[] = $dn1['nom'];
            	    	}else{
	            	    	$b[] = $dn1['nom'];
            	    	}
            	    }
            	    
            	    
	                echo('<div id="element">');
	               	echo('<div id="equipe">');
	               		echo('<div id="equipeA">');
	               			echo('<h1>Equipe A :</h1>');
	               			echo('<p>Buts : '.$dn['butA'].'</p>');
	               			echo('<br/>');
	               			echo('<ul>');
	               			foreach($a as $key=>$value){
	               				echo('<li>'.$value.'</li>');
	               			}
	               			echo('</ul>');
	               		echo('</div>');
	               		echo('<div id="equipeB">');
	               			echo('<h1>Equipe B :</h1>');
	               			echo('<p>Buts : '.$dn['butB'].'</p>');
	               			echo('<br/>');
	               			echo('<ul>');
	               			foreach($b as $key=>$value){
	               				echo('<li>'.$value.'</li>');
	               			}
	               			echo('</ul>');
	               			echo('</div>');
	               	echo('</div>');
                	
                	
                	
                	
                	
                	
                	echo('<div id="ajout">');
                	echo('<h1>'.$dn['titre'].'</h1>');
                	echo('<p>Date : '.$dn['date'].'</p><br/><br/>');
                	echo('<p>Nombres de participants '.count($joueur).'/'.$dn['nb'].': </p>');
                	echo('<ul>');
                	foreach($joueur as $key=>$value){
                	$balle = '';
                		if($value[1] == true){
                			$balle =  '<img src="foot.gif" width="15px" height="15px"/>';
                			}
                		else{
                			$balle =  '';
                		}
	                	echo('<li>');if($dn['idu'] == $_COOKIE['iduA']){echo($value[2].' : ');}echo($value[0].' '.$balle.'</li>');
                	}
                	echo('</ul>');
                   	echo('<br/>');
                	echo('<div id="divid"></div>');
                	echo('<br/>');
                	echo('<div id="legend">');
                	echo('<p>* les équipes sont faites de maniere aléatoire à l\'ajout de la personne</p>');
                	echo('<br/>');
                	echo('<p>* <img src="foot.gif" width="15px" height="15px"/>  signifie que cette personne ramène la balle</p>');
                	echo('<br/>');
                	echo('<p>* par default l\'équipe A engage</p>');
                	echo('</div>');
                	echo('</div>');
                	
                	echo('</div>');
                	
                	
                }
                
                ?>       

            </div>
        
            </div>
            <div id="footer">
            © Foot Biiitchhh 
        </div>
    </body>
</html>



<script type="text/javascript">
</script>
