<?php

class MyPDO{
	private $type='';
	private $host='';
	private $port='';
	private $charset='';
	private $dbname='';
	private $user='';
	private $pwd='';

	// 保存连接数据库的对象
	private $dbh='';

	// 封装获取
	public function __construct($arr=[]){
		$this->type=isset($arr['type'])?$arr['type']:'mysql';
		$this->host=isset($arr['host'])?$arr['host']:'127.0.0.1';
		$this->port=isset($arr['port'])?$arr['port']:'3306';
		$this->dbname=isset($arr['dbname'])?$arr['dbname']:'';
		$this->charset=isset($arr['charset'])?$arr['charset']:'utf8';
		$this->user=isset($arr['user'])?$arr['user']:'root';
		$this->pwd=isset($arr['pwd'])?$arr['pwd']:'';

		//调用
		$this->connect();
		$this->enableException();
	}
	// 封装连接
	private function connect(){
		$dsn="$this->type:host=$this->host;port=$this->port;dbname=$this->dbname;charset=$this->charset;";
		$user=$this->user;
		$pwd=$this->pwd;

		try{
			$this->dbh=new PDO($dsn,$user,$pwd);
		}catch(PDOException $e){
			echo '错误编码:'.$e->getCode(),'<br>';
			echo '错误信息:'.$e->getMessage(),'<br>';
			echo '错误文件:'.$e->getFile(),'<br>';
			echo '错误行:'.$e->getLine(),'<br>';
			exit;
		}
		return $this->dbh;
	}
	// 封装开启异常报错模式
	private function enableException(){
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	// 通用增删改的方法
	public function my_exec($sql){
		//获取异常
		 try{
			$res=$this->dbh->exec($sql);
		}catch(PDOException $e){
			echo '错误编码:'.$e->getCode(),'<br>';
			echo '错误信息:'.$e->getMessage(),'<br>';
			echo '错误文件:'.$e->getFile(),'<br>';
			echo '错误行:'.$e->getLine(),'<br>';
			exit;
		}
		return $res;
	}
	// 封装获取新增ID的方法
	public function my_last_id(){
		return $this->dbh->lastInsertid();
	}

	//封装获取一行记录的方法
	public function my_fetch($sql,$type=PDO::FETCH_ASSOC){
		//获取异常
		 try{
			$sth=$this->dbh->query($sql);
		}catch(PDOException $e){
			echo '错误编码:'.$e->getCode(),'<br>';
			echo '错误信息:'.$e->getMessage(),'<br>';
			echo '错误文件:'.$e->getFile(),'<br>';
			echo '错误行:'.$e->getLine(),'<br>';
			exit;
		}
			$res=$sth->fetch($type);
		return $res;
	}

	//封装获取多行记录的方法
	public function my_fetchAll($sql,$type=PDO::FETCH_ASSOC){
		//获取异常
		 try{
			$sth=$this->dbh->query($sql);
		}catch(PDOException $e){
			echo '错误编码:'.$e->getCode(),'<br>';
			echo '错误信息:'.$e->getMessage(),'<br>';
			echo '错误文件:'.$e->getFile(),'<br>';
			echo '错误行:'.$e->getLine(),'<br>';
			exit;
		}
			$res=$sth->fetchAll($type);
		return $res;
	}

}

$mysql=[
	'type'=>'mysql',
	'host'=>'127.0.0.1',
	'port'=>'3306',
	'dbname'=>'ajax',
	'charset'=>'utf8',
	'user'=>'root',
	'pwd'=>'1111'
];


$dbh=new MyPDO($mysql);
