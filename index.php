<?php


?>

<!DOCTYPE html>

<html>
<head>
</head>

<body>
<?php
// Penser à 
//4. Que le nombre d'euros soit arrondi à la dizaine inférieure (et afficher un message pour prévenir l'utilisateur dans ce cas)

	if(isset($_GET["somme_a_repartir"]) && filter_var($_GET["somme_a_repartir"], FILTER_VALIDATE_INT) !== false && !isset($_GET["PPTQ"])) {
		echo "On répartit ". $_GET['somme_a_repartir'] . " euros sur 8 personnes. <br /><br />" ;
		$argent_distribue_pour_1 = $_GET['somme_a_repartir'] * 0.3 ;
		$argent_distribue_pour_2 = $_GET['somme_a_repartir'] * 0.2 ;
		$argent_distribue_pour_3 = $_GET['somme_a_repartir'] * 0.15 ;
		$argent_distribue_pour_4 = $_GET['somme_a_repartir'] * 0.15 ;
		$argent_distribue_pour_5 = $_GET['somme_a_repartir'] * 0.05 ;
		$argent_distribue_pour_6 = $_GET['somme_a_repartir'] * 0.05 ;
		$argent_distribue_pour_7 = $_GET['somme_a_repartir'] * 0.05 ;
		$argent_distribue_pour_8 = $_GET['somme_a_repartir'] * 0.05 ;	

		$ligne_de_resultat = 1;
		while ($ligne_de_resultat <= $_GET['nombre_de_personnes']) {
			echo $ligne_de_resultat . ". "; 
				if($ligne_de_resultat == 1) {
					echo $argent_distribue_pour_1;
				}
				elseif ($ligne_de_resultat == 2) {
					echo $argent_distribue_pour_2;
				}
				elseif ($ligne_de_resultat == 3) {
					echo $argent_distribue_pour_3;
				}
				elseif ($ligne_de_resultat == 4) {
					echo $argent_distribue_pour_4;
				}
				elseif ($ligne_de_resultat == 5) {
					echo $argent_distribue_pour_5;
				}
				elseif ($ligne_de_resultat == 6) {
					echo $argent_distribue_pour_6;
				}
				elseif ($ligne_de_resultat == 7) {
					echo $argent_distribue_pour_7;
				}
				elseif ($ligne_de_resultat == 8) {
					echo $argent_distribue_pour_8;
				}
			echo "<br />";
			$ligne_de_resultat = $ligne_de_resultat +1;
		}

	}
	elseif(isset($_GET["somme_a_repartir"]) && filter_var($_GET["somme_a_repartir"], FILTER_VALIDATE_INT) !== false && isset($_GET["PPTQ"])) {
		echo "On répartit ". $_GET['somme_a_repartir'] . " euros sur 8 personnes. Le tournoi est un PPTQ, le premier gagne donc moins que le premier <em>(1/3 de moins). </em><br /><br />" ;
				$argent_distribue_pour_1 = $_GET['somme_a_repartir'] * 0.2 ;
		$argent_distribue_pour_2 = $_GET['somme_a_repartir'] * 0.3 ;
		$argent_distribue_pour_3 = $_GET['somme_a_repartir'] * 0.15 ;
		$argent_distribue_pour_4 = $_GET['somme_a_repartir'] * 0.15 ;
		$argent_distribue_pour_5 = $_GET['somme_a_repartir'] * 0.05 ;
		$argent_distribue_pour_6 = $_GET['somme_a_repartir'] * 0.05 ;
		$argent_distribue_pour_7 = $_GET['somme_a_repartir'] * 0.05 ;
		$argent_distribue_pour_8 = $_GET['somme_a_repartir'] * 0.05 ;	

		$ligne_de_resultat = 1;
		while ($ligne_de_resultat <= $_GET['nombre_de_personnes']) {
			echo $ligne_de_resultat . ". "; 
				if($ligne_de_resultat == 1) {
					echo $argent_distribue_pour_1;
				}
				elseif ($ligne_de_resultat == 2) {
					echo $argent_distribue_pour_2;
				}
				elseif ($ligne_de_resultat == 3) {
					echo $argent_distribue_pour_3;
				}
				elseif ($ligne_de_resultat == 4) {
					echo $argent_distribue_pour_4;
				}
				elseif ($ligne_de_resultat == 5) {
					echo $argent_distribue_pour_5;
				}
				elseif ($ligne_de_resultat == 6) {
					echo $argent_distribue_pour_6;
				}
				elseif ($ligne_de_resultat == 7) {
					echo $argent_distribue_pour_7;
				}
				elseif ($ligne_de_resultat == 8) {
					echo $argent_distribue_pour_8;
				}
			echo "<br />";
			$ligne_de_resultat = $ligne_de_resultat +1;
		}
	}

	else {
		if(isset($_GET["somme_a_repartir"])){
			echo "Merci d'indiquer une valeur en chiffres ;) <br /> <br />" ;
		}

		?>
	<form method="GET">
	<label> Répartir <input type="text" name="somme_a_repartir"/> euros sur 8 personnes. </label> <br /> <br />
	<input type="hidden" value="8" name="nombre_de_personnes" />
	<label> <input type="checkbox" name="PPTQ"/> Ce tournoi est un PPTQ <br /> <em> (Le premier aura moins de dotation que le second) </em></label>
	<br /> <br />
	<input type="submit" value=" Calcule !"/>
	</form>
	<?php
	}

	?>
</body>

</html>