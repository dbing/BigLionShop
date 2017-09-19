<?php
class Circle{

    const  PI=3.1415926;

    function getS($r){
        return self::PI*$r*$r;
    }
    function getC($r){
        return 2*self::PI*$r;
    }
}
$circle=new Circle;
echo $circle->getS(6);
echo'<br>';
echo $circle->getC(10);

?>