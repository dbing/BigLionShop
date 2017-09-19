<?php
class Demo{
    public $name='demo';
    const pi=3.1245926;

    public function getFi(){
        echo self::pi;
    }
}

echo Demo::pi;

?>