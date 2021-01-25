<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Sign up';
?>
<div class="site-signup mt-3">
    <div class="row">
        <div class="col-6 mx-auto">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Please fill out the following fields to sign up:</p>

            <?php             $form = ActiveForm::begin([
                'id' => 'login-form',
                'class' => 'mx-auto',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-lg-2 control-label',
                        'wrapper' => 'col'
                    ],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'password_repeat')->passwordInput() ?>


            <div class="form-group">
                <div class="col p-0">
                    <?= Html::submitButton('Sign up', ['class' => 'btn btn-primary w-100 m-0', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
