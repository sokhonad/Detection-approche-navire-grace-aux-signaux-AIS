<?php 	

	$nom = file("nom.txt");

	$n_nom = file("n_nom.txt");

	$mmsi = file("mmsi.txt");

	$imo = file("imo.txt");

	$type = file("type.txt");

	$i = count($nom) - 1;

	while( $i >= 0)

	{
		echo "('".$n_nom[$i]."',".$mmsi[$i].",".$imo[$i].",'".$type[$i]."','".$nom[$i]."'),<br/>";

		--$i;
	}
 ?>