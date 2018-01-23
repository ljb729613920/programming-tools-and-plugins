<?php

	$xml = simplexml_load_file('info.xml');

	$pro=[];
	foreach($xml ->province as $zhoushaolin){
		$pro[] = (Array)$zhoushaolin['name'];
	}
	echo json_encode($pro);
