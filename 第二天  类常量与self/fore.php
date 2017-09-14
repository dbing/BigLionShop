<?php
class Man{

    public static $num=1;
    public function __construct()
    {
        self::$num += 1;
    }

}

echo Man::$num;

echo '<br>';

function demo()
{
    $num=0;
    echo $num += 1;
}

demo();		// 1
demo();		// 1
?>