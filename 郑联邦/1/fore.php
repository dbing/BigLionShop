<?php
class Cat
{
    public $name;
    public $age;
    public $color;

    public function __construct($name,$age,$color)
    {
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    public function getInfo()
    {
        echo '名字：'.$this->name;
        echo '<br>';
        echo '年龄：'.$this->age;
        echo '<br>';
        echo '颜色：'.$this->color;
        echo '<br>';
    }

}

$xx = new Cat('小白',3,'白色');

var_dump($xx);
$xx->getInfo();
?>