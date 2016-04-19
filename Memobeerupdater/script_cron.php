<?php
		include('connexion.php');
		$apikey = '66c5e7fd8a4016a6f4b41054355f500c';

		set_time_limit(30000);
		// $nombre_insertions = 0;
		// $valid_id = [];
		// $difference = 0;

		// $nombre_jeux_avant_maj = 0;
		// $liste_jeux = $bdd->query('SELECT * FROM all_games');
		// $nombre_jeux_avant_maj = $liste_jeux->rowCount();

		$list_json = file_get_contents('http://api.brewerydb.com/v2/beers?p=2&key='.$apikey);
		$list = json_decode($list_json);

		foreach($list->data as $beers){

			var_dump($beers);

			// foreach($steam->app as $key=>$app){
			// 	if(preg_match('#0$#', $app->appid)){

			// 		if(!preg_match('#Demo|Trailer|Server|SDK#', $app->name)){
			// 			$valid_id[$app->appid] = $app->name;
			// 			$id = $app->appid;

			// 			$q = array('steam_id' => $id, 'game_name' => $valid_id[$app->appid]);
			// 			$sql = 'INSERT IGNORE INTO all_games (steam_id, game_name) VALUES (:steam_id, :game_name)';
			// 			$req = $bdd->prepare($sql);

			// 			if($req->execute($q)){
			// 				$nombre_insertions++;
			// 			}

			// 		}
			// 	}
				
			// }
		}

?>