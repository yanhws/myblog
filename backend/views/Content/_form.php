<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Meta;

/* @var $this yii\web\View */
/* @var $model common\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?
    //分类
    $metas = Meta::find()->where(['type' => Meta::TYPE_CATEGORY])->asArray()->all();
    $metas = array_column((array)$metas, 'name', 'mid');

    echo $form->field($model, 'metas[]')
        ->checkboxList($metas,
            ['value' => $model->getMetas()->select('mid')->asArray()->column()]
        );
    ?>

    <? //$form->field($model, 'created')->textInput(['maxlength' => true]) ?>

    <? //$form->field($model, 'modified')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>

    <? // $form->field($model, 'authorId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commentsNum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'allowComment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'allowPing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'allowFeed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
