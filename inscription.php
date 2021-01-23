<?php
  include "connex.php";

  if(isset($_POST['forminscription']))
  
  {
    $strConnex = "host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";
  
    $ptrDB = pg_connect($strConnex);
    
    if (!$ptrDB)

    {
      print "<p>Erreur lors de la connexion ...</p>";
      
      exit;
    }
    
    $nom = htmlspecialchars($_POST['nom']);

    $prenom = htmlspecialchars($_POST['prenom']);

    $email = htmlspecialchars($_POST['email']);

    $profession = htmlspecialchars($_POST['profession']);

    $mdp = sha1($_POST['mdp']);

    $mdp2 = sha1($_POST['mdp2']);

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']))

    {
        $nomlength = strlen($nom);

        $prenomlength = strlen($prenom);

        $emaillength = strlen($email);

        $professionlength = strlen($profession);

        if($nomlength <= 255)

        {
            if($prenomlength <= 255)

            {
                if($emaillength <= 255)

                {
                    if ($professionlength <= 255)

                    {
                      if(filter_var($email, FILTER_VALIDATE_EMAIL))

                        {
                          $reqmail = pg_query($ptrDB,"SELECT u_mail FROM utilisateur");

                          //$reqmail->execute(array($email));

                          //$mailexist = $reqmail->rowCount();

                          $mailexist = true;

                          while ($row = pg_fetch_row($reqmail))

                          {
                             

                              if ((string)$email === (string)$row[0])

                              {
                                $mailexist = false;
                              }

                          }

                            if($mailexist)

                            {
                                if($mdp == $mdp2)

                                {
                                  $d = 1;

                                  $reqAjout = "INSERT INTO utilisateur (u_nom,u_prenom,u_mail,u_profession,u_mdp) VALUES ('".$nom."','".$prenom."','" .$email."','".$profession."','".$mdp."')"; 
                                   //echo $reqAjout;
                                  
                                  $ptrQueryAjout = pg_query($ptrDB, $reqAjout);

                                  if ($ptrQueryAjout)

                                  {
                                     $erreur2 = "Votre compte a bien ete créé. Vous recevrez un mail après validation de votre compte par un administrateur";

                                     $from = "projetl2mi@gmail.com";
 
                                     $to = $email;
                                 
                                     $subject = "Confirmation d'inscription";
                                 
                                     $message = "Bonjour ".strtoupper($nom)." ".ucfirst($prenom).",\n Vous venez de créer un compte sur le site le port du Havre. Vous recevez ce message en guise de confirmation. Quand un administrateur aura validé votre compte, vous recevrez de nouveau un message de validation";
                                 
                                     $headers = "From:".$from;
                                  
                                     $m = mail($to,$subject,$message,$headers);

                                     if ($m)

                                      {
                                        //$erreur2 = $erreur2." non mail 1";
                                      }

                                     $message = "Bonjour cher administrateur, \n, Monsieur ".strtoupper($nom)." ".ucfirst($prenom)." vient de s'inscrire sur le site, il est en attente d'activation de son compte par un administrateur.";

                                     $subject = "Nouvelle inscription";

                                     $from = "projetl2mis@gmail.com";

                                     $headers = "From:".$from;

                                     $reqAjout = pg_query($ptrDB,"SELECT u_mail FROM utilisateur WHERE u_admin = 1");

                                     while ($row = pg_fetch_row($reqAjout))

                                     {
                                       $m = mail($row[0],$subject,$message,$headers);

                                     }
                                  }

                                  else

                                  {
                                    $erreur2 = "Une erreur est survenue. Merci de ressayer l'inscription <a href=\"inscription.php\">S'inscrire</a>";
                                  }
                                }

                                else

                                {
                                  $erreur = "Vos mot de passe ne correspondent pas !";
                                }
                            }

                            else

                            {
                               $erreur = "Cet adresse mail est deja utilise";
                            }
                        }

                        else

                        {
                          $erreur = "Votre adresse mail n'est pas valide";
                        }
                    }

                    else

                    {
                      $erreur = "Votre profession ne doit pas depasser 255 caracteres";
                    }
                }

                else

                {
                  $erreur = "Votre email ne doit pas depasser 255 caracteres";
                }
            }

            else

            {
              $erreur = "Votre prenom ne doit pas depasser 255 caracteres";
            }
        }

        else

        {
          $erreur = "Votre nom ne doit pas depasser 255 caracteres";
        }
    }

    else

    {

      $erreur = " Attention tous les champs doivent etre renseigner";
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
      <p> <h3 style="margin-left:15px">Inscription</h3> </p>
      <br>
          <form class="col-lg-6" action="" method="POST">
            <div class="form-group">

              <label for="3">Nom *</label>
              <input type="text" name="nom" class="form-control" >

            </div>
            <div class="form-group">

              <label for="3">Prenom *</label>
              <input type="text" name="prenom" class="form-control" >

            </div>
            <div class="form-group">

              <label for="3">Email *</label>
              <input type="text" name="email" class="form-control" >

            </div>
            <div class="form-group">

              <label for="3">Profession *</label>
              <input type="text" name="profession" class="form-control" >

            </div>
            <div class="form-group">

              <label for="3">Mot de passe *</label>
              <input type="password" name="mdp" class="form-control">

            </div>
            <div class="form-group">

              <label for="3">Confirmer votre mot de passe *</label>
              <input type="password" name="mdp2" class="form-control">

            </div>

            <button type="submit" name="forminscription" class="btn btn-primary">S'inscrire</button>

          </form>
          <p>Etes vous deja inscrit ?<a href="connexion.php"> Se connecter</a></p>
        </br>
    </div>

  </body>
</html>


<?php
/*include "connex.php";
$strConnex = "host=$dbHost port=5432 dbname=$dbName user=$dbUser password=$dbPassword";
$ptrDB = pg_connect($strConnex);
if (!$ptrDB) {
  print "<p>Erreur lors de la connexion ...</p>";
  exit;
}
if(isset($_POST['forminscription'])) {
    $reqAjout = "INSERT INTO utilisateur (u_nom,u_prenom,u_mail,u_profession,u_mdp) VALUES ('".$_POST['nom']."','".$_POST['prenom']."','" .$_POST['email']."','".$_POST['profession']."','".$_POST['mdp']."')";      
     echo $reqAjout;
    $ptrQueryAjout = pg_query($ptrDB, $reqAjout);
    if ($ptrQueryAjout) {
       echo"<p>inscription a ete reusi avec succes</p>";
    }
    else{
      print "<p>Echec de l'opération</p>";
    }
  } */   

?>

