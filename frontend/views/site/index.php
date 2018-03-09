<?php
use yii\bootstrap\Carousel;
use yii\grid\GridView;
use \yii\helpers\Html;

/* @var $this yii\web\View */
?>
<div class="site-index">
    <?= Carousel::widget([
        'items' => [
            // 包含图片和字幕的格式
            [
                // 必要的，轮播的内容（HTML），比如一个图像标签
                'content' => '<img src="http://v2.bootcss.com/assets/img/bootstrap-mdo-sfmoma-03.jpg"/>',
                // 可选的，该轮播标题（HTML）
                'caption' => '<h4>This is title</h4><p>测试Carousel的内容</p>',
                // 可选的，轮播样式
                'options' => [],
            ],
            [
                'content' => '<img src="http://v2.bootcss.com/assets/img/bootstrap-mdo-sfmoma-03.jpg"/>',
                'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
                'options' => [],
            ],
        ]
    ]);
    ?>

    <div class="jumbotron">
        <p class="lead">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                     ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    [
                        'attribute' => 'title',
                        'format' => 'raw',
                        'value' => function($data) {
                            $url = "/site/view?id=".$data->id;
                            return Html::a($data->title, $url, ['title' => '标题']);
                        }
                    ],
                    'type',
                    'cost',
                    'car_models',
                    'place_departure',
                    'destination',
                    // 'departure_time',
                    // 'arrival_time',
                    'contact_name',
                    'contact_mobile',
                    // 'remark',
                    // 'create_time',
                    // 'last_update_time',
                    // 'create_by',
                    //['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
