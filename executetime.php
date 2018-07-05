<?php
class Tree{
	public $data = array();
	public function __construct($arr){
		$this->data = $arr;
	}
	function printTree($arr){

	}
	//获取父节点
	function getParentNode($index){
		return floor(($index-1)/2);
	}
	//左子节点
	function getleftNode($index){
		return  ($index<<2)+1;
	}
	//又子节点
	function getrightNode($index){
		return  ($index<<2)+2;
	}
}



$arr = array(1,3,54,69,58,24,15,68,47,12,45,36);
