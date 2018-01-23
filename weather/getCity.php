<?php

	$pro = $_GET['province'];
	$info = simplexml_load_file('info.xml');

	$cites = $info -> xpath("//province[@name='$pro']//city");

	$city=[];
	foreach($cites as $v){
		$res = (Array)$v['name'];
		$city[]=$res[0];
	}

 	echo json_encode($city);
