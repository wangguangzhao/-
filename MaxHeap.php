<?php
require "./Heap.php";
class MaxHeap extends Heap{
	public function __construct($data){
		parent::__construct($data);
	}

	public function buildHeap(){
		$start = $this->length-1;
		while($start>=0){
			$this->adjusDownCreate($start);
			$start--;
		}
		return $this;
	}
	public function Sort(){
		 print_R($this->data);

		exit;
	}

	public function Xianxu(){
		$splqueue = new splqueue();
		$key = key($this->data);
		$splqueue->enqueue($key);
		$length = count($this->data);
		$current = $key;
		while(count($splqueue)>0 && $current<$length-1){
			$current = $splqueue->dequeue();
			echo $this->data[$current]."\n";
			$left = $this->getLeftIndex($current); //左子节点
			$right = $this->getRightIndex($current); //右子节点
			$splqueue->enqueue($left);
			$splqueue->enqueue($right);
		}
		
	}



	public function adjusDownCreate($key){
		 $max = $key;
		 $left = $this->getLeftIndex($key); //左子节点
		 $right = $this->getRightIndex($key); //右子节点
		 if($left<$this->length && $this->data[$left]>$this->data[$max]){
		 		$max = $left;
		 }
		 if($right<$this->length && $this->data[$right]>$this->data[$max]){
		 		$max = $right;
		 }
		 if($max!=$key){
		 	$this->exchange($max,$key);
		 	$this->adjusDownCreate($max);
		 	 
		 }
		  
	}
	public function adjusUpCreate($key){
		$parent = $this->getParentIndex($key);
		if($parent<0) return false;
		if($this->data[$parent]<$this->data[$key]){
			$this->adjusUpCreate($parent);
			$this->exchange($parent,$key);
		 	

		}
	}

	public function buildHeap2(){
		$key = $this->length-1;
	 	while($key>=0){
	 		$this->adjusUpCreate($key);
	 		print_R($this->data);
	 		$key--;
	 	}
	 	print_R($this->data);
	}
}