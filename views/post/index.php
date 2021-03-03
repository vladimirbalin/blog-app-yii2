<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Posts');
?>
<div class="post-index">
    <? \yii\widgets\Pjax::begin(['options' => ['id' => 'my-pjax-container']])?>

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-8 offset-md-3">
            <?= Html::a(Yii::t('app', 'New Post'), ['create'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Newer first', ['index', 'sort'=> '-created_at'], ['class' => 'btn btn-dark float-right mx-1'])?>
            <?= Html::a('Older first', ['index', 'sort'=> 'created_at'], ['class' => 'btn btn-dark float-right mx-1'])?>
        </div>
    </div>
<div class="row">
    <div class="col-md-2 col-sm-2">
        <span>Sort by authors:</span>
        <?= Html::activeDropDownList(
            $searchModel,
            'created_by',
            User::getList(),
            [
                'class' => 'form-control',
                'prompt' => 'All authors',
                'onchange'=>
                    '$.pjax.reload({container: `#my-pjax-container`, url: `'.Url::to(['post/index']).'`, data: {created_by: $(this).val()}})',
            ]
        ) ?>
    </div>
    <div class="col-md-8 col-sm-10 mx-auto">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'col'],
            'itemView' => '_post',
            'layout' => "{pager}\n{items}\n{pager}",
            'pager' => ['class' => \yii\bootstrap4\LinkPager::class, 'options' => ['class' => 'my-3'],
                'linkOptions' => ['class' => ['page-link']]]
        ]) ?>
    </div>


</div>

    <? \yii\widgets\Pjax::end()?>
</div>
