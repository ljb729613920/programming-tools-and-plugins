<?php
	/**
	 * / Search Engines
	 */

	// 没有传值或传值为空,均返回null
	if(!isset($_GET['kw']) || empty($_GET['kw'])){
		echo json_encode(null);
		exit;
	}
	//封装的数据库类
	require 'MyPDO.class.php';
	// 查询数据库,通过title模糊查询
	$sql = "select * from record where title like '%{$_GET['kw']}%' order by click desc limit 4";
	$record = $dbh -> my_fetchAll($sql);
	// 数据库无返回值,返回null
	if(!$record){
		echo json_encode(null);
		exit;
	}
	// 返回给json格式数据
	echo json_encode($record);
