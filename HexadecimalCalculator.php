<?php 
	error_reporting('E_ALL^E_NOTICE');
	$sel=$_POST['selectors'];
	$num=$_POST['num'];
	switch ($sel) {
		case 'hd':
			$res=hexdec($num);
			break;
		case 'ho':
			$num1=hexdec($num);
			$res=decoct($num1);
			break;
		case 'hb':
			$num1=hexdec($num);
			$res=decbin($num1);
			break;
		case 'dh':
			$res=dechex($num);
			break;
		case 'do':
			$res=decoct($num);
			break;
		case 'db':
			$res=decbin($num);
			break;
		case 'oh':
			$num1=octdec($num);
			$res=dechex($num1);
			break;
		case 'od':
			$res=octdec($num);
			break;
		case 'ob':
			$num1=octdec($num);
			$res=decbin($num1);
			break;
		case 'bh':
			$num1=bindec($num);
			$res=dechex($num1);
			break;
		case 'bd':
			$res=bindec($num);
			break;
		case 'bo':
			$num1=bindec($num);
			$res=decoct($num1);
			break;
		default:
			break;
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="#" method="post">
	<table>
		<thead>
			<tr>
				<th>请输入数字:</th>
				<th></th>
				<th>计算结果:</th>
			</tr>
			<tbody>
				<tr>
					<td><input type="number" name="num" value="<?php echo $num?>" required></td>
					<td>
						<select name="selectors" id="">
							<option value="hd" >16to10</option>
							<option value="ho" >16to8</option>
							<option value="hb" >16to2</option>
							<option value="dh" >10to16</option>
							<option value="do" >10to8</option>
							<option value="db" >10to2</option>
							<option value="oh" >8to16</option>
							<option value="od" >8to10</option>
							<option value="ob" >8to2</option>
							<option value="bh" >2to16</option>
							<option value="bd" >2to10</option>
							<option value="bo" >2to8</option>
						</select>
						<input type="submit" value="计算" name="sub">
					</td>
					<td><input type="text" name="num2" value="<?php echo $res?>"></td>
				</tr>
				<tr>
					<td colspan="3">结果为0时,请检查输入数字</td>
				</tr>
			</tbody>
		</thead>
	</table>
</form>
	

</body>
</html>