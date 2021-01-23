<?php  

	session_start();

	include "connex.php";

   $strConnex = "host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";
  
    $ptrDB = pg_connect($strConnex);
    
    if (!$ptrDB)

    {
      print "<p>Erreur lors de la connexion ...</p>";
      
      exit;
    }

	if (isset($_GET['id'])) {
    $reqSupprime = "DELETE FROM alerte WHERE a_id =". $_GET['id'];
    //echo "$reqSupprime";
    $ptrQuerySuppprime = pg_query($ptrDB, $reqSupprime);
    if ($ptrQuerySuppprime) {
       echo"<p>utilisateur a ete supprimer  avec succes</p>";

       echo '<p><a href="profile.php?id='.$_SESSION['id'].'">Retour</a></p>';
    }
    else{
      print "<p>Echec de l'opération</p>";
    }
   }

   if ($_GET['idd'])

   {
      $reqSupprime = "DELETE FROM utilisateur WHERE u_id =". $_GET['idd'];
    echo "$reqSupprime";
    $ptrQuerySuppprime = pg_query($ptrDB, $reqSupprime);
    if ($ptrQuerySuppprime) {
       echo"<p>utilisateur a ete supprimer  avec succes</p>";

       echo '<p><a href="utilisateur.php">Retour</a></p>';
    }
    else{
      print "<p>Echec de l'opération</p>";
    }
   } 
?>