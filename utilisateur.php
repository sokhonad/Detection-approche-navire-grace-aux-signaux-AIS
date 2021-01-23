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

    $resultat = pg_query($ptrDB,"SELECT u_admin, u_super from utilisateur where u_id = ".$_SESSION['id']);

    $row = pg_fetch_row($resultat);

    $admin = $row[0];

    $super = $row[1];
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

        <?php if($admin == 1) { echo '<p class="row justify-content-end" ><a href="alerte.php?id='.$_SESSION['id'].'"><button class="btn btn-primary mr-2">Ajouter une alerte</button></a> <a href="utilisateur.php"><button class="btn btn-primary">Voir les utilisateurs</button></a></p>';} else { echo '<a class="row justify-content-end" href="alerte.php?id='.$_SESSION['id'].'"><button class="btn btn-primary">Ajouter une alerte</button></a>';} ?>
		    <?php

          if ($super == 1)

          {
            $resultat = pg_query($ptrDB,"SELECT u_nom, u_prenom, u_mail, u_profession, u_etat, u_id, u_admin FROM utilisateur WHERE u_super = 0");
          }

          else

          {
            $resultat = pg_query($ptrDB,"SELECT u_nom, u_prenom, u_mail, u_profession, u_etat, u_id FROM utilisateur WHERE u_admin = 0");
          }

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

                $chaine = $chaine.'<td class="text-center">'.trim(htmlspecialchars($row[0])).'</a></td>';

                $chaine = $chaine.'<td class="text-center">'.trim(htmlspecialchars($row[1])).'</a></td>';

                $chaine = $chaine.'<td class="text-center">'.trim(htmlspecialchars($row[2])).'</a></td>';

                $chaine = $chaine.'<td class="text-center">'.trim(htmlspecialchars($row[3])).'</a></td>';

                //$dates = explode("-",trim(htmlspecialchars($row[1])));

                /*$a_date = "".$dates[2]."-".$dates[1]."-".$dates[0];

                $chaine = $chaine.'<td class="text-center">'.$a_date.'</td>';*/

                $chaine = $chaine.'<td><td><a href = "profile.php?idd='.$row[5].'"><button class="btn btn-info">Consulter</button></a></td>';

                if($row[4] == 0)

                {
                  $chaine = $chaine.'<td><a href="activer.php?id='.$row[5].'"><button class="btn btn-info">Activer</button></a></td>';
                }

                else

                {
                  $chaine = $chaine.'<td><a href="activer.php?id='.$row[5].'"><button class="btn btn-danger">Desactiver</button></a></td>';
                }

                if ($super == 1)

                {
                  if ($row[6] == 0)

                  {
                    $chaine = $chaine.'<td><a href="activer.php?idd='.$row[5].'"><button class="btn btn-info">Nommer admin</button></a></td>';
                  }  

                  else

                  {
                    $chaine = $chaine.'<td><a href="activer.php?idd='.$row[5].'"><button class="btn btn-danger">denommer admin</button></a></td>';
                  }
                }

                else

                {
                  $chaine = $chaine.'<td><a href="activer.php?idd='.$row[5].'"><button class="btn btn-info">Nommer admin</button></a></td>';
                }
                $chaine = $chaine.'<td><a href="supprimer.php?idd='.$row[5].'"><button class="btn btn-danger">Supprimer</button></a></td></td>';

                $final = $final.$chaine."</tr>";

                $af = $af.$final;

                $i = $i + 1;

                //$_SESSION['idd'] = $row[5];
            }
          }
            
            if ($i != 1)

            {
               $ech1 = '<p> <h3 style="text-align:center"> Utilisateurs </h3> </p>
              <table class="table row justify-content-center">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-center">Numéro</th>
                  <th scope="col" class="text-center">Nom</th>
                  <th scope="col" class="text-center">Prénom</th>
                  <th scope="col" class="text-center">adresse maile</th>
                  <th scope="col" class="text-center">Professsion</th>
                  <th scope="col" class="text-center" colspan="8">Option</th>
                </tr>
              </thead>
              <tbody>';
               echo $ech1.$af;
            }

            else

            {
              echo "<h1> Vous avez aucune alerte créée pour le moment </h1>";
            }
        ?>
		  </tbody>
		</table>
    </div>

  </body>
</html>