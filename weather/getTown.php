<?php
	$city = $_GET['city'];

	$info = simplexml_load_file('info.xml');

	$counties = $info -> xpath("//city[@name='$city']//county");

	$county=[];
	foreach($counties as $k=>$v){
		$res = (Array)$v['name'];
		$county[$k]['name']=$res[0];
		$res = (Array)$v['weatherCode'];
		$county[$k]['weatherCode']=$res[0];
	}

	echo json_encode($county);
