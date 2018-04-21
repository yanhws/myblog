<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => yii\grid\SerialColumn::class],

            'cid',
            'title',
            'slug',
            [
                'label' => '分类',
                'value' => function ($model) {
                    $metas = [];
                    foreach ($model->metas as $m) {
                        $metas[] = $m->name;
                    }
                    return implode('，', $metas) ?: '--';

                }
            ],
            'created:date',
            'modified:date',
            //'text:ntext',
            //'order',
            //'authorId',
            //'template',
            //'type',
            //'status',
            //'password',
            //'commentsNum',
            //'allowComment',
            //'allowPing',
            //'allowFeed',
            //'parent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
