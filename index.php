<?php
require "./MaxHeap.php";
$data = array(1,2,4,5,3,6,9,8,7);
// $data = array(1,2,4,5,3);
$obj = new MaxHeap($data );
$obj->buildHeap2();

