<?php
header("Content_type:text/html;charset=utf-8");

class Man
{
    public $name;

    public  function say(){
        echo 'hello!';
    }
    public function __construct(){
        echo '奥利给';
    }
}
$m=new Man;
$m->say();