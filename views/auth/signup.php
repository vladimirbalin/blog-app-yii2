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

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'password_repeat')->passwordInput() ?>
            <?= $form->field($model, 'birth_month')->dropdownList(array_combine(range(01, 12), range(01, 12)), ['prompt' => 'Month']) ?>
            <?= $form->field($model, 'birth_day')->dropdownList(array_combine(range(01, 31), range(01, 31)), ['prompt' => 'Day']); ?>
            <?= $form->field($model, 'birth_year')->dropdownList(array_combine(range(1920, date('Y')), range(1920, date('Y'))), ['prompt' => 'Year']); ?>

            <div class="form-group">
                <div class="col p-0">
                    <?= Html::submitButton('Sign up', ['class' => 'btn btn-primary w-100 m-0', 'name' => 'signup-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
