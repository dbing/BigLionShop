<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'zh-CN',

    'components' => [

        /*
        'redis' => [
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => '127.0.0.1',
                'port' => 6379,
                'database' => 0,
            ],
        ],        
        */
        
        'cache' => [
            'class' => 'yii\caching\FileCache',

        ],
        
    ],
];
