<?php
	$url = "http://www.weather.com.cn/adat/sk/".$_GET['weatherCode'].".html";
	$info = file_get_contents($url);
	echo $info;


