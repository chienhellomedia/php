<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=sql311.byethost3.com;dbname=b3_20601722_tony',
            'username' => 'b3_20601722',
            'password' => 'chiendaica2712',
            'charset' => 'utf8',
        ],
        // 'mailer' => [
        //     'class' => 'yii\swiftmailer\Mailer',
        //     'viewPath' => '@common/mail',
        //     // send all mails to a file by default. You have to set
        //     // 'useFileTransport' to false and configure a transport
        //     // for the mailer to send real emails.
        //     'useFileTransport' => true,
        // ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport'=> [
                'class'=> 'Swift_SmtpTransport',
                'host'=> 'smtp.gmail.com',
                'username' =>'luongitbkap@gmail.com',
                'Password' =>'luongit!%@$',
                'encryption' =>'ssl',
                'Port'=>'465',
            ]
        ],
    ],
];
