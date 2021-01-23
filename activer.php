<?php

	/*

		bout de code permettant d'activer un compte, de seactiver, de nommer un utilsateur comme admin et le denommer
	*/

	include("connex.php");

	if (isset($_GET['id']))

	{
		$strConnex = "host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";
  
   		 $ptrDB = pg_connect($strConnex);
    
	    if (!$ptrDB)

	    {
	      print "<p>Erreur lors de la connexion ...</p>";
	      
	      exit;
	    }

	    $reqte = "SELECT u_etat, u_mail, u_nom, u_prenom FROM utilisateur WHERE u_id =".$_GET['id'];

	    $result = pg_query($ptrDB,$reqte);

	    $row = pg_fetch_row($result);

	    if ($row[0] == 0)

	    {
	    	$reqModifie = "UPDATE utilisateur SET u_etat = 1 WHERE u_id =".$_GET['id'];
      
        	$ptrQueryModifie = pg_query($ptrDB, $reqModifie);

        	$from = "projetl2mis@gmail.com";
 
            $to = $row[1];
                                 
            $subject = "Validation de votre compte";

            ob_start();

            require('activation.php');
                                 
       		$message = ob_get_clean();
                                 
            $headers = 'NIME-Version : 1.0'."\r\n";

            $headers = 'Content-type : text/html; charset = iso-8859-1'."\r\n";
                                  
            mail($to,$subject,$message,$headers);

        	header("Location:utilisateur.php");
	    }

	    else

	    {
	    	$reqModifie = "UPDATE utilisateur SET u_etat = 0 WHERE u_id =".$_GET['id'];
      
        	$ptrQueryModifie = pg_query($ptrDB, $reqModifie);

        	header("Location:utilisateur.php");	
	    }

        
	}

	else

	{
		if (isset($_GET['idd']))

		{
			$strConnex = "host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";
  
   			$ptrDB = pg_connect($strConnex);
    
		    if (!$ptrDB)

		    {
		      print "<p>Erreur lors de la connexion ...</p>";
		      
		      exit;
		    }

		    $reqte = "SELECT u_admin, u_mail, u_nom, u_prenom FROM utilisateur WHERE u_id =".$_GET['idd'];

		    $result = pg_query($ptrDB,$reqte);

		    $row = pg_fetch_row($result);

		    if ($row[0] == 0)

		    {

		    	$message = "Bonjour cher administrateur, \n, Monsieur ".strtoupper($row[2])." ".ucfirst($row[3])." vient d'être nommé administrateur.";

                $subject = "Changement de statut d'un utilisateur";

                $from = "projetl2mis@gmail.com";

                $headers = "From:".$from;

                $reqAjout = pg_query($ptrDB,"SELECT u_mail FROM utilisateur WHERE u_admin = 1");

                while ($row_a = pg_fetch_row($reqAjout))

                {
                   $m = mail($row_a[0],$subject,$message,$headers);

                }

		    	$reqModifie = "UPDATE utilisateur SET u_admin = 1 WHERE u_id =".$_GET['idd'];
	      
	        	$ptrQueryModifie = pg_query($ptrDB, $reqModifie);

	        	$from = "projetl2mis@gmail.com";
	 
	            $to = $row[1];
	                                 
	            $subject = "Changement de statut";
	                                 
	       		ob_start();

	            require('activation2.php');
	                                 
	       		$message = ob_get_clean();
	                                 
	            $headers = 'NIME-Version : 1.0'."\r\n";

	            $headers = 'Content-type : text/html; charset = iso-8859-1'."\r\n";
	                                  
	            mail($to,$subject,$message,$headers);



	        	header("Location:utilisateur.php");
		    }

		    else

		    {
		    	$reqModifie = "UPDATE utilisateur SET u_admin = 0 WHERE u_id =".$_GET['idd'];
	      
	        	$ptrQueryModifie = pg_query($ptrDB, $reqModifie);

	        	$from = "projetl2mis@gmail.com";
	 
	            $to = $row[0];
	                                 
	            $subject = "Changement de statut";
	                                 
	       		$message = 'Bonjour '.strtoupper($row[2]).' '.ucfirst($row[3])."\n".'Nous vous informons que vous n\'êtes plus un administrateur du site le port du Havre';
	                                 
	            $headers = "From:".$from;
	                                  
	            mail($to,$subject,$message,$headers);

	            $message = "Bonjour cher administrateur, \n, Monsieur ".strtoupper($row[2])." ".ucfirst($row[3])." n'est plus un administrateur.";

                $subject = "Changement de statut d'un utilisateur";

                $from = "projetl2mis@gmail.com";

                $headers = "From:".$from;

                $reqAjout = pg_query($ptrDB,"SELECT u_mail FROM utilisateur WHERE u_admin = 1");

                while ($row_a = pg_fetch_row($reqAjout))

                {
                   $m = mail($row_a[0],$subject,$message,$headers);

                }

	        	header("Location:utilisateur.php");	
		    }
		}

		else

		{
			header("Location:utilisateur.php");
		}
	}
?>