<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model app\models\SignupForm */

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


$this->title = 'Sign up';
?>
<div class="site-signup mt-3">
    <div class="row">
        <div class="col-lg-6 col-sm-12 mx-auto">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Please fill out the following fields to sign up:</p>
            <?php $form = ActiveForm::begin([
                'id' => 'signup-form',
                'class' => 'mx-auto',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-lg-3 col-sm-12',
                        'wrapper' => 'col-lg-9 col-sm-12'
                    ],
                ],
            ]); ?>

            <?= $form->field($model, 'username', ['enableAjaxValidation' => true])->textInput() ?>
            <?= $form->field($model, 'email', ['enableAjaxValidation' => true])->textInput() ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'password_repeat')->passwordInput() ?>
            <div class="form-group row field-signupform-birth-date required">
                <?= "<label class='control-label col-lg-3 col-sm-12'>{$model->getAttributeLabel('birth_date')}</label>"; ?>
                <div class="col-lg-9 col-sm-12">
                    <?php echo DatePicker::widget([
                        'model' => $model,
                        'attribute' => 'birth_date',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'mm-dd-yyyy'
                        ]
                    ]);
                    echo Html::error($model, 'birth_date', ['class' => 'invalid-feedback', 'style' => 'display:block']); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col p-0">
                    <?= Html::submitButton('Sign up', ['class' => 'btn btn-primary w-100 m-0', 'name' => 'signup-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
