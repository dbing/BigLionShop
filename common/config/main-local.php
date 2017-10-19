<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=biglionshop',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix'=>'yii_',

        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => 'bingphp@163.com',
                'password' => 'bing123',
                'port' => '25',
                'encryption' => 'tls',
            ],
        ],


    ],
];
