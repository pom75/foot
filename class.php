<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="revisit-after" content="0 days"/>
        <title>Foot Heriot</title>
        <link rel="stylesheet" href="css.css" type="text/css" media="screen" charset="utf-8"/>
        <style>
table,td,th
{
border:0px solid black;
}
table
{
width:50%;
}
th
{
height:20px;
}
</style>
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
                //COnnexion
                mysql_select_db('locationfaabc', $db);
                
                //Requette
                $sql = "( SELECT u.idu , u.nom , p.idp FROM PARTIE1 p ,PJ pj,USER1 u WHERE pj.idu = u.idu AND p.butA > p.butB AND pj.equipe = 0 AND p.idp = pj.idp) UNION (SELECT u.idu , u.nom , p.idp FROM PARTIE1 p ,PJ pj,USER1 u WHERE pj.idu = u.idu AND p.butA < p.butB AND pj.equipe = 1 AND p.idp = pj.idp )";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
                
                
                //Var
                $listeJ = array();
                
                
                //Affcihage
                while ($dn = mysql_fetch_assoc($req)) {
                        if(isset($listeJ[$dn['idu']])){
	                        $listeJ[$dn['idu']]['pts']+=3;
                        }else{
	                        $listeJ[$dn['idu']]['pts'] = 3;
	                        $listeJ[$dn['idu']]['nom'] = $dn['nom'];
                        }
                	
                }
                
                //Requette
                $sql = "( SELECT u.idu , u.nom , p.idp FROM PARTIE1 p ,PJ pj,USER1 u WHERE pj.idu = u.idu AND p.butA > p.butB AND pj.equipe = 1 AND p.idp = pj.idp) UNION (SELECT u.idu , u.nom , p.idp FROM PARTIE1 p ,PJ pj,USER1 u WHERE pj.idu = u.idu AND p.butA < p.butB AND pj.equipe = 0 AND p.idp = pj.idp )";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
                
                //Affcihage
                while ($dn = mysql_fetch_assoc($req)) {
                        if(isset($listeJ[$dn['idu']])){
	                        $listeJ[$dn['idu']]['pts']+=1;
                        }else{
	                        $listeJ[$dn['idu']]['pts'] = 1;
	                        $listeJ[$dn['idu']]['nom'] = $dn['nom'];
                        }
                	
                }
                	$i = 0;
                	?>
                	<table>
                	<tr><td>Position</td><td>Nom</td><td>Points</td></tr>
                	<?php
                	array_multisort($listeJ,SORT_DESC);
                	foreach($listeJ as $key => $val){
                	$i++;
                	echo('<tr><td>'.$i.'</td><td>'.$val['nom'].'</td><td>'.$val['pts'].'</td></tr>');	
                	}
                ?>       
                	</table>
                	<br/>
                	<br/>
                	<br/>
                	<p> Match gagné : 3 pts</p>
                	<p> Match perdu : 1 pts</p>
            </div>
        
            </div>
            <div id="footer">
            © Foot Biiitchhh 
        </div>
    </body>
</html>



