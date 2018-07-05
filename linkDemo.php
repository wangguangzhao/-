<?php
/*
单向链表数据结构
*/

class SlinkArray{
	private $nextSlink = null;
	private $element = null;
	public function __construct($element){
		$this->element = $element;
	}
	public function __set($key,$value){
		  $this->$key = $value;
	}
	public function __get($key){
	 	  return $this->$key;
	}
	public function __toString(){
		 return $this->nextSlink;
	}
}
/*
	遍历输出单链表对象
*/
function traverseSlink(SlinkArray $obj){
	$current = $obj;
	while($current){
		var_dump($current->element);
		$current = $current->nextSlink;
	}
}
//reverseSlink
function reverseSlink(SlinkArray $obj){
	$prevSlink = null;
	$current = $obj;
	$rel = null;
	while ($current) {
		$nextslink = $current->nextSlink;
		if($nextslink==null){
			 $rel = $current;
		}
		$current->nextSlink = $prevSlink;
		$prevSlink = $current;
		$current = $nextslink;
	}
	return $rel;
}


//构造单向链表654789123
$head = new SlinkArray(6,null);
$slink5 = new SlinkArray(5,null);
$slink4 = new SlinkArray(4,null);
$slink7 = new SlinkArray(7,null);
$slink8 = new SlinkArray(8,null);
$slink9 = new SlinkArray(9,null);
$slink1 = new SlinkArray(1,null);
$slink2 = new SlinkArray(2,null);
$slink3 = new SlinkArray(3,null);

$head->nextSlink = $slink5;
$slink5->nextSlink = $slink4;
$slink4->nextSlink = $slink7;
$slink7->nextSlink = $slink8;
$slink8->nextSlink = $slink9;
$slink9->nextSlink = $slink1;
$slink1->nextSlink = $slink2;
$slink2->nextSlink = $slink3;

traverseSlink($head);
echo "\n";
$head2=reverseSlink($head);
echo "\n";
traverseSlink($head2);


/*
	双向链表
*/
class DbllinkArray{
	public $prevSlink=null; //前驱
	public $nextSlink=null; //后继
	public $element = null; //节点内容
	public function __construct($element,$prevSlink,$nextSlink){
		$this->element = $element;
		$this->prevSlink = $prevSlink;
		$this->nextSlink = $nextSlink;
	}
}