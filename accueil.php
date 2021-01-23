<?php
 
	/*if (isset($_POST['submit_msg']))

	{
		include "connex.php";

		$strConnex = "host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";
	  
	    $ptrDB = pg_connect($strConnex);
	    
	    if (!$ptrDB)

	    {
	      print "<p>Erreur lors de la connexion ...</p>";
	      
	      exit;
	    }

	 	
	 	$subject = htmlspecialchars($_POST['subject']);

	 	$email = htmlspecialchars($_POST['email']);

	 	$message = htmlspecialchars($_POST['message'])."\n Le mail de la personne est : ".$email;

	 	$from = "projetl2mis@gmail.com";

        $headers = "From:".$from;

        $reqAjout = pg_query($ptrDB,"SELECT u_mail FROM utilisateur WHERE u_admin = 1");

        while ($row = pg_fetch_row($reqAjout))

        {
            $m = mail($row[0],$subject,$message,$headers);

        }

        $message = "Votre mail a bien été reçu. Nou reviendrons vers vous bientot";

        mail($email,"Accusé de reception", $message);

        $erreur2 = "Votre message a été Envoyé";
	}*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Port Du Havre</title>

  <!-- Bootstrap -->
  <link href="css1/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css1/font-awesome.min.css">
  <link rel="stylesheet" href="css1/animate.css">
  <link rel="stylesheet" href="css1/overwrite.css">
  <link href="css1/animate.min.css" rel="stylesheet">
  <link href="css1/style.css" rel="stylesheet" />

</head>

<body>
  <header id="header">
    <nav class="navbar navbar-fixed-top" role="banner">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
          <a class="navbar-brand" href="index.html">Port du Havre</a>
        </div>
        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#header">Accueil</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="#our-team">A propos</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
      <!--/.container-->
    </nav>
    <!--/nav-->
  </header>
  <!--/header-->

  <?php if (isset($erreur2)): ?>
            <div class="alert alert-success">
                <?php echo '<i class="fa fa-check-square" style="font-size:20px"></i>  '  .$erreur2; ?>
            </div>
        <?php endif; ?>
  <div class="slider">
    <div id="about-slider">
      <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators visible-xs">
          <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-slider" data-slide-to="1"></li>
          <li data-target="#carousel-slider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="item active">
            <img src="img/ban5.jpg" class="img-responsive" alt="">
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                <h2><span>Grand Port Maritime du Havre</span></h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                <p>Site officiel de gestion des alertes du port du Havre</p>
              </div>
              <!--div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
                <form class="form-inline">
                  <div class="form-group">
                    <button type="livedemo" name="purchase" class="btn btn-primary btn-lg" required="required"><a href="connexion.php" style="color : white;">Se connecter</a></button>
                  </div>
                  <div class="form-group">
                    <button type="getnow" name="subscribe" class="btn btn-primary btn-lg" required="required"><a href="inscription.php" style="color : #3498BD;">S'inscrire</a></button>
                  </div>
                </form>
              </div-->
            </div>
          </div>

          <div class="item">
            <img src="img/ban15.jpg" class="img-responsive" alt="">
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">
                <h2>Gestion des alertes</h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.3s">
                <p>Bienvenue sur le portail professionnel du Grand Port Maritime du Havre</p>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">
                <!--form class="form-inline">
                  <div class="form-group">
                    <button type="livedemo" name="purchase" class="btn btn-primary btn-lg" required="required"><a href="connexion.php" style="color : white;">Se connecter</a></button>
                  </div>
                  <div class="form-group">
                    <button type="getnow" name="subscribe" class="btn btn-primary btn-lg" required="required"><a href="inscription.php" style="color : #3498BD;">S'inscrire</a></button>
                  </div>
                </form-->
              </div>
            </div>
          </div>
          <div class="item">
            <img src="img/ban11.jpg" class="img-responsive" alt="">
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                <h2>Le port du Havre</h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                <p></p>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
                <!--form class="form-inline">
                  <div class="form-group">
                    <button type="livedemo" name="purchase" class="btn btn-primary btn-lg" required="required"><a href="connexion.php" style="color : white;">Se connecter</a></button>
                  </div>
                  <div class="form-group">
                    <button type="getnow" name="subscribe" class="btn btn-primary btn-lg" required="required"><a href="inscription.php" style="color : #3498BD;">S'inscrire</a></button>
                  </div>
                </form-->
              </div>
            </div>
          </div>
        </div>

        <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>

        <a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
      </div>
      <!--/#carousel-slider-->
    </div>
    <!--/#about-slider-->
  </div>
  <!--/#slider-->

  <div id="gallery">
    <div class="container">
      <div class="text-center">
        <h3>Gallery</h3>
      </div>
      <div class="row">
        <figure class="effect-chico">
          <div class="col-md-3 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
            <a href="img/ban5.jpg" class="flipLightBox">
						<img src="img/ban5.jpg" class="img-responsive" alt="">
						</a>
          </div>
        </figure>
        <figure class="effect-chico">
          <div class="col-md-3 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
            <a href="img/ban6.jpg" class="flipLightBox">
						<img src="img/ban6.jpg" class="img-responsive" alt="">
						</a>
          </div>
        </figure>
        <figure class="effect-chico">
          <div class="col-md-3 wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">
            <a href="img/ban14.jpg" class="flipLightBox">
						<img src="img/ban14.jpg" class="img-responsive" alt="">
						</a>
          </div>
        </figure>
        <figure class="effect-chico">
          <div class="col-md-3 wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">
            <a href="img/ban8.jpg" class="flipLightBox">
						<img src="img/ban8.jpg" class="img-responsive" alt="">
						</a>
          </div>
        </figure>
      </div>
    </div>
    <div class="gallery">
      <div class="container">
        <div class="row">
          <figure class="effect-chico">
            <div class="col-md-3 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
              <a href="img/ban9.jpg" class="flipLightBox">
							<img src="img/ban9.jpg" class="img-responsive" alt="">
							</a>
            </div>
          </figure>
          <figure class="effect-chico">
            <div class="col-md-3 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
              <a href="img/ban15.jpg" class="flipLightBox">
							<img src="img/ban15.jpg" class="img-responsive" alt="">
							</a>
            </div>
          </figure>
          <figure class="effect-chico">
            <div class="col-md-3 wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">
              <a href="img/ban13.jpg" class="flipLightBox">
							<img src="img/ban13.jpg" class="img-responsive" alt="">
							</a>
            </div>
          </figure>
          <figure class="effect-chico">
            <div class="col-md-3 wow fadeInDown" data-wow-offset="0" data-wow-delay="0.3s">
              <a href="img/ban16.jpg" class="flipLightBox">
							<img src="img/ban16.jpg" class="img-responsive" alt="">
							</a>
            </div>
          </figure>
        </div>
      </div>
    </div>
  </div>
  <!--/#gallery-->

  <div class="parallax-window">
    <div class="col-md-6 col-md-offset-3">
      <div class="text-center">
        <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.2s">
          <h2> Declancher une alerte ?</h2>
        </div>
        <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.6s">
          <p>Veuillez vous authentifier si vous etes deja un utilisateur. Sinon veuillez creer un compte utilisateur.
          </p>
        </div>
      </div>
    </div>
    <!--<div class="sub-parallax">
      <div class="text-center">
        <div class="col-md-12">
          <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.9s">
            <form class="form-inline">
              <div class="form-group">
                <button type="purchase" name="purchase" class="btn btn-primary btn-lg" required="required"><a href="connexion.php" style="color : #3498BD;">Se connecter</a></button>
              </div>
              <div class="form-group">
                <button type="subscribe" name="subscribe" class="btn btn-primary btn-lg" required="required"><a href="inscription.php" style="color : white;">S'inscrire</a></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>-->
  <!--/#parallax-window-->

  <footer>
    <div id="contact">
      <div class="container">
        <div class="text-center">
          <!--h3>Contactez nous</h3-->
          <p>Veuillez laisser votre message</p>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.2s">
            <h2>Contactez nous a tout moment</h2>
            <p>In a elit in lorem congue varius. Sed nec arcu. Etiam sit amet augue. Fusce fermen tum neque a rutrum varius odio pede ullamcorp-er tellus ut dignissim nisi risus non tortor. Aliquam mollis neque.</p>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.4s">
            <h2>Contact Info</h2>
            <ul>
              <li><i class="fa fa-home fa-2x"></i> 25 Rue Philippe Lebon, 76600 Le Havre</li>
              <hr>
              <li><i class="fa fa-phone fa-2x"></i> +38 000 129900</li>
              <hr>
              <li><i class="fa fa-envelope fa-2x"></i> alerte-port.le-havre@lehavre.fr</li>
            </ul>
          </div>

          <!--<div class="col-md-4 wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="accueil.php" method="POST" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="votre Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="votre Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Objet" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Veuillez regdiger votre message" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>

              <button type="submit" name="submit_msg" class="btn btn-theme pull-left" >Envoyer un message</button>
            </form>
          </div>
        </div>-->
      </div>
    </div>
    <!--/#contact-->
    <!--<div class="container">
      <div class="sub-footer">
        <div class="text-center">
          <div class="col-md-12">
            <form class="form-inline">
              <div class="form-group">
                <button type="purchase" name="purchase" class="btn btn-primary btn-lg" required="required">Entrer votre Email</button>
              </div>
              <div class="form-group">
                <button type="subscribe" name="subscribe" class="btn btn-primary btn-lg" required="required">S'inscrire</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>-->
    <div class="social-icon">
      <div class="container">
        <div class="col-md-6 col-md-offset-3">
          <ul class="social-network">
            <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
            <li><a href="#" class="dribbble tool-tip" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
            <li><a href="#" class="pinterest tool-tip" title="Pinterest"><i class="fa fa-pinterest-square"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center">
      <div class="copyright">
        &copy; Bikin Theme. All Rights Reserved.
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bikin
          -->
         Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script type="text/javascript" src="js/fliplightbox.min.js"></script>
  <script src="js/functions.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
