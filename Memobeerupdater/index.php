<?php
		header ('Content-type: text/html; charset=utf-8');
		include('connexion.php');
		set_time_limit(500000);

		$apikey = '66c5e7fd8a4016a6f4b41054355f500c';
		$page = 1001;

		$list_json = file_get_contents('http://api.brewerydb.com/v2/beers?p='.$page.'&key='.$apikey);
		$list = json_decode($list_json);

		//$total_pages = $list->numberOfPages;
		$total_pages = 1063;

		while($page < $total_pages){

		$list_json = file_get_contents('http://api.brewerydb.com/v2/beers?p='.$page.'&key='.$apikey);
		$list = json_decode($list_json);

			foreach($list->data as $beer){

				$name = $beer->name;
				//$description = str_replace('â€™','\'', $beer->description ?: 'no description');
				$description = $beer->description ?: 'no description';
				$abv = (float)$beer->abv ?: '0';
				$image = $beer->labels->medium?: 'http://www.brewerydb.com/img/beer-details.png';

				// echo('<strong>'.$name.'</strong>');
				// echo('<br>');
				// echo($description);
				// echo('<br>');
				// echo($abv);
				// echo('<br>');
				// echo($image);
				// echo('<br>-------------------------------------<br><br>');
				
				$q = array('name' => $name, 'description' => $description, 'abv' => $abv, 'image' => $image);
				$sql = 'INSERT INTO beers_listing (name, description, abv, logo_url) VALUES (:name, :description, :abv, :image)';
				
				$req = $bdd->prepare($sql);
				$req->execute($q);

			}

			$page++;
	}

	echo($page. " pages enregistrées sur ".$total_pages." !");


?>