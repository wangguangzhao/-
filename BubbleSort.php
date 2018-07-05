<?php
header("content-type:text/html;charset=utf8;");
$arr = array_rand(range(1,10),5);
shuffle($arr); //打乱数组

/*
* @param 冒泡排序
* 它重复地走访过要排序的数列，一次比较两个元素，如果他们的顺序错误就把他们交换过来。
* 走访数列的工作是重复地进行直到没有再需要交换，也就是说该数列已经排序完成。
* */
function BubbleSort($arr){
	$length = count($arr);
	for($i=0;$i<$length;$i++){ //循环遍历元素
		for($j=$i;$j<$length;$j++){
			if($arr[$j] < $arr[$i]){
				$tmp = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $tmp;
			}
		}
	}
	return $arr;
}
function BubbleSort2($arr){
	$length = count($arr);
	for($i=1;$i<$length;$i++){ //循环遍历元素
		for($j=0;$j<=$i;$j++){
			if($arr[$j] > $arr[$i]){
				$tmp = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $tmp;
			}
		}
	}
	return $arr;
}
/*
* @param 选择排序法
* 每一次从待排序的数据元素中选出最小（或最大）的一个元素，存放在序列的起始位置，直到全部待排序的数据元素排完。
* 选择排序是不稳定的排序方法（比如序列[5， 5， 3]第一次就将第一个[5]与[3]交换，导致第一个5挪动到第二个5后面）
* */
function selectSort($arr){
	$length = count($arr);
	for($i=0; $i<$length;$i++){
		$minValue =$arr[$i]; //最小值
		$minIndex = $i;
		for($j=$i;$j<$length;$j++){
			if($arr[$j]<$minValue){
				$minValue = $arr[$j];
				$minIndex = $j;
			}
		}
		$arr[$minIndex] = $arr[$i];
		$arr[$i] = $minValue;
	}
	return $arr;
}
/*
* 插入排序法
* 每步将一个待排序的纪录，按其关键码值的大小插入前面已经排序的文件中适当位置上，直到全部插入完为止。
* 算法适用于少量数据的排序，时间复杂度为O(n^2)。是稳定的排序方法。
* */
function insertSort($arr){ //从小到大排列
	 for($i=1;$i<count($arr);$i++){
	 	$insertvalue = $arr[$i];
	 	$insertindex = $i-1;
	 	while($insertindex>=0 && $insertvalue>$arr[$insertindex]  ){
	 			$arr[$insertindex+1] = $arr[$insertindex]; 
	 			$insertindex--;	
	 		}
	 	if($insertindex+1 !== $i){ //非两个值相等的情况
	 		$arr[$insertindex+1] = $insertvalue;
	 	}
	 	
	 }
	 return $arr;
}
var_dump($arr);
// var_dump(BubbleSort($arr));
// var_dump(BubbleSort2($arr));
// var_dump(selectSort($arr));
var_dump(insertSort($arr));