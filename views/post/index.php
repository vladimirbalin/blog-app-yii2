<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Posts');
?>
<div class="post-index">
    <? \yii\widgets\Pjax::begin()?>

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row justify-content-center">


        <div class="col-10 mx-auto">
            <?php \yii\widgets\ActiveForm::begin(['options' => ['class' => 'w-25 d-inline-block']]) ?>
            <span>Sort by authors:</span>
            <?= Html::activeDropDownList(
                $searchModel,
                'created_by',
                User::getList(),
                [
                    'class' => 'form-control',
                    'prompt' => 'All authors',
                    'onchange'=>'this.form.submit()'
                ]
            ) ?>
            <?php \yii\widgets\ActiveForm::end() ?>
            <?= Html::a(Yii::t('app', 'New Post'), ['create'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Newer first', ['index', 'sort'=> '-created_at'], ['class' => 'btn btn-dark float-right mx-1'])?>
            <?= Html::a('Older first', ['index', 'sort'=> 'created_at'], ['class' => 'btn btn-dark float-right mx-1'])?>
        </div>
    </div>
<div class="row">
    <div class="col-md-10 col-sm-12 mx-auto">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'col'],
            'itemView' => '_post',
        ]) ?>
    </div>

</div>

    <? \yii\widgets\Pjax::end()?>
</div>
