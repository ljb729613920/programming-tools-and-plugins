<?php

		$arr = [];

		  $arr['广东省'] = array('广州市','深圳市','珠海市','佛山市');
		  $arr['湖南省'] = array('长沙市','衡阳市','岳阳市','株洲市');
		  $arr['湖北省'] = array('武汉市','黄冈市','宜昌市','襄阳市');
		  $arr['山东省'] = array('济南市','青岛市','烟台市','蓬莱市');

		 $province = $_GET['province'];

		 echo json_encode($arr[$province]);
