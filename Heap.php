<?php
/*
	抽象堆
*/

abstract class Heap{
	protected $data = array();
	protected $length =0;
	public function __construct($data){
		$this->data = $data;
		$this->length = count($data);
	}
	//自上而下构造
	abstract function adjusDownCreate($key);
	//自下而上构造
	abstract function adjusUpCreate($key);

	//获取索引index的父节点
	public function getParentIndex($index){
		return floor(($index-1)>>1);
	}
	//获取index的左子节点
	public function getLeftIndex($index){
		return ($index<<1)+1;
	}
	//获取index的左子节点
	public function getRightIndex($index){
		return ($index<<1)+2;
	}
	//将$startIndex,$endIndex索引内容互换
	public function exchange($startIndex,$endIndex){
		$tmp = $this->data[$startIndex];
		$this->data[$startIndex] = $this->data[$endIndex];
		$this->data[$endIndex] = $tmp;
	}


}