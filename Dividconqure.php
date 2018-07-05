<?php
/*
	分治算法解决问题
	分治法的精髓：
	分：将问题分解为更小的多个子问题
	治：将这些规模较小的子问题各个击破
	合：将已解决的子问题合并最终解决母问题。
	例如：
	将顺序表数组排序或求最大最小值


*/
$arr = array_rand(range(1,50000),200);
shuffle($arr);
// 采用分治法将数组按从小到大进行排序
function sortArr($arr,$index=0){
	$length = count($arr);
	if($index ==$length -1) return $arr;
	$min = $arr[$index]; //最小值
	$minindex = $index;  //最小值索引值
	for($i=$index+1;$i<$length;$i++){
		if($arr[$i]<$min){
			$min = $arr[$i];
			$minindex = $i;
		}
	}
	if($minindex !== $index){
		$arr[$minindex] = $arr[$index];
		$arr[$index] = $min;
	}
	return sortArr($arr,$index+1);
 
}
// $start = microtime(true);
// sortArr($arr);
// $end = microtime(true);
// $time1 = ($end-$start)*1000;

// $start = microtime(true);
// sort($arr);
// $end = microtime(true);
// $time2 = ($end-$start)*1000;
// echo "sortarr:".$time1."\n";
// echo "sort:".$time2."\n";
 
$start = microtime(true);
echo "max:".maxArray($arr)."\n";
$end = microtime(true);
$time1 = ($end-$start)*1000;
echo "sortarr:".$time1."\n";

$start = microtime(true);
echo  "maxp:".maxArrP(0,1,$arr)."\n";
$end = microtime(true);
$time2 = ($end-$start)*1000;
echo "sortarr:".$time2."\n";

//获取最大值 空间复杂度为n
function maxArray($arr){

	$length = count($arr);
	if($length<=1) return $arr[0];
	$max = $arr[0];
	for($i=1;$i<count($arr);$i++){

		if($arr[$i]>$max) $max = $arr[$i];
	}
	return $max;
}

function maxArrP($start,$end,$arr){

	 $length = count($arr)-1;
	 if($start>$length) return 0;
	 if($end>$length) return $arr[$start];
	 $max = $arr[$start];
	 if($arr[$end]>$max)$max=$arr[$end];
	 $start+=2;
	 $end+=2;
	 $value = maxArrP($start,$end,$arr);
	 if($max< $value) $max=$value;
	 return $max;

}
