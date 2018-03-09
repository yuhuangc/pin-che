<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PcTravel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '拼车行程', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pc-travel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('报名', ['register', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            'type',
            'cost',
            'car_models',
            'place_departure',
            'destination',
            'departure_time',
            'arrival_time',
            'contact_name',
            'contact_mobile',
            'remark',
            'create_time',
            //'last_update_time',
            //'create_by',
        ],
    ]) ?>

</div>
