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

        'alipay' =>[
            'class'         =>'bing\alipay\Payment',
            'partner'       =>'2088121321528708',                           //合作身份者id
            'seller_email'  =>'itbing@sina.cn',                             //收款支付宝账号
            'key'           =>'1cvr0ix35iyy7qbkgs3gwymeiqlgromm',           //安全检验码，
            'return_url'    =>'http://dev.biglionshop.com/order/return', //同步通知地址（注意：不能加?id=123这类自定义参数）
            'notify_url'    =>'http://demo.bingphp.com/notify.php', //异步通知地址（注意：同上且不能写成内网域如localhost）
            'refund_url'    =>'http://demo.bingphp.com/refund.php', //异步通知地址（注意：同上且不能写成内网域如localhost）

        ]        

    ],
];
