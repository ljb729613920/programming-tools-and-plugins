<?php
	$info = file_get_contents('info.json');

	echo json_encode($info);
