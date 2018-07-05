<?php
//双向链表
$spldoublylinklist = new SplDoublyLinkedList();
$arr = array(1,2,3,4,5,6,7,8,9);
foreach($arr as $item){
	$spldoublylinklist->push($item);
}

function getCurrent($hand){
	echo $hand->current()."\n";
}
$spldoublylinklist->rewind(); //重置制针
$spldoublylinklist->next(); //后继
getCurrent($spldoublylinklist);
echo $spldoublylinklist->prev(); //前驱
getCurrent($spldoublylinklist);
echo $spldoublylinklist->bottom()."\n"; //1
echo $spldoublylinklist->top()."\n";//9
echo count($spldoublylinklist)."\n";//元素个数9
echo $spldoublylinklist->getIteratorMode()."\n";//0
echo $spldoublylinklist->isEmpty()."\n"; //false
echo $spldoublylinklist->offsetExists(4)."\n"; //检查索引是否存在 true
echo $spldoublylinklist->offsetGet(4)."\n"; //获取索引对应值 5 
echo $spldoublylinklist->offsetSet(4,"wgz");//替换值
echo $spldoublylinklist->offsetGet(4)."\n"; //获取索引对应值 wgz
echo $spldoublylinklist->offsetUnset(4); //删除索引值为4的值
echo $spldoublylinklist->offsetGet(4)."\n"; //获取索引对应值 6删除后删除元素的后继指向删除元素的前驱
$spldoublylinklist->serialize()."\n"; //得到元素的序列化值
// var_dump( $spldoublylinklist->unserialize( $spldoublylinklist->serialize()));
echo $spldoublylinklist->current()."\n";
echo count($spldoublylinklist)."\n";
echo "=======================\n";
$spldoublylinklist->next();
$spldoublylinklist->next();
echo $spldoublylinklist->current()."\n";
$spldoublylinklist->unshift("wgz"); //链表首添加元素
echo count($spldoublylinklist)."\n";
echo $spldoublylinklist->bottom()."\n"; //wgz
echo $spldoublylinklist->shift()."\n"; //删除链表首部元素
echo $spldoublylinklist->bottom()."\n"; //1
