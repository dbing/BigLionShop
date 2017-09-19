<?php
class Man{

    public static $name=2;

    public $num=3;

    static public function test(){
        echo 'hello';
    }
    public function demo(){
        echo'demo';
    }
}
$m = new Man;
echo'<hr>';

Man::test();

$className='Man';
$className::test();


?>