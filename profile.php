<?php  
  session_start();

  //echo "session";

   include "connex.php";

   $strConnex = "host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";
  
    $ptrDB = pg_connect($strConnex);
    
    if (!$ptrDB)

    {
      print "<p>Erreur lors de la connexion ...</p>";
      
      exit;
    }

    $id = $_SESSION['id'];

    if (isset($_GET['idd']))

    {
      $id = $_GET['idd'];
    }

    $resultat = pg_query($ptrDB,"SELECT u_admin from utilisateur where u_id = ".$id);

    $row = pg_fetch_row($resultat);

    $admin = $row[0];
?>

<html>
  <head>
    <meta charset="utf-8">

    <?php  
    	echo "<title>".$_SESSION['nom']."</title>";
    ?>
    
    <link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.min.css">
    
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- header -->
   <header class="container-fluid header">
      
      <div class="container">
      
        <a href="accueil.php" class="logo">Port du Havre</a>
      
        <nav class="menu">
          
          <a href="accueil.php"> Accueil </a>
          
         <?php  
         	 //echo '<a href="alerte.php?id='.$_SESSION['id'].'"> Créer une alerte </a>';
         ?>
          
          <a href="connexion.php"><i class="fa fa-sign-in" style="font-size:15px"></i> Deconnexion </a>
        </nav>

      </div>
   </header>
   <!-- fin header -->
    <div class="container">
        <br /><br /><br />

        <?php if($admin == 1) { echo '<p class="row justify-content-end" ><a href="alerte.php?id='.$id.'"><button class="btn btn-primary mr-2">Ajouter une alerte</button></a> <a href="utilisateur.php"><button class="btn btn-primary">Voir les utilisateurs</button></a></p>';} else { echo '<a class="row justify-content-end" href="alerte.php?id='.$id.'"><button class="btn btn-primary">Ajouter une alerte</button></a>';} ?>
		    <?php

          $resultat = pg_query($ptrDB,"SELECT u_id, a_datedebut, a_seuil, n_nom, p_nom, a_id FROM alerte WHERE u_id = ".$id);

          //echo "SELECT u_id, a_datedebut, a_seuil, n_nom, p_nom, a_id FROM alerte WHERE u_id = ".(int)$_SESSION['id'];

          $i = 1;

          $af = "";

          while ($row = pg_fetch_row($resultat))

          {
            //if ($row[0] == $_SESSION['id'])

            {
                $final = "<tr>";

                $chaine = "";

                $chaine = $chaine.'<th scope="row">'.$i.'</th>';

                $chaine = $chaine.'<td class="text-center">'.trim(htmlspecialchars($row[3])).'</td>';

                $chaine = $chaine.'<td class="text-center">'.trim(htmlspecialchars($row[4])).'</td>';

                $chaine = $chaine.'<td class="text-center">'.trim(htmlspecialchars($row[2])).'</td>';

                $dates = explode("-",trim(htmlspecialchars($row[1])));

                $a_date = "".$dates[2]."-".$dates[1]."-".$dates[0];

                $chaine = $chaine.'<td class="text-center">'.$a_date.'</td>';

                $chaine = $chaine.'<td><td><a href="alerte.php?id='.$id.'&amp;a_id='.$row[5].'"><button class="btn btn-primary">Modifier</button></a></td><td><a href="supprimer.php?id='.$row[5].'"><button class="btn btn-primary">Supprimer</button></a></td></td>';

                $final = $final.$chaine."</tr>";

                $af = $af.$final;

                $i = $i + 1;
            }
          }
            
            if ($i != 1)

            {
               $ech1 = '<p> <h3 style="text-align:center">Alertes crées </h3> </p>
              <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-center">Numéro</th>
                  <th scope="col" class="text-center">Nom du navire</th>
                  <th scope="col" class="text-center">Nom du port</th>
                  <th scope="col" class="text-center">Seuille</th>
                  <th scope="col" class="text-center">date de debut</th>
                  <th scope="col" class="text-center" colspan="4">Option</th>
                </tr>
              </thead>
              <tbody>';
               echo $ech1.$af;
            }

            else

            {
              if (isset($_GET['idd']))

              {
                echo "<h1> Cet utilisateur n'a aucune alerte créée pour le moment </h1>";
              }

              else

              {
                echo "<h1> Vous avez aucune alerte créée pour le moment </h1>";
              }
            }
        ?>
		  </tbody>
		</table>
    </div>

  </body>
</html>