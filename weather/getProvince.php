<?php

	$info = simplexml_load_file('info.xml');

	$pro=[];
	foreach($info ->province as $v){
		$pro[] = (Array)$v['name'][0][0];
	}

	echo json_encode($pro);
