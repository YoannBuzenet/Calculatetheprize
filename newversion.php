<!DOCTYPE html>

<html>
<head>
</head>

<body>
	<h1> Calcule la dot </h1>
<?php
	if(isset($_GET["somme_a_repartir"]) && filter_var($_GET["somme_a_repartir"], FILTER_VALIDATE_INT) !== false && !isset($_GET["PPTQ"])) {
		echo "On répartit ". $_GET['somme_a_repartir'] . " euros sur ". $_GET["nombre_de_personnes"] . " personnes. <br /><br />" ;

		$place_classement = 1;
		$somme_lineaire = $_GET['somme_a_repartir'] - $_GET["nombre_de_personnes"] * $_GET["montant_dotation_minimale"];
		$coef_total = 0;
// On compte une fois "dans le vide" (sans rien écrire) pour savoir combien vaut le coef global (qui est fonction du nombre de joueurs)
		while($place_classement <= $_GET["nombre_de_personnes"]) {
			if($place_classement == 4 || $place_classement == 6 || $place_classement == 7 || $place_classement == 8){
			$coef_total = $coef_total + $coef_joueur ;
			}
			
			else{	
		$coef_joueur = $_GET["nombre_de_personnes"] + 1 - $place_classement;
		$coef_total = $coef_total + $coef_joueur ;
		}
		$place_classement = $place_classement +1;
		}
// Une fois le coef global connu, on recommence le calcul en écrivant cette fois les résultat. Chaque joueur reçoit une part du prix en fonction de son classement.
		$place_classement = 1;
		$coef_joueur = 0;

		while($place_classement <= $_GET["nombre_de_personnes"]) {
			if($place_classement == 4 || $place_classement == 6 || $place_classement == 7 || $place_classement == 8){

			}
			else{	
			$precoef_joueur = ($_GET["nombre_de_personnes"] + 1 - $place_classement);
			$coef_joueur = $precoef_joueur/$coef_total;
			}

		$part_du_joueur = $somme_lineaire * $coef_joueur + $_GET["montant_dotation_minimale"];
		
		echo $place_classement. ". " . round($part_du_joueur,2) . " <br />";

		$place_classement = $place_classement +1;
		}

		echo "<br /><br /> <a href=newversion.php> Retour à l'accueil</a>";
	}
	else {
		?>

	<form method="GET">
	<label> Nombre de joueurs : <input type="text" name="nombre_de_personnes"/> </label> <br /> <br />
	<label> Somme à répartir : <input type="text" name="somme_a_repartir"/> euros. </label> <br /> <br />
	<label> <input type="checkbox" name="Dot_minimale"/> Je veux que chaque joueur ait au minimum <input type="text" name="montant_dotation_minimale" placeholder="Indiquez un nombre" value ="0"/> euros. <em> (Si vous voulez que chaque joueur ait au moins un booster, mettez votre prix d'un booster ici) </em></label>
	<br /> <br />
	<input type="submit" value=" Calcule !"/>
	</form>
	<?php

		}
	?>
</body>

</html>
