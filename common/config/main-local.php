<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=pinche',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' =>false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',  //每种邮箱的host配置不一样
                'username' => '443663695@qq.com',
                'password' => 'rjmwokaczqdvcabe',
                'port' => '465/994',//'25',
                'encryption' => 'ssl',//'tls',

            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['443663695@qq.com'=>'admin']
            ],
        ],
    ],
];
