<?php
session_start();
require('connexion.php');
//setcookie('pseudo', $_POST['username'], time() + 365*24*3600, null, null, false, true);

$steam_id = (int)$_POST['steam_id'];
$user_id = $_SESSION['Auth']['id'];
$jeu_id;

if($steam_id != 0 ){
// Le jeu existe t-il déja dans la base?

	$q = array('steam_id' => $steam_id);
	$sql = 'SELECT * FROM jeux WHERE steam_id = :steam_id';
	$req = $bdd->prepare($sql);
	$req->execute($q);

	$count = $req->rowCount($sql);

	if($count == 1){

	// le jeu existe, on ne fait rien de spécial

	}else{

	// On l'ajoute 

	//$url = 'http://store.steampowered.com/app/'.$steam_id;
	$game = file_get_contents('http://store.steampowered.com/api/appdetails/?appids='.$steam_id.'');
	$json = json_decode($game, TRUE);

	foreach($json as $key => $value){

		$nom_jeu = '';
		$prix = 0;
		$description = '';

		$screen1_thumbnail = '';
		$screen2_thumbnail = '';
		$screen3_thumbnail = '';
		$screen1_full= '';
		$screen2_full= '';
		$screen3_full= '';
		$screens = array();

		$jeu_valide = 0;


			foreach($value as $key2 => $value2){ 				// boucle sur SUCCESS et DATA

				if(is_array($value2)) {
					

					foreach($value2 as $key3 => $value3){

						if($key3 == 'name'){ 					// récupération du nom du jeu
									$nom_jeu = $value3;
						}
						if($key3 == 'price_overview'){ 			// récupération du prix
									
								foreach($value3 as $key4 => $value4){
									if($key4 == 'initial'){
										$prix = $value4/100;

										if($prix == "0,00"){
											$jeu_valide = 0;
										}
									}
								}
						}
						if($key3 == 'detailed_description'){ 					// récupération du nom du jeu
									$description = $value3;
						}
						if($key3 == 'screenshots'){				// récupération des 3 premières captures d'écran

							$screen1_thumbnail = $value3[0]['path_thumbnail'];
							$screen1_full = $value3[0]['path_full'];
							$screen2_thumbnail = $value3[1]['path_thumbnail'];
							$screen2_full = $value3[1]['path_full'];
							$screen3_thumbnail = $value3[2]['path_thumbnail'];
							$screen3_full = $value3[2]['path_full'];

							$screens['screen1_thumb'] = $screen1_thumbnail;
							$screens['screen2_thumb'] = $screen2_thumbnail;
							$screens['screen3_thumb'] = $screen3_thumbnail;

							$screens['screen1_full'] = $screen1_full;
							$screens['screen2_full'] = $screen2_full;
							$screens['screen3_full'] = $screen3_full;

						}

					}

				}

			} // fin boucle foreach principale

			foreach($screens as &$string){ 				// traitement sur l'url des screenshots afin d'enlever le paramètre "?t=" après le .jpg
				$parts = parse_url($string);
				$url = 'http://'.$parts['host'].$parts['path'].'';
				$string = $url;
			}

			$screen1_thumbnail = $screens['screen1_thumb'];
			$screen2_thumbnail = $screens['screen2_thumb'];
			$screen3_thumbnail = $screens['screen3_thumb'];

			$screen1_full = $screens['screen1_full'];
			$screen2_full = $screens['screen2_full'];
			$screen3_full = $screens['screen3_full'];

	}

		$req = $bdd->prepare('INSERT INTO jeux (nom, date_ajout, steam_id, prix, description, is_steam, screen1, screen1_thumb, screen2, screen2_thumb, screen3, screen3_thumb) 
								VALUES(?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

		if($req->execute(array($nom_jeu, $steam_id, $prix, $description, '1', $screen1_full, $screen1_thumbnail, $screen2_full, $screen2_thumbnail, $screen3_full, $screen3_thumbnail))){
			//echo "requête ok";
			//header('Location: ../index.php');
		}
		else{
			//echo("erreur dans la requête");
			header('Location: ../private.php');
		}


}

// Maintenant on ajoute le jeu dans la liste de l'utilisateur :

// on récupère l'id du jeu (table jeux) pour l'ajouter dans la gamelist de l'utilisateur

	$q = array('steam_id' => $steam_id);
	$sql = 'SELECT * FROM jeux WHERE steam_id = :steam_id';
	$req = $bdd->prepare($sql);
	$req->execute($q);

	$count = $req->rowCount($sql);

	if($count == 1){
		$jeu_temp = $req->fetch();
		$jeu_id = $jeu_temp['id']; // on récupère l'id du jeu à ajouter plus loin
		// le jeu existe, on ne fait rien de spécial
	}else{
		// jeu non trouvé
		header('Location: ../index.php');
	}

	$req = $bdd->prepare('INSERT INTO gamelist (user, jeu, date_ajout) VALUES(?, ?, NOW())');

	if($req->execute(array($user_id, $jeu_id))){

		header('Location: ../private.php');
	}
	else{
		
		header('Location: ../private.php');
	}


/*echo htmlspecialchars($_POST['username']);
echo("\n");
echo htmlspecialchars($_POST['email']);
echo("\n");
echo htmlspecialchars($_POST['steam_id']);*/
	
}else{

//echo('pas bon');
	header('Location: ../private.php');

}







?>