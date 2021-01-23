<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      // Mettez le code Jquery ici.
    </script>
  </head>
  <body>  
  <form method="POST" onsubmit="return sendData();">
     <input type="text" name="name" id="name">
     <input type="text" name="age" id="age">
     <input type="submit" name="submit_form" value="Submit">
  </form>
  <div id="res" ></div>
  </body>
</html>


function sendData()
{
  var name = document.getElementById("name").value;
  var age = document.getElementById("age").value;
  $.ajax({
    type: 'post',
    url: 'insert.php',
    data: {
      name:name,
      age:age
    },
    success: function (response) {
      $('#res').html("Vos données seront sauvegardées");
    }
  });
    
  return false;
}

// Le fichier insert.php
<?php
  if( isset( $_POST['name'] ) )
  {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $con = mysqli_connect("localhost","root"," ","my_db");
    $insert = " INSERT INTO user VALUES( '$name','$age' ) ";
    mysqli_query($con, $insert); 
  }
?>

<select id="countrySelect" name="country"  onchange="check();getIndicateurPays();">





function getIndicateurPays(){
  var urlAjx       = 'cheminverstonfichier/indicatifPays.ajx.php';
  var pays   = $("#countrySelect").val();

  var data = {pays:pays};
 
   $.ajax({ 
     url:      urlAjx,
     dataType: "json",
     type:     "POST",
     data:     data,
     async:    false,
     success:  function(reponse){
                $("#tel_struct").val(reponse);
               },
     error:    function(jqXHR, textStatus){
               var error = formatErrorMessage(jqXHR, textStatus);
               alert('error :' + error);
              }
    }); 
    
 }
  
  
  function formatErrorMessage(jqXHR, exception) {
    if (jqXHR.status === 0) {
        return ('Not connected.\nPlease verify your network connection.');
    } else if (jqXHR.status == 404) {
        return ('The requested page not found. [404]');
    } else if (jqXHR.status == 500) {
        return ('Internal Server Error [500].');
    } else if (exception === 'parsererror') {
        return ('Requested JSON parse failed.');
    } else if (exception === 'timeout') {
        return ('Time out error.');
    } else if (exception === 'abort') {
        return ('Ajax request aborted.');
    } else {
        return ('Uncaught Error.\n' + jqXHR.responseText);
    }
}


// ici tu inclus ton fichier de connexion à ta BDD


// ensuite :

// récupération des variables POST
$pays = isset($_POST['pays'])?$_POST['pays']:NULL;

if($pays){
// ici ta requete:
$sql = "SELECT * FROM tatable WHERE pays='$pays'";

// execution de ta requete :
$result = ------
}

// Puis renvoie des données vers l'ajax :
echo json_encode($result);