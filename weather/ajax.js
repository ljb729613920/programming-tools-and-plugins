// 封装代码库
// 通过自己封装代码库来了解jQuery的原理

/**
 * /封装捕获DOM对象函数 根据id捕获 $
 * @param  	str 		id 	DOM对象id
 * @return 	object    	返回一个dom对象
 */
function $(id){
	return document.getElementById(id);
}

/**
 * /封装实例化兼容性ajax对象 createAjax
 * @return object|false  兼容性ajax对象|不存在返回弹窗
 */
function createAjax(){
	try{
		return new XMLHttpRequest();
	}catch(e){}
	try{
		return new ActiveXObject('Microsoft.XMLHTTP');
	}catch(e){}
	alert('浏览器版本不支持,请更新');
	console.log('浏览器版本不支持ajax,请更新');
}

/**
 * /封装的ajax的get请求方式	get
 * @param  str   	url      		请求地址
 * @param  str   	data     	传递参数
 * @param  fun 	callback 	无法确定用户传入值
 * @param  str   	datatype 	期望响应数据类型,默认json
 */
function get(url,data,callback,datatype='json'){
	// 创建Ajax对象
	var ajax = new createAjax();
	// 初始化设置
	ajax.open('get',url+'?'+data);
	// 设置IE缓存请求头
	ajax.setRequestHeader('If-Modified-Since','0');
	// 发送请求
	ajax.send(null);
	// 接收响应
	ajax.onreadystatechange = function(){
		if(ajax.status == 200 && ajax.readyState == 4){
			switch(datatype){
				case 'xml':
					callback(ajax.responseXML);
					break;
				case 'json':
					callback(JSON.parse(ajax.responseText));
					break;
				//用户传入一个text文件或者无法识别的文件时
				default:
					callback(ajax.responseText);
					break;
			}
		}
	}
}

/**
 * /封装的ajax的get请求方式	post
 * @param  str   	url      		请求地址
 * @param  str   	data     	传递参数
 * @param  fun 	callback 	无法确定用户传入值
 * @param  str   	datatype 	期望响应数据类型,默认json
 */
function post(url,data,callback,datatype='json'){
	// 创建Ajax对象
	var ajax = new createAjax();
	// 初始化设置
	ajax.open('post',url);
	// post设置请求头
	ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	// 发送请求
	ajax.send(data);
	ajax.onreadystatechange = function(){
		if(ajax.status == 200 && ajax.readyState == 4){
			switch(datatype){
				case 'xml':
					callback(ajax.responseXML);
					break;
				case 'json':
					callback(JSON.parse(ajax.responseText));
					break;
				//用户传入一个text文件或者无法识别的文件时
				default:
					ajax.responseText;
					break;
			}
		}
	}
}
