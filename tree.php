<?php
header("content-type:text/html;charset=utf8");
/*
树节点类
	构造树数据结构
*/

class Tree{
	protected $parentNode = null; //父节点
	protected  $currentNode = null; //当前节点
	protected $childNode = array(); //子节点

	public function __construct(Tree $currentNode){
		$this->currentNode = $currentNode;
	}
	//添加子节点
	public  function addChildNode(Tree $childNode){
		$key = spl_object_hash($childNode);
		$this->childNode[$key] = $childNode;
	}
	//添加子节点
	public  function getChildNode(){
		return $this->childNode;
	}
	public function hasChildrenNode(){
		return !empty($this->childNode);
	}
	//删除子节点
	public  function removeChildNode(Tree $childNode){
		$key = spl_object_hash($childNode);
		reset($this->childNode[$key]);
	}
	//执行父节点
	public function addParentNode(Tree $parentNode){
		$this->parentNode = $parentNode;
	}
	public function getParentNode(){
		return $this->parentNode;
	}
	public function hasParentNode(){
		return $this->parentNode;
	}
}

//节点接口
interface Node{
	public function printNode(); //打印node信息
}
/*
	节点元素类
*/
class PersionNode extends Tree implements Node{
	private $name = null;
	private $age = 0;
	public function __construct($strArr){
		if(!empty($strArr)){
			foreach($strArr as $key=>$value){
				$this->$key = $value;
			}
		}
		parent::__construct($this);
	}
	public function printNode(){
		// var_dump($this);
		var_dump($this->currentNode);
	}
	public function __get($key){
		return $this->$key;
	}
}

// $test = new PersionNode(array("name"=>"张太爷",'age'=>90));
// $test->printNode();
// // var_dump($test);


$laotaiye = new PersionNode(array("name"=>"张太爷",'age'=>90));

$laozhang = new PersionNode(array("name"=>"老张",'age'=>75));
$laozhangge = new PersionNode(array("name"=>"老张哥",'age'=>78));
$laozhangjie = new PersionNode(array("name"=>"老张姐",'age'=>76));
$laozhangmei1 = new PersionNode(array("name"=>"老张妹1",'age'=>74));
$laozhangmei2 = new PersionNode(array("name"=>"老张妹2",'age'=>70));

$zhangyi = new PersionNode(array("name"=>"张一",'age'=>56));
$zhanger = new PersionNode(array("name"=>"张二",'age'=>54));
$zhangsan = new PersionNode(array("name"=>"张三",'age'=>52));
$zhangsi = new PersionNode(array("name"=>"张四",'age'=>50));
$zhangwu = new PersionNode(array("name"=>"张五",'age'=>48));
$zhangliu = new PersionNode(array("name"=>"张六",'age'=>46));
$zhangqi = new PersionNode(array("name"=>"张七",'age'=>44));
 
$xiaozhangyi = new PersionNode(array("name"=>"小张一",'age'=>26));
$xiaozhanger = new PersionNode(array("name"=>"小张二",'age'=>24));
$xiaozhangsan = new PersionNode(array("name"=>"小张三",'age'=>22));
$xiaozhangsi = new PersionNode(array("name"=>"小张四",'age'=>20));
$xiaozhangwu = new PersionNode(array("name"=>"小张五",'age'=>18));
$xiaozhangliu = new PersionNode(array("name"=>"小张六",'age'=>16));
$xiaozhangqi = new PersionNode(array("name"=>"小张七",'age'=>14));

 
$laotaiye->addChildNode($laozhang);
$laotaiye->addChildNode($laozhangge);
// $laotaiye->addChildNode($laozhangjie);
// $laotaiye->addChildNode($laozhangmei1);
// $laotaiye->addChildNode($laozhangmei2);
 
$laozhang->addChildNode($zhangyi);
$laozhang->addChildNode($zhanger);
$laozhangge->addChildNode($zhangsan);
$laozhangge->addChildNode($zhangsi);
$laozhangge->addChildNode($zhangwu);
$laozhangge->addChildNode($zhangliu);
$laozhangge->addChildNode($zhangqi);

// $zhangyi ->addChildNode($xiaozhangyi);
// $zhanger ->addChildNode($xiaozhanger);
// $zhangsan ->addChildNode($xiaozhangsan);
// $zhangsi ->addChildNode($xiaozhangsi);
// $zhangwu ->addChildNode($xiaozhangwu);
// $zhangliu ->addChildNode($xiaozhangliu);
// $zhangqi ->addChildNode($xiaozhangqi);

function init(&$node){
	if(!$node) return;
	foreach($node->getChildNode() as &$childNode){
		$childNode->addParentNode($node);
		init($childNode);
	}
}
//BFS广度优先遍历
function bsfFunc($head){
	//声明一个队列存储遍历对象
	$queue = new SplQueue();
	$queue->enqueue($head);
	while(count($queue)>0){
		$current = $queue->dequeue();
		$childrens = $current->getChildNode();
		echo $current->name."\n";
		foreach($childrens as $node){
			$queue->enqueue($node);
		}
		
	}

}
//广度优先变形，将队列变为栈
function bsfFuncP($head){
	 $splstack = new SplStack();
	 $splstack->push($head);
	 while(count($splstack)>0){
	 	$current = $splstack->pop();
	 	echo $current->name."\n";
	 	foreach($current->getChildNode()as $node){
	 		 $splstack->push($node);
	 	}
	 }
}
//深度优先遍历
function dsfFunc($head){
	if(!$head) return;
	$childrens = $head->getChildNode();
	echo $head->name."\n";
	foreach($childrens as $children){
		dsfFunc($children);
	}
	
}

//回溯、深度优先（dfs）、递归区别
//以上山为例说明
//回溯:回溯是一种找路方法，搜索的时候走不通就回头换路接着走，直到走通了或者发现此山根本不通。
//dfs:是一种开路策略，就是一条道先走到头，再往回走一步换一条路走到头，这也是回溯用到的策略。在树和图上回溯时人们叫它DFS。
//递归是一种行为，回溯和递归如出一辙，都是一言不合就回到来时的路，所以一般回溯用递归实现；当然也可以不用，用栈。
//回溯法遍历
//思路定义边界
$splstack = new SplStack();
function backtracking($head){
	global $splstack;
	if(!$head) return;
	foreach($head->getChildNode() as $node){
		backtracking($node);
	}
	$splstack->push($head);

	for($i=0;$i<count($splstack);$i++){
			$current = $splstack->pop();
			echo $current->name."\n";
	}
}




bsfFunc($laotaiye); //广度优先
echo "===========\n";
dsfFunc($laotaiye); //深度优先
 echo "===========\n";
backtracking($laotaiye);
 