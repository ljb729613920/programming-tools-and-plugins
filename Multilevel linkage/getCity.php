<?php

	$pro = $_GET['province'];
	$info = simplexml_load_file('info.xml');

	$cites = $info -> xpath("//province[@name='$pro']//city");

	$city=[];
	foreach($cites as $v){
		 $city[] = (Array)$v['name'];
	}
	echo '<pre>';
	var_dump($city);exit;
 	echo json_encode($city);
