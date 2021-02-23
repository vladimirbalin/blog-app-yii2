<?php

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
        <?= $this->render('_search', ['model' => $searchModel]) ?>
        <div class="col-6 mx-auto">

            <?= Html::a(Yii::t('app', 'New Post'), ['create'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Newer first', ['index', 'sort'=> '-created_at'], ['class' => 'btn btn-dark float-right mx-1'])?>
            <?= Html::a('Older first', ['index', 'sort'=> 'created_at'], ['class' => 'btn btn-dark float-right mx-1'])?>
        </div>
    </div>
<div class="row">
    <div class="col-md-6 col-sm-12 mx-auto">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'col'],
            'itemView' => '_post',
        ]) ?>
    </div>

</div>

    <? \yii\widgets\Pjax::end()?>
</div>
