<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2018/3/14
 * Time: 14:50
 */

namespace common\swoole;


class WebSocketServer
{
    private $_serv;

    public function __construct()
    {
        $this->_serv = new \swoole_websocket_server("0.0.0.0", 9501);
        $this->_serv->set([
            'worker_num' => 1,
        ]);
        $this->_serv->on('open', [$this, 'onOpen']);
        $this->_serv->on('message', [$this, 'onMessage']);
        $this->_serv->on('close', [$this, 'onClose']);
    }

    /**
     * @param $serv
     * @param $request
     */
    public function onOpen($serv, $request)
    {
        echo "server: handshake success with fd{$request->fd}.\n";
    }

    /**
     * @param $serv
     * @param $frame
     */
    public function onMessage($serv, $frame)
    {
        $serv->push($frame->fd, "服务端接收到数据 :{$frame->data}");
    }
    public function onClose($serv, $fd)
    {
        echo "client {$fd} closed.\n";
    }

    public function start()
    {
        $this->_serv->start();
    }
}