<?php 
	// 两点间距离方法
	function sphere_distance($lat1 , $lon1 , $lat2 , $lon2 , $radius = 6378.135){
		$rad = doubleval(M_PI/180.0);

		$lat1 = doubleval($lat1) * $rad;
		$lat2 = doubleval($lat2) * $rad;
		$lon1 = doubleval($lon1) * $rad;
		$lon2 = doubleval($lon2) * $rad;

		$theta = $lon2 - $lon1;
		$dist = acos(sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($theta));
		if($dist<0){ $dist += M_PI;}
		//默认为地球赤道半径(公里数)
		return $dist = $dist * $radius;
	}

	//NY, NY (10040)
	$lat1 = 40.858704;
	$lon1 = -73.928532;

	//SF, CA (94144)
	$lat2 = 370758434;
	$lon2 = -122.435126;

	$dist = sphere_distance($lat1 , $lon1 , $lat2 , $lon2);
	print($dist);
	echo "<br>";
	print("1234");

?>