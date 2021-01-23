<?php
 
    ini_set( 'display_errors', 1 );
 
    error_reporting( E_ALL );
 
    $from = "projetl2mi@gmail.com";
 
    $to = "pereselrey2@gmail.com";
 
    $subject = "Vérification PHP mail";
 
    $message = "PHP mail marche";
 
    $headers = "From:".$from;
 	
 	$m = mail($to,$subject,$message,$headers);
 	
    if ($m)

    {
    	echo "L'email a été envoyé.";
    }

    else

    {
    	echo "L'email n'a pas été envoyé.";
    }
 
    
?>