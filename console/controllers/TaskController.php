<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2018/3/13
 * Time: 14:34
 */

namespace console\controllers;


use common\swoole\TaskServer;
use common\swoole\WebSocketServer;
use yii\console\Controller;

class TaskController extends Controller
{
    public function actionSwooleRun()
    {
        $taskServer = new TaskServer();
        $taskServer->start();
    }

    public function actionWebSocketRun()
    {
        $server = new WebSocketServer;
        $server->start();
    }
}