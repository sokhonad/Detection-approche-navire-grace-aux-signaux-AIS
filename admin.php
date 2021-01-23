<style type="text/css">
     /* Style pour l'exemple*/

     .row{
       background-color: #f5f5f0;
       border-radius: 4px;
     }
     .col-md-3{
       margin-left: 0px;
       line-height: 50px;
     }
     .col-md-4{
       margin-left: 0px;
       line-height: 50px;
     }
     .col-md-1{
       margin-left: 0px;
       line-height: 50px;
     }
     .col-md-2{
       margin-left: 0px;
       line-height: 50px;
     }

    </style>

<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1; dbname=projet', 'root', '');

    if(isset($_GET['confirme']) AND !empty($_GET['confirme']))
    {
      $confirme = (int) $_GET['confirme'];
      $req = $bdd->prepare('UPDATE users SET confirme = 1 WHERE id = ?');
      $req->execute(array($confirme));
    }

    $requser = $bdd->prepare("SELECT * FROM users");
    $executeIsOk = $requser->execute();

    $userinfo = $requser->fetchAll();

?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="web-fonts-with-css/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/bootstrap.min.js"></script>
  <title> Mon portfolio en ligne </title>
</head>
  <body>
    <!-- header -->
   <header class="container-fluid header">
      <div class="container">
        <a href="accueil.php" class="logo">Mon portfolio</a>
        <nav class="menu">
          <a href="accueil.php">Accueil</a>
          <a href="#">Profil</a>
          <a href="deconnexion.php"> <span class="glyphicon glyphicon-user"> Deconnexion </span></a>
        </nav>

      </div>
   </header>
   <!-- fin header -->

   <div class="container">
     <br /><br />
        <p> <center> <h4> Voici la liste complete des personnes inscrites </h4></center> </p><br />

         <div class="row">
           <div class="col-md-3"><h6><span style="color:#3498BD; line-height: 50px;">Nom</span></h6></div>
           <div class="col-md-3"><h6><span style="color:#3498BD; line-height: 50px;">Prenom</span></h6></div>
           <div class="col-md-4"><h6><span style="color:#3498BD; line-height: 50px;">Email</span></h6></div>
           <div class="col-md-2"><h6><span style="color:#3498BD; line-height: 50px;">Edition/Suppression</span></h6></div>
         </div>
         <?php foreach ($userinfo as $userinfo): ?>
             <div class="row">
               <div class="col-md-3"><h6><?= $userinfo['nom'] ?></h6></div>
               <div class="col-md-3"><h6><?= $userinfo['prenom'] ?></h6></div>
               <div class="col-md-4"><h6><?= $userinfo['email'] ?></h6></div>
               <div class="col-md-1"><?php if($userinfo['confirme'] == 0){ ?>  <a href="admin.php?confirme=<?= $userinfo['id'] ?>"><h6>Active</h6></a><?php } ?></div>
               <div class="col-md-1"> <a href="supprimer.php?numcontact=<?= $userinfo['id'] ?>"> <i class="fa fa-trash" style="font-size:15px; line-height: 50px;"></i></a></div>
             </div>
         <?php endforeach; ?>
         <br />
     <br /><br />
   </div>

 </body>
</html>
