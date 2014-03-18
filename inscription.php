<!doctype html>
<?php
if(isset($_COOKIE['nomA'])){
	   header('Location: index.php'); 
}

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="revisit-after" content="0 days"/>
        <title>Foot Heriot</title>
        <link rel="stylesheet" href="css.css" type="text/css" media="screen" charset="utf-8"/>
        <script type="text/javascript" src="jquery-1.js"></script>
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
 
                <div id="element">
                <h1>Inscription</h1>
                <br/>
                <br/>
                <form action="inscriptionC.php" method="post">
                <input type="text" name="nom" class="nom" placeholder="Mon prenom"/> <label for="nom">
                <br/>
                <br/>
                <input type="password" name="pass" class="titre" placeholder="Mot de passe"/> <label for="nom">
                <br/>
                <br/>
                 <input name="app" type="submit"  value="S'inscrire !" />
                </form>
                
              
                
                   
                </div>

            </div>
        
            </div>
            <div id="footer">
            © Foot Biiitchhh 
        </div>
    </body>
</html>