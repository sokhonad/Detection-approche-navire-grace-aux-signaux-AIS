<?php


  session_start();

  //echo "session";

  $a_id = 0;

   include "connex.php";

   $strConnex = "host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";
  
    $ptrDB = pg_connect($strConnex);
    
    if (!$ptrDB)

    {
      print "<p>Erreur lors de la connexion ...</p>";
      
      exit;
    }

    if (isset($_GET['a_id']))

    {
      $a_id = (int)$_GET['a_id'];

      echo "yes";
    }

  if(isset($_POST['forminscription']))
  
  {
    
    $n_nom = htmlspecialchars($_POST['n_nom']);

    $p_nom = htmlspecialchars($_POST['p_nom']);

    $a_date = htmlspecialchars($_POST['a_date']);

    $a_seuil = htmlspecialchars($_POST['a_seuil']);

    if(!empty($_POST['n_nom']) && !empty($_POST['p_nom']) && !empty($_POST['a_date']) && !empty($_POST['a_seuil']))

    {
      //echo "$a_date";

      if (isset($_GET['a_id']))

      {

        $reqModifie = "UPDATE alerte SET (a_datedebut , a_seuil, n_nom, p_nom) = ('".$a_date."',".$a_seuil.",'".$n_nom."','".$p_nom."') WHERE a_id =".$_GET['a_id'];
      
        $ptrQueryModifie = pg_query($ptrDB, $reqModifie);
      }

      else

      {
        $alerte = "INSERT INTO alerte(a_datedebut ,a_seuil ,u_id ,n_nom,p_nom) VALUES ('".$a_date."',".$a_seuil.",".$_GET['id'].",'".$n_nom."','".$p_nom."')";

        $resultat = pg_query($ptrDB,$alerte);
      }

      $erreur2 = "Votre alerte a bien ete créée .<a href=\"profile.php?id=".$_SESSION['id']."\">Se connecter</a>";

    }

    else

    {
      $erreur = "Veuillez remplir tous les champs";
    }

  }

    ?>

  <html>
  <head>
    <meta charset="utf-8">

    <title> Mon portfolio en ligne </title>
    
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
          
          <a href="admin.php"> Administration </a>
          
          <a href="connexion.php"><i class="fa fa-sign-in" style="font-size:15px"></i> Connexion </a>
        </nav>

      </div>
   </header>
   <!-- fin header -->
    <div class="container">
        <br /><br />
        <?php if (isset($erreur2)): ?>
            <div class="alert alert-success">
                <?php echo '<i class="fa fa-check-square" style="font-size:20px"></i>  '  .$erreur2; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($erreur)): ?>
            <div class="alert alert-danger">
                <?php echo '<i class="fa fa-exclamation-triangle" style="font-size:18px"></i>  ' .$erreur; ?>
            </div>
        <?php endif; ?>
      <br />
      <p> <h3 style="margin-left:15px">Création d'alerte</h3> </p>
      <br>
          <form class="col-lg-6" action="" method="POST">
            <div class="form-group">

              <label for="3">Nom du navire *</label>
              <select class="form-control" name="n_nom">

                <?php  

                    $alerte = pg_query($ptrDB,"SELECT n_nom from navire");

                    $ptrQueryModifie;

                    $row_alerte =  array();

                    if ($a_id != 0)

                    {
                      $ptrQueryModifie = pg_query($ptrDB,"SELECT * from alerte WHERE a_id =".$a_id);

                      echo "$ptrQueryModifie";

                      $row_alerte = pg_fetch_row($ptrQueryModifie);
                    }

                    else 

                    {
                      echo "no no yes";
                    }

                    while ($row = pg_fetch_row($alerte))

                    {
                      $nom_navire1 = (string)$row_alerte[4];

                      if ($a_id != 0)

                      {
                        echo '<option selected>'.$nom_navire1.'</option>'."\n";

                        echo "\n"."<option>".$row[0]."</option>"."\n";

                        $a_id = 0;
                      }
                      else

                      {
                        echo "\n"."<option>".$row[0]."</option>"."\n";
                      }
                    }
                ?>
                
              </select>

            </div>

            <div class="form-group">

              <label for="3">Nom du port *</label>
              <select class="form-control" id="p_n_id" name="p_nom">

                <?php  

                	//$IdP_pays = $_POST['id_pays'];

                    $alerte = pg_query($ptrDB,"SELECT p_nom from port");

                    //var_dump($alerte);

                    $ptrQueryModifie;

                    $row_alerte =  array();

                    if (isset($_GET['a_id']))

                    {
                      $a_id = (int)$_GET['a_id'];

                      //echo "yes";
                    }

                    if ($a_id != 0)

                    {
                      $ptrQueryModifie = pg_query($ptrDB,"SELECT * from alerte WHERE a_id =".$a_id);

                      echo $ptrQueryModifie;

                      $row_alerte = pg_fetch_row($ptrQueryModifie);
                    }

                    while ($row = pg_fetch_row($alerte))

                    {
                      $nom_navire1 = (string)$row_alerte[5];

                      if ($a_id != 0)

                      {
                        echo '<option selected>'.$nom_navire1.'</option>'."\n";

                        echo "\n"."<option>".$row[0]."</option>"."\n";

                        $a_id = 0;
                      }
                      else

                      {
                        echo "\n"."<option>".$row[0]."</option>"."\n";
                      }
                    }
                ?>
                
              </select>
            </div>
            <div class="form-group">

              <label for="3">Date de début de l'alerte *</label>
              <input type="date" name="a_date" class="form-control" <?php if (isset($_GET['a_id'])) {echo 'value ="'.$row_alerte[1].'"';}  ?> >

            </div>
            <div class="form-group">

              <label for="3">Seuil de déclenchement ( distance du navire par rapport au port en kilomètre) *</label>
              <input type="number" name="a_seuil" class="form-control" <?php if (isset($_GET['a_id'])) {echo 'value ="'.$row_alerte[2].'"';}  ?>>

            </div>
            <button type="submit" name="forminscription" class="btn btn-primary"><?php if(isset($_GET['a_id'])) {echo "Modiifer";} else { echo "Créer";} ?></button>
           </form>
          <!--p>Etes vous deja inscrit ?<a href="connexion.php"> Se connecter</a></p-->
        </br>
    </div>

  </body>
</html>