<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2018/3/13
 * Time: 14:19
 */

namespace common\swoole;


class TaskClient
{
    private $client;
    const EVENT_TYPE_SEND_MAIL = 'send-mail';

    public function __construct ()
    {
        $this->client = new swoole_client(SWOOLE_SOCK_TCP);
        if (!$this->client->connect('127.0.0.1', 9501)) {
            $msg = 'swoole client connect failed.';
            throw new \Exception("Error: {$msg}.");
        }
    }
    /**
     * @param $data Array
     * send data
     */
    public function sendData ($data)
    {
        $data = $this->togetherDataByEof($data);
        $this->client->send($data);
    }
    /**
     * 数据末尾拼接EOF标记
     * @param Array $data 要处理的数据
     * @return String json_encode($data) . EOF
     */
    public function togetherDataByEof($data)
    {
        if (!is_array($data)) {
            return false;
        }
        return json_encode($data) . "\r\n";
    }
}