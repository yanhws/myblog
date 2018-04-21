<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CommentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'coid') ?>

    <?= $form->field($model, 'cid') ?>

    <?= $form->field($model, 'created') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'authorId') ?>

    <?php // echo $form->field($model, 'ownerId') ?>

    <?php // echo $form->field($model, 'mail') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'agent') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'parent') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
