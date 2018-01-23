<?php
	$city = $_GET['city'];

	$info = simplexml_load_file('info.xml');

	$counties = $info -> xpath("//city[@name='$city']//county");

	$county=[];
	foreach($counties as $k=>$v){
		$county[$k]['name']=(Array)$v['name'];
		$county[$k]['weatherCode']=(Array)$v['weatherCode'];
	}

	echo json_encode($county);
