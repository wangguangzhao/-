<?php 

class Tree{
	public  $value;
	public $left;
	public $right;
	public function __construct($value){
		$this->value = $value;
	}
}
// $arr = array_rand(range(1,30),10);
// shuffle($arr); //打乱数组
 
 $arr = array("10","9","8","12","15","20","5","6","7");

 $root = new Tree(current($arr));
for($i=1;$i<count($arr);$i++){
	createTree( $root ,$arr[$i]);
}
var_dump($arr);
//var_dump($root);
// var_dump(treefind($root,'8'));
// $result = array();
// preorderTraversal($root,$result);
// var_dump($result);

$result1 = array();
inorderTraversal($root,$result1);
var_dump($result1);
 
// $result2 = array();
// postorderTraversal($root,$result2);
// var_dump($result2);

var_dump(getTreedepth($root));

 /****
 创建二叉树
$obj数对象，value 值
 ****/
function createTree($root,$value){
	//构造节点
	if(!$root){
		$root = new Tree($value);
		return $root; 
	}
	//在右节点
	if($value>$root->value){
		$root->right = createTree($root->right,$value);
	}else if($value<$root->value){ //在右节点
		$root->left = createTree($root->left,$value);
	}else{
		$root->value = $value;
	}
 		return $root;
}
/*
二叉查找树
$root :根节点
$value:查询值
@return boolean 返回值 
*/
function treefind($root,$value){
	if(!$root) return false;
	if($root->value==$value) return true;
	if($root->value>$value) return treefind($root->left,$value);
	if($root->value<$value) return treefind($root->right,$value);
}

//先序遍历
function preorderTraversal($root,&$result){
	 if(!$root) return;
	 $result[] = $root->value;
	 if($root->left) preorderTraversal($root->left,$result);
	 if($root->right) preorderTraversal($root->right,$result);
}

//中序遍历
function inorderTraversal($root,&$result){
	if(!$root) return;
	 if($root->left) inorderTraversal($root->left,$result);
	  $result[] = $root->value;
	 if($root->right) inorderTraversal($root->right,$result);
}


//中序遍历
function postorderTraversal($root,&$result){
	if(!$root) return;
	 if($root->left) postorderTraversal($root->left,$result);  
	 if($root->right) postorderTraversal($root->right,$result);
	 $result[] = $root->value;
}

/*
获取树的深度
@param $root 根节点
@return int
*/
function getTreedepth($root){
	$current = $root;
	$num=0;
	while($current){
		if($current->left){
			 $current = $current->left;
		}else if($current->right){
			 $current = $current->right;
		}else{
			$current=null;
		}
		$num++;
	}
	return $num;
}

 