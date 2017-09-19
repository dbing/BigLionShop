<?php

//类
class Man
{
    //属性
    public  $name;
    public  $age;
    //反法
    public  function  cry()
    {
     echo '666';
    }
}
//实例化Man
$m1=new Man;
$m1->name='lao';
$m1->age='30';
$m1->cry();
 var_dump($m1);

echo'<hr>';

$m2=new Man;
$m2->name='xiao';
$m2->age='18';
var_dump($m2);
$m2->cry();
