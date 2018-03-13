<?php
namespace common\mail;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2018/3/12
 * Time: 17:28
 */
class Mailer
{
    public $transport;
    public $mailer;
    /**
     * 发送邮件类 参数 $data 需要三个必填项 包括 邮件主题`$data['subject']`、接收邮件的人`$data['to']`和邮件内容 `$data['content']`
     * @param Array $data
     * @return bool $result 发送成功 or 失败
     */
    public function send($data)
    {
        $this->transport = (new Swift_SmtpTransport('smtp.qq.com', 25))
            ->setEncryption('tls')
            ->setUsername('443663695@qq.com')
            ->setPassword('xxxx');
        $this->mailer = new Swift_Mailer($this->transport);

        $message = (new Swift_Message($data['subject']))
            ->setFrom(array('443663695@qq.com' => '白狼栈'))
            ->setTo(array($data['to']))
            ->setBody($data['content']);

        $result = $this->mailer->send($message);

        // 释放
        $this->destroy();
        return $result;
    }
    public function destroy()
    {
        $this->transport = null;
        $this->mailer = null;
    }

    public function yiiSend($data)
    {
        $mail= \Yii::$app->mailer->compose();
        $mail->setTo(array($data['to']));
        $mail->setSubject($data['subject']);
        //$mail->setTextBody('zheshisha ');   //发布纯文字文本
        $mail->setHtmlBody("<br>问我我我我我".$data['content']);    //发布可以带html标签的文本
        if($mail->send())
            echo "success";
        else
            echo "failse";
        die();
    }
}