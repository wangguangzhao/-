<?php
header("content-type:text/html;charset=utf8");
$arr = array_rand(range(1,1000),500);
shuffle($arr);
echo "总数量：". count($arr)."\n";

function quickSort($arr){
	static $p;
	if(!is_array($arr)) return false;
	$length = count($arr);
	if($length<=1) return $arr; //递归循环终止
	$left=$right=array();
	for($i=1;$i<$length;$i++){ //以数组第一个为基准，循环从1开始
		if($arr[$i]<=$arr[0]){
			$left[] = $arr[$i];
		}else{
			$right[] = $arr[$i];
		}
	}
	echo "循环次数：". ++$p."\n";
	//递归循环调用
	$left = quickSort($left);
	$right = quickSort($right);
	return array_merge($left,(array)$arr[0],$right);
}

print_r($arr);
print_r(quickSort($arr));