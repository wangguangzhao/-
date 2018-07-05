<?php
/**
 * 取栈中最小元素 要求时间复杂度为o(1) 
 * 思路用中间栈储存最小元素 入栈出栈时维护
 *
*/

class StackDemo{
	
	//储存栈
	private $stackdata = null;
	//中间栈
	private $stackdata2 = null;
	
	public function __construct($arr = array()){
		$this->stackdata = new SplStack;
		$this->stackdata2 = new SplStack;
		
		$this->initStack($arr);
	}
	
	
	/**
	 * 构造栈
	 * @param unknown $arr
	 */
	public function initStack($arr = array()){
		if(empty($arr)) return false;
		foreach($arr as $value){
			$this->inStack($value);
		}
	}
	
	
	/**
	 * 入栈
	 * @param unknown $value
	 */
	public function inStack($value){
		if(!$this->stackdata) return;
		$this->stackdata->push($value);
		if($this->stackdata2->isEmpty()|| $this->stackdata2->top()>$this->stackdata->top() ){
			$this->stackdata2->push($this->stackdata->top());
		}else{
			$this->stackdata2->push($this->stackdata2->top());
		}
	}
	
	/**
	 * 出栈
	 */
	public function outStack(){
		if($this->stackdata->isEmpty()) return ;
		$this->stackdata2->pop();
		return $this->stackdata->pop();
	}
	
	/**
	 *获取栈中最小元素 
	 */
	public function getMinValue(){
		if(!$this->stackdata2) return null;
		
		return $this->stackdata2->top();
	}
}

$obj = new StackDemo(array("7","2","4","6","8","1","3","5"));
$obj->inStack(0);

 
var_dump($obj->getMinValue());exit;
