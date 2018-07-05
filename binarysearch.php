<?php
header("content-type:text/html;charset=utf8");
$arr = array_rand(range(1,1000000),500000);
shuffle($arr);
$searchvalue = $arr[0];
shuffle($arr);
$arr = quickSort($arr);
echo "待查找的值为：".$searchvalue."\n";
function quickSort($arr){
	if(!is_array($arr)) return false;
	$length = count($arr);
	if($length<=1) return $arr;
	$left=$right=array(); //left存储比给定值小的数据，right存储比给定值大的数据
	$base = $arr[0]; //判断基准
	for($i=1;$i<$length;$i++){
		if($arr[$i]<$base){
			$left[] = $arr[$i];
		}else{
			$right[] = $arr[$i];
		}
	}
	//递归处理
	$left = quickSort($left);
	$right = quickSort($right);
	return array_merge($left,array($base),$right);	
 
}
/*
	@param $arr:待查找数组
	@param $searchval:待查找值
	@return -1:未查找导数据；key：searchval索引值
*/
function binarySearch(&$arr,$searchval){
	 //将数组$arr进行从大到小排序
	$minindex = 0; //最小索引
	$maxindex = count($arr)-1; //最大索引
	while($minindex<=$maxindex){ //当最小索引小于最大索引时开始查找
		static $index =1;
		$middle = ceil(($minindex+$maxindex)/2); //中间索引
		if($arr[$middle]>$searchval){
			$maxindex = $middle-1;
		}else if($arr[$middle]<$searchval){
			$minindex = $middle+1;
		}else{
			return $middle;
		}
		// echo "循环执行次数：".$index."\n";
		$index++;
	}
	return -1;
}
/*
	插值查找,对于数据分布比较均匀的差值查找效率较高反之不如二分查找
	@param $arr:待查找数组
	@param $searchval:待查找值
	@return -1:未查找导数据；key：searchval索引值
*/
function insertSearch(&$arr,$searchval){
	$arr = quickSort($arr); //将数组$arr进行从大到小排序
	$minindex = 0; //最小索引
	$maxindex = count($arr)-1; //最大索引
	
	while($minindex<=$maxindex){ //当最小索引小于最大索引时开始查找
		static $index =1;
		//中间索引
		$middle = $minindex+(($searchval-$arr[$minindex])/($arr[$maxindex-$minindex])) *($maxindex-$minindex);
		$middle =ceil($middle);
		if($arr[$middle]>$searchval){
			$maxindex = $middle-1;
		}else if($arr[$middle]<$searchval){
			$minindex = $middle+1;
		}else{
			return $middle;
		}
		// echo "循环执行次数：".$index."\n";
		$index++;
	}
	return -1;
}
$start = microtime(true);
$rel = array_search($searchvalue,$arr);
$end = microtime(true);
$executetime = ($end - $start)*1000;
echo "array_search执行时间：".$executetime."ms\n";
echo "查询结果key：".$rel."\n";
echo "值:".$arr[$rel]."\n";
$start1 = microtime(true);
$rel = binarySearch($arr,$searchvalue);
$end1 = microtime(true);
$executetime1 = ($end1 - $start1)*1000;
echo "binarySearch执行时间：".$executetime1."ms\n";
echo "值:".$arr[$rel]."\n";
// $start2 = microtime(true);
// $rel = insertSearch($arr,$searchvalue);
// $end2 = microtime(true);
// $executetime2 = ($end2 - $start2)*1000;
// echo "binarySearch2执行时间：".$executetime2."ms\n";
// // print_r($arr);
// echo "查询结果key：".$rel."\n";
// if($rel !== -1){
// 	echo "值:".$arr[$rel]."\n";
// }
 
 // echo "倍数：".($executetime1/$executetime)."\n";