<?php
/*
	问题一：有五个猴子取一堆桃子每次从桃子中取出一个然后均分五分取走一份
	恰好分完问桃子最少个数 结果3121
*/
function questionOne(){
	for($i=6;;$i+=5){
		if(($num=$i-1)%5==0&&($num=$num*0.8-1)%5==0&&($num=$num*0.8-1)%5==0&&($num=$num*0.8-1)%5==0&&($num=$num*0.8-1)%5==0){
			echo $i;exit;
			break;
		}
	}
}
//questionOne();

/*
	问题二：某女士手里拎了一篮鸡蛋，从她身边奔跑而过一匹惊马，吓了她一跳，结果把篮里的鸡蛋，她说两个一数，三个一数，四个一数，五个一数时，余数分别为1，2，3和4。问篮里原有多少个鸡蛋？(打碎的鸡蛋.c)  
	分析：原来最少应该为5*1+4
	能被5整除步符为5
*/
function questiontwo(){
	for($i=9;;$i+=5){
		if($i%2==1&&$i%3==2&&$i%4==3&&$i%5==4){
			echo $i;
			break;
		}
	}
}
// questiontwo();
/*
新年晚会老师给大家分糖，手端着一盘糖，
让第一个同学先拿1块糖，再把盘中的糖分1/7给他；
然后让第二个同学拿2块糖，再把盘中的糖的1/7给他；
第三个同学拿3块糖后，仍把盘中的糖的1/7给他。
照这个办法分下去，最后一个同学自己拿完糖后，糖恰好分完，
而且每个人分到的糖块数相同。问共有几人？每人分几块糖？(分糖.C)
*/
function questionthree(){
	// $i; //人数
	// $m; //糖数
	$t=0;
	for($m=6;!$t;$m+=6){
		$t=1;$n=$m;
		for($i=$m-1;($i>=1)&&$t;$i--){
		 $j = $n/6+$i; //第$i个同学分到的数量
		 $n = $n/6*7+$i; //$i同学之前所剩糖的数量
		 if($j!=$m) $t=0;
		}
		}

	echo $m;exit;
}
// questionthree();
/*
	在爱尔兰守神节那天，
	举行每年一度的庆祝游戏，
	指挥者若将乐队排成10人、9人、8人、7人、6人、5人、4人、3人和2人时，
	最后的一排总是缺少一个人，
	那些人想这个位置大概是给数月前死去的乐队成员凯西还留着位置。
	指挥者见到总缺一人恼火了，叫大家排成一列纵队前进。
	假定人数不超过7000人，
	那么乐队究竟有多少人？(乐队人数.c)     (答案：2519人。)
*/
function questionfour(){
	$rel = 0;
	for($i=10;$i<=7000;$i+=10){
		//模拟排队过程
		for($j=9;$j>=1;$j--){
			if($i%($j+1)!=0) break;
			if($j==1){
				$rel = $i;
				break 2;
			} 
		}

	}
	echo  $rel-1;

}
 // questionfour();
/*
运动会连续开了N天，一共发了M枚奖牌。第一天发了一玫再加上剩下的1/7，
即第一天发了[1+(M-1)/7]枚；第二天发了两枚再加上剩下的1/7，
以后每天按此规律发奖牌，最后一天，第N天，刚好发完剩下的N枚奖牌。
问运动会开了几天？一共发了几枚奖牌
分析：最后一天发放的奖牌数为天数,每天发放的奖牌数加起来应该为总数量
*/
function questionfive(){
	 
}
 questionfive();