<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2018/3/13
 * Time: 14:18
 */

namespace common\swoole;


use common\mail\Mailer;

class TaskRun
{
    public function receive($serv, $fd, $fromId, $data)
    {

    }

    public function task($serv, $taskId, $fromId, $data)
    {
        try {
            switch ($data['event']) {
                case TaskClient::EVENT_TYPE_SEND_MAIL:
                    $mailer = new Mailer;
                    $result = $mailer->yiiSend($data);
                    break;
                default:
                    break;
            }
            return $result;
        } catch (\Exception $e) {
            throw new \Exception('task exception :' . $e->getMessage());
        }
    }
    public function finish($serv, $taskId, $data)
    {
        return true;
    }
}