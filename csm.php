<html>
<body>
<br />
    <p> <h3 style="margin-left:15px">Creation alerte</h3> </p>
    <br>
        <form class="col-lg-6" action="" method="get">
      		<div class="form-group">

      			<label for="3">a_dateDebut *</label>
      			<input type="text" name="a_dateDebut" class="form-control" >

      		</div>
          <div class="form-group">

      			<label for="3">a_seuil *</label>
      			<input type="text" name="a_seuil" class="form-control" >

      		</div>
      		<div class="form-group">

      			<label for="3">u_id *</label>
      			<input type="text" name="u_id" class="form-control" >

      		</div>
          <div class="form-group">

            <label for="3">n_id *</label>
            <input type="text" name="n_id" class="form-control" >

          </div>
          <div class="form-group">

            <label for="3">p_id *</label>
            <input type="text" name="p_id" class="form-control" >

          </div>
      		

      		<button type="submit" name="creer" class="btn btn-primary">creer alerte</button>

      	</form>
        <p>Etes vous deja inscrit ?<a href="connexion.php"> Se connecter</a></p>
      </br>
    </div>



  <!-- ************************************************** -->
  <br />
    <p> <h3 style="margin-left:15px">modification alerte</h3> </p>
    <br>
        <form class="col-lg-6" action="" method="get">
          <div class="form-group">
            <div class="form-group">

            <label for="3">a_id *</label>
            <input type="text" name="a_id" class="form-control" >

          </div>

            <label for="3">a_dateDebut *</label>
            <input type="text" name="a_dateDebut" class="form-control" >

          </div>
          <div class="form-group">

            <label for="3">a_seuil *</label>
            <input type="text" name="a_seuil" class="form-control" >

          </div>
          <div class="form-group">

            <label for="3">u_id *</label>
            <input type="text" name="u_id" class="form-control" >

          </div>
          <div class="form-group">

            <label for="3">n_id *</label>
            <input type="text" name="n_id" class="form-control" >

          </div>
          <div class="form-group">

            <label for="3">p_id *</label>
            <input type="text" name="p_id" class="form-control" >

          </div>
          

          <button type="submit" name="modifier" class="btn btn-primary">modifier alerte</button>

        </form>
        <p>Etes vous deja inscrit ?<a href="connexion.php"> Se connecter</a></p>
      </br>
    </div>

    <!--  -->
    <br />
    <p> <h3 style="margin-left:15px">supprimer utilisateur </h3> </p>
    <br>
        <form class="col-lg-6" action="" method="get">
          <div class="form-group">
            <div class="form-group">

            <label for="3">u_id *</label>
            <input type="text" name="u_id" class="form-control" >

          </div>
          <button type="submit" name="supprimer" class="btn btn-primary">supprimer</button>
          </form>
        
        <p>Etes vous deja inscrit ?<a href="connexion.php"> Se connecter</a></p>
      </br>
    </div>
    <!--  -->
    <br />
    <p> <h3 style="margin-left:15px">supprimer Alerte </h3> </p>
    <br>
        <form class="col-lg-6" action="" method="get">
          <div class="form-group">
            <div class="form-group">

            <label for="3">a_id *</label>
            <input type="text" name="a_id" class="form-control" >

          </div>
          <button type="submit" name="supprimer_a" class="btn btn-primary">supprimer</button>

        </form>
        <p>Etes vous deja inscrit ?<a href="connexion.php"> Se connecter</a></p>
      </br>
    </div>
  </body>
</html>

<?php
include "connex.php";
$strConnex = "host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";
$ptrDB = pg_connect($strConnex);
if (!$ptrDB) {
  print "<p>Erreur lors de la connexion ...</p>";
  exit;
}
if(isset($_GET['creer'])) {
    $reqAjout = "INSERT INTO alerte (a_dateDebut , a_seuil, u_id, n_id, p_id)
    VALUES ('".$_GET['a_dateDebut']."',".$_GET['a_seuil']."," .$_GET['u_id'].",".$_GET['n_id'].",".$_GET['p_id'].")";      
     echo $reqAjout;
    $ptrQueryAjout = pg_query($ptrDB, $reqAjout);
    if ($ptrQueryAjout) {
       echo"<p>alerte a ete reusi avec succes</p>";
    }
    else{
      print "<p>Echec de l'opération</p>";
    }
  }    

  // if(isset($_GET['modifier'])) {
  //   $i = $_GET['a_id']; $n = $_GET['a_dateDebut']; $c = $_GET['a_seuil'];
  //   $a = $_GET['n_id']; $cp = $_GET['p_id']; 
  //   $reqModifie = "UPDATE alerte
  //   SET (a_dateDebut , a_seuil, n_id, p_id) = ('$n', $c, $a, $cp) WHERE a_id = $i";
  //   $ptrQueryModifie = pg_query($ptrDB, $reqModifie);
  //   //echo $reqModifie;
  //   if ($ptrQueryModifie) {
  //      echo"<p>alerte a ete modifier avec succes</p>";
  //   }
  //   else{
  //     print "<p>Echec de l'opération</p>";
  //   }
  // }
  if (isset($_GET["supprimer"])) {
    $reqSupprime = "DELETE FROM utilisateur WHERE u_id =". $_GET['u_id'];
    //echo "$reqSupprime";
    $ptrQuerySuppprime = pg_query($ptrDB, $reqSupprime);
    if ($ptrQuerySuppprime) {
       echo"<p>utilisateur a ete supprimer  avec succes</p>";
    }
    else{
      print "<p>Echec de l'opération</p>";
    }
   } 

   // 
   if (isset($_GET["supprimer_a"])) {
    $reqSupprime = "DELETE FROM alerte WHERE a_id =". $_GET['a_id'];
    //echo "$reqSupprime";
    $ptrQuerySuppprime = pg_query($ptrDB, $reqSupprime);
    if ($ptrQuerySuppprime) {
       echo"<p>alerte a ete supprimer  avec succes</p>";
    }
    else{
      print "<p>Echec de l'opération</p>";
    }
   } 

function afficheTab($tab){
  include "connex.php";
  $strConnex = "host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";
  $ptrDB = pg_connect($strConnex);
  if (!$ptrDB) { echo("pb de connection"); }
  else {
    $requete = "select * from $tab";
    $ptrQuery = pg_query($ptrDB,$requete);
    echo "<table border='1' >";
    if ($ptrQuery) { 
      while($ligne = pg_fetch_row($ptrQuery)) {
        echo "<tr>\n";
          echo "<td>";
          echo $ligne[0]." ";
        for ($j=1;$j<count($ligne);$j++) {
          echo "<td>";
          echo $ligne[$j]." ";
          echo "</td>";
        }
         echo "</tr>";
      }
      echo "</table>";
    }
  }
}
echo"<br />
      <p> <h3> table utilisateur</h3> </p>
     <br>";
afficheTab("utilisateur");
echo"<br />
      <p> <h3> table Alerte</h3> </p>
     <br>";
afficheTab("alerte");
echo"<br />
      <p> <h3> table Navire</h3> </p>
     <br>";
afficheTab("navire");
echo"<br />
      <p> <h3> table Port</h3> </p>
     <br>";
afficheTab("port");

?>