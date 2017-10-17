<?php
print <<< END
it's funny when signs say things like:
	Original "Root" Beer 
	"Free" Gift 
	Shoes cleaned while "you" wait 
or have other misquoted words.
END;

//1.1
//查看一个email地址是否包含一个@
if(strpos($_POST['email'], '@') === false){
	print 'There was no @ in the e-mail address!';
}
// strpos()如果第一就是@ 会返回0 为区别0和false 必须用 ===


//1.2
//$substring = substr(string, start,length);
$username = substr($_GET['username'], 0,8);
// 可输入负数


//1.3
//$new_string = substr_replace(string, replacement, start)
print substr_replace('My pet is a blue dog.', 'fish',12);
print substr_replace('My pet is a blue dog.', 'green',12,4);
$credit_card = '4111 1111 1111 1111';
print substr_replace($credit_card,'xxxx ',0,strlen($credit_card)-4);

//如文本过大,无法一次全部显示,你可能希望显示一部分文本,例外还有一个链接指向其余文本
//用省略号显示长文本
$r = mysql_query("SELECT id,message FROM message WHERE id = $id") or die();
$ob = mysql_fetch_object($r);
printf('<a herf="more-text.php?id=%d">%s</a>',$ob->id,substr_replace($ob->message,' ...',25));

//1.4 逐字节处理字符串
//需要分别处理字符串中的各个字节

//统计一个字符串中的元音字母个数
$string = "This weekend, I'm going shopping for a pet chicken";
$vowels = 0;
for ($i = 0 , $j = strlen($string); $i < $j; $i++) {
	if(strstr('aeiouAEIOU',$string[$i])){
		$vowels++;
	}
}

//Look And Say序列
function lookandsay($s){
	//将返回值初始化为一个空串
	$r = '';
	//$m包含要统计的字符, 初始化为
	//字符串中的第一个字符
	$m = $s[0];
	//$n是已经查看过的$m个数, 初始化为1
	$n = 1;
	for($i = 1 ,$j = strlen($s); $i<$j; $i++){
		//如果这个字符与上一个相同
		if ($s[$i] == $m){
			//将这个字符的个数增1
			$n++;
		}else{
			//否则, 将字符个数和本身增加到返回值
			$r .=$n.$m;
			//将要查找的字符设置为当前字符
			$m = $s[$i];
			//并将字符个数重置为1
			$n = 1;
		}
	}
	//返回结构的字符串以及最后的字符个数及字符
	return $r.$n.$m;
}

for ($i=0; $s=1; $i < 10; $i++) { 
	$s = lookandsay($s);
	print "$s\n";
}
?>