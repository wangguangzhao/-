<?php
$arr = array_rand(range(1,100),5);
shuffle($arr);
var_dump(Doublemaopao($arr));
var_dump(maopao($arr));
//时间复杂度  为 n/2 *(n+1); => n^2/2+n/2
function Doublemaopao($arr){
	static $static =0;
	$lower =0;
	$high = count($arr)-1;
	while($lower<$high){
		//正向冒泡
		for($i=$lower;$i<=$high;$i++){
			$static++;
			if($arr[$lower]>$arr[$i]){
				$tmp = $arr[$i];
				$arr[$i] = $arr[$lower];
				$arr[$lower] = $tmp;
			}
		}
		$lower++;
		//反向冒泡
		for($j=$high;$j>=$lower;$j--){
			$static++;
			if($arr[$high]<$arr[$j]){
				$tmp = $arr[$j];
				$arr[$j] = $arr[$high];
				$arr[$high] = $tmp;
			}
		}
		$high--;
	}
	echo $static."\n";
	return $arr;

}

function maopao($arr){
	static $maopaonum=0;
	for($i=0;$i<count($arr);$i++){
		for($j=$i;$j<count($arr);$j++){
			$maopaonum++;
			if($arr[$i]>$arr[$j]){
				$tmp = $arr[$j];
				$arr[$j] = $arr[$i];
				$arr[$i] = $tmp;
			}
		}
	}
	echo $maopaonum."\n";
	return $arr;
}


