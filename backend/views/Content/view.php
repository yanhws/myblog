<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([ 
        'model' => $model,
        'attributes' => [
            'cid',
            'title',
            'slug',
            'created',
            'modified',
            [
                'label' => '分类',
                'value' => function ($model) {
                    $metas = $model->getmetas()->asarray()->all();
                    return implode('，', array_column($metas, 'name')) ?: '--';
                }
            ],
            'text:ntext',
            'order',
            'authorId',
            'template',
            'type',
            'status',
            'password',
            'commentsNum',
            'allowComment',
            'allowPing',
            'allowFeed',
            'parent',
        ],
    ]) ?>

</div>
