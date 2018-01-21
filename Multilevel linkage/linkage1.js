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
}
window.onload = function(){

	// 当页面加载完,显示所有省份信息

	// 1.创建Ajax对象
	var xhr = createAjax();
	// 2.初始化
	xhr.open('get','getProvince.php');
	// 3.发送请求
		// IE缓存兼容性处理
	xhr.setRequestHeader('If-Modified-Since','0');
	xhr.send(null);
	// 4.接收响应
	xhr.onreadystatechange = function(){
		if(xhr.status==200 && xhr.readyState==4){
			// 5.显示数据
			var province = JSON.parse(xhr.responseText);
			// 遍历数据
			for(var i in province){
				// DOM操作
				// 1.创建option
				// W3C浏览器可使用:
				var option = new Option(province[i],province[i]);
				// 2.追加操作
				provinceSelect.appendChild(option);
			}
		}
	}
	// 获取市级信息
	provinceSelect.onchange=function(){
		// 1.创建Ajax对象
		var xhr1 = createAjax();
		// 2.初始化
		xhr1.open('get','getCity.php?province='+this.value);
		// 3.发送请求
			// IE缓存兼容性处理
		xhr1.setRequestHeader('If-Modified-Since','0');
		xhr1.send(null);
		// 4.接收响应
		xhr1.onreadystatechange = function(){
			if(xhr1.status==200 && xhr1.readyState==4){
				citySelect.length=0;
				// 5.接收数据
				var city = JSON.parse(xhr1.responseText);
				// 遍历数据
				for(var i in city){
					// DOM操作
					// 1.创建option
					var option = new Option(city[i],city[i]);
					// 2.追加操作
					citySelect.appendChild(option);
				}
			}
		}
	}
	// 获取区县级信息
	citySelect.onchange=function(){
		// 1.创建Ajax对象
		var xhr = createAjax();
		// 2.初始化
		xhr.open('get','getTown.php?city='+this.value);
		// 3.发送请求
			// IE缓存兼容性处理
		xhr.setRequestHeader('If-Modified-Since','0');
		xhr.send(null);
		// 4.接收响应
		xhr.onreadystatechange = function(){
			if(xhr.status==200 && xhr.readyState==4){
				townSelect.length=0;
				// 5.接收数据
				var town = JSON.parse(xhr.responseText);
				// 遍历数据
				for(var i in town){
					// DOM操作
					// 1.创建option
					var option = new Option(town[i],town[i]);
					// 2.追加操作
					townSelect.appendChild(option);
				}
			}
		}
	}
}
