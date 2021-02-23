<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'd-flex justify-content-center'
        ]
    ]); ?>

    <?= $form->field($model, 'post_id')->textInput(['placeholder' => $model->attributeLabels()['post_id']])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['placeholder' => $model->attributeLabels()['title']])->label(false) ?>

    <?= $form->field($model, 'body')->textInput(['placeholder' => $model->attributeLabels()['body']])->label(false) ?>

    <div class="form-group align-self-end">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
