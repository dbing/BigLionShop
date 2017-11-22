<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'zh-CN',
    'components' => [
        'log' => [
                    'traceLevel' => YII_DEBUG ? 3 : 0,
                    'targets' => [
                        [
                            'class' => 'notamedia\sentry\SentryTarget',
                            'dsn' => 'https://9d116318ab514c198b21072b26631568:67548dc2cbe0421cb1f0c6c200bcd5e5@sentry.io/244040',
                            'levels' => ['error'],
                            'context' => true // Write the context information. The default is true.
                        ],
                    ],
                ],

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
