	<?php 
	if(isset($_GET['nb_de_joueurs']) && isset($_GET['somme_a_repartir']) && filter_var($_GET["somme_a_repartir"], FILTER_VALIDATE_INT) !== false) {
	$nb_de_joueurs =  $_GET['nb_de_joueurs'];
	$somme_totale = $_GET['somme_a_repartir'];
	$somme_totale_du_minimum_par_joueur = $_GET['montant_dotation_minimale'] * $nb_de_joueurs;
	$somme_a_repartir = $somme_totale - $somme_totale_du_minimum_par_joueur;
	$somme_mini_par_joueur = $_GET['montant_dotation_minimale'];

	function arrondir5($nombre){
	   return $nombre-($nombre%5);
	}


		// Definition du palier
		if($nb_de_joueurs == 1) {
			$_palier = 1;
		}
		elseif ($nb_de_joueurs > 1 && $nb_de_joueurs <= 2) {
			$_palier = 2 ;
		}
		elseif ($nb_de_joueurs >= 2 && $nb_de_joueurs <= 4) {
			$_palier = 3 ;
		}
		elseif ($nb_de_joueurs > 4 && $nb_de_joueurs <= 8) {
			$_palier = 4 ;
		}
		elseif ($nb_de_joueurs >= 8 && $nb_de_joueurs <= 16) {
			$_palier = 5 ;
		}
		elseif ($nb_de_joueurs > 16 && $nb_de_joueurs <= 32) {
			$_palier = 6 ;
		}
		elseif ($nb_de_joueurs > 33 && $nb_de_joueurs <= 64) {
			$_palier = 7 ;
		}
		elseif ($nb_de_joueurs > 64 && $nb_de_joueurs <= 128) {
			$_palier = 8 ;
		}
		elseif ($nb_de_joueurs > 128 && $nb_de_joueurs <= 256) {
			$_palier = 9 ;
		}
		elseif ($nb_de_joueurs > 256 && $nb_de_joueurs <= 512) {
			$_palier = 10 ;
		}
		elseif ($nb_de_joueurs > 512 && $nb_de_joueurs <= 1024) {
			$_palier = 11 ;
		}

		// Définition des coefficients par paliers
		$coef_palier_1 = 24 ;
		$coef_palier_2 = 18 ;
		$coef_palier_3 = 12 ;
		$coef_palier_4 = 8 ;
		$coef_palier_5 = 4 ;
		$coef_palier_6 = 2 ;
		$coef_palier_7 = 1 ;
		$coef_palier_8 = 0.5;
		$coef_palier_9 = 0.25 ;
		$coef_palier_10 = 0.125;
		$coef_palier_11 = 0.065;

		// Calcul des tantiemes
		$decompte_joueurs = $nb_de_joueurs;
		$total_tantieme = 0;
		while($decompte_joueurs > 512 && $decompte_joueurs <= 1024) {
		$total_tantieme = $total_tantieme + $coef_palier_11;
		$decompte_joueurs = $decompte_joueurs - 1;
		}
		while($decompte_joueurs > 256 && $decompte_joueurs <= 512) {
		$total_tantieme = $total_tantieme + $coef_palier_10;
		$decompte_joueurs = $decompte_joueurs - 1;
		}
		while($decompte_joueurs > 128 && $decompte_joueurs <= 256) {
		$total_tantieme = $total_tantieme + $coef_palier_9;
		$decompte_joueurs = $decompte_joueurs - 1;
		}
		while($decompte_joueurs > 64 && $decompte_joueurs <= 128) {
		$total_tantieme = $total_tantieme + $coef_palier_8;
		$decompte_joueurs = $decompte_joueurs - 1;
		}
		while($decompte_joueurs > 32 && $decompte_joueurs <= 64) {
		$total_tantieme = $total_tantieme + $coef_palier_7;
		$decompte_joueurs = $decompte_joueurs - 1;
		}
		while($decompte_joueurs > 16 && $decompte_joueurs <= 32) {
		$total_tantieme = $total_tantieme + $coef_palier_6;
		$decompte_joueurs = $decompte_joueurs - 1;
		}
		while($decompte_joueurs > 8 && $decompte_joueurs <= 16) {
		$total_tantieme = $total_tantieme + $coef_palier_5;
		$decompte_joueurs = $decompte_joueurs - 1;
		}
		while($decompte_joueurs > 4 && $decompte_joueurs <= 8) {
		$total_tantieme = $total_tantieme + $coef_palier_4;
		$decompte_joueurs = $decompte_joueurs - 1;
		}
		while($decompte_joueurs > 2 && $decompte_joueurs <= 4) {
		$total_tantieme = $total_tantieme + $coef_palier_3;
		$decompte_joueurs = $decompte_joueurs - 1;
		}
		while($decompte_joueurs > 1 && $decompte_joueurs <= 2) {
		$total_tantieme = $total_tantieme + $coef_palier_2;
		$decompte_joueurs = $decompte_joueurs - 1;
		}
		while($decompte_joueurs > 0 && $decompte_joueurs <= 1) {
		$total_tantieme = $total_tantieme + $coef_palier_1;
		$decompte_joueurs = $decompte_joueurs - 1;
		}

	}
	?>
	<!DOCTYPE html>

	<html>
	<head>
		<link rel="stylesheet" href="theme.css" />
	</head>

	<body>
		<a href ="http://localhost:8888/Calculeladot/calculeladotV2.php"><h1> Calcule la dot </h1></a>
	<?php
			if(isset($somme_a_repartir)){
			echo "On répartit ". $somme_totale . " euros sur ". $nb_de_joueurs . " personnes. <br /><br />" ;

			// On établit la boucle qui construit le classement
	$place_classement = 1;
	$total_distribué = 0;
	while($place_classement <= $nb_de_joueurs) {
		echo $place_classement.'. ';
			if($place_classement == 1){ 
				$ratio = $coef_palier_1/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir + $somme_mini_par_joueur;
				$somme_defitinive = arrondir5(round($somme_a_attribuer));

				if($somme_defitinive >=5) {
				echo arrondir5(round($somme_a_attribuer));
				}
				else {
					$somme_defitinive = $somme_mini_par_joueur;
					echo $somme_defitinive;
				}

				$total_distribué = $total_distribué + $somme_defitinive;
			}
			elseif($place_classement == 2){ 
				$ratio = $coef_palier_2/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir + $somme_mini_par_joueur;
				$somme_defitinive = arrondir5(round($somme_a_attribuer));

				if($somme_defitinive >=5) {
					echo arrondir5(round($somme_a_attribuer));
				}
				else {
					$somme_defitinive = $somme_mini_par_joueur;
					echo $somme_defitinive;
				}
				$total_distribué = $total_distribué + $somme_defitinive;
			}
			elseif($place_classement == 3 || $place_classement == 4){ 
				$ratio = $coef_palier_3/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir+ $somme_mini_par_joueur;
				$somme_defitinive = arrondir5(round($somme_a_attribuer));

				if($somme_defitinive >=5) {
					echo arrondir5(round($somme_a_attribuer));
				}
				else {
					$somme_defitinive = $somme_mini_par_joueur;
					echo $somme_defitinive;
				}
				$total_distribué = $total_distribué + $somme_defitinive;
			}
			elseif($place_classement > 4 && $place_classement <= 8){ 
				$ratio = $coef_palier_4/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir+ $somme_mini_par_joueur;
				$somme_defitinive = arrondir5(round($somme_a_attribuer));

				if($somme_defitinive >=5) {
					echo arrondir5(round($somme_a_attribuer));
				}
				else {
					$somme_defitinive = $somme_mini_par_joueur;
					echo $somme_defitinive;
				}
				$total_distribué = $total_distribué + $somme_defitinive;
			}
			elseif($place_classement > 8 && $place_classement <= 16){ 
				$ratio = $coef_palier_5/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir+ $somme_mini_par_joueur;
				if($somme_a_attribuer < $somme_mini_par_joueur){
					$somme_a_attribuer = $somme_mini_par_joueur;
				}
				$somme_defitinive = (round($somme_a_attribuer));
				echo (round($somme_a_attribuer));
				$total_distribué = $total_distribué + $somme_defitinive;
			}
			elseif($place_classement > 16 && $place_classement <= 32){ 
				$ratio = $coef_palier_6/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir;
				if($somme_a_attribuer < $somme_mini_par_joueur){
					$somme_a_attribuer = $somme_mini_par_joueur;
				}
				else{
					$somme_a_attribuer = $ratio * $somme_a_repartir+ $somme_mini_par_joueur;
				}
				$somme_defitinive = (round($somme_a_attribuer));
				echo(round($somme_a_attribuer));
				$total_distribué = $total_distribué + $somme_defitinive;
			}
			elseif($place_classement > 32 && $place_classement <= 64){ 
				$ratio = $coef_palier_7/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir;
				if($somme_a_attribuer < $somme_mini_par_joueur){
					$somme_a_attribuer = $somme_mini_par_joueur;
				}
				else{
					$somme_a_attribuer = $ratio * $somme_a_repartir+ $somme_mini_par_joueur;
				}
				$somme_defitinive = (round($somme_a_attribuer));
				echo (round($somme_a_attribuer));
				$total_distribué = $total_distribué + $somme_defitinive;
			}
			elseif($place_classement > 64 && $place_classement <= 128){ 
				$ratio = $coef_palier_8/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir;
				if($somme_a_attribuer < $somme_mini_par_joueur){
					$somme_a_attribuer = $somme_mini_par_joueur;
				}
				else{
					$somme_a_attribuer = $ratio * $somme_a_repartir+ $somme_mini_par_joueur;
				}
				$somme_defitinive = (round($somme_a_attribuer));
				echo (round($somme_a_attribuer));
				$total_distribué = $total_distribué + $somme_defitinive;
			}
			elseif($place_classement > 128 && $place_classement <= 256){ 
				$ratio = $coef_palier_9/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir;
				if($somme_a_attribuer < $somme_mini_par_joueur){
					$somme_a_attribuer = $somme_mini_par_joueur;
				}
				else{
					$somme_a_attribuer = $ratio * $somme_a_repartir+ $somme_mini_par_joueur;
				}
				$somme_defitinive = (round($somme_a_attribuer));
				echo (round($somme_a_attribuer));
				$total_distribué = $total_distribué + $somme_defitinive;
			}
			elseif($place_classement > 256  && $place_classement <= 512){ 
				$ratio = $coef_palier_10/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir;
				if($somme_a_attribuer < $somme_mini_par_joueur){
					$somme_a_attribuer = $somme_mini_par_joueur;
				}
				else{
					$somme_a_attribuer = $ratio * $somme_a_repartir+ $somme_mini_par_joueur;
				}
				$somme_defitinive = (round($somme_a_attribuer));
				echo (round($somme_a_attribuer));
				$total_distribué = $total_distribué + $somme_defitinive;
			}
			elseif($place_classement > 512 && $place_classement <= 1024){ 
				$ratio = $coef_palier_11/$total_tantieme;
				$somme_a_attribuer = $ratio * $somme_a_repartir;
				if($somme_a_attribuer < $somme_mini_par_joueur){
					$somme_a_attribuer = $somme_mini_par_joueur;
				}
				else{
					$somme_a_attribuer = $ratio * $somme_a_repartir+ $somme_mini_par_joueur;
				}
				$somme_defitinive = (round($somme_a_attribuer));
				echo (round($somme_a_attribuer));
				$total_distribué = $total_distribué + $somme_defitinive;
			}
			
				echo '<br />'; 
		$place_classement = $place_classement +1;

	}
	echo '<br />';
	echo 'Total distribué : '. $total_distribué;
	echo '<br />';
	$non_distribue = ($somme_totale - $total_distribué);
	echo 'Non distribué : '. $non_distribue;	
	echo '<br />';
		echo '<br /> <a href="http://localhost:8888/Calculeladot/calculeladotV2.php"> Retour à l\'accueil </a>';
	}
		
		else {
	?>
		<form method="GET">
		<label> Nombre de joueurs à récompenser : <input type="text" name="nb_de_joueurs"/> </label> <br /> <br />
		<label> Somme à répartir : <input type="text" name="somme_a_repartir"/> euros. </label> <br /> <br />
	<label> Je veux que chaque joueur ait au minimum <input type="text" name="montant_dotation_minimale" placeholder="Indiquez un nombre" value ="0"/> euros. <em> (Si vous voulez récompenser tous vos joueurs, et pas uniquement un top 8. Si vous voulez que chaque joueur ait au moins un booster, mettez votre prix d'un booster ici) </em></label>
		<br /> <br />
		<input type="submit" value=" Calcule !"/>
		</form>

		<?php
			}


	?>
