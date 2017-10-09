<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,


    'qiniu' =>[
        'accessKey' =>'QkM8gW_De8SC65vXJcLqy2WzS8CGfaREnZhUFrUW',
        'secretKey' =>'2ptnzQ8odCQuHEk0Qst10-IfFDY0IAAJgewXp0y6',
        'bucket'    =>'biglionshop',
        'basePath'  =>'/uploads/',
        'domain'    =>'http://owirr329r.bkt.clouddn.com/',
        'imageView' =>[
            'recommend'     =>'imageView2/1/w/246/h/186/q/75|imageslim',
            'mini'          =>'imageView2/1/w/67/h/60/q/75|imageslim',
            'thumb'         =>'imageView2/1/w/194/h/143/q/75|imageslim',
            'middle'        =>'imageView2/1/w/433/h/325/q/75|imageslim',
        ]
    ]

];
