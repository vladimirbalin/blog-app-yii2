<?php
/**
 * @var $model Post
 */
$user = $model->createdBy->username ?? 'Guest';

use app\models\Post;
use yii\helpers\Html;
use yii\helpers\StringHelper; ?>


<div class="col">
    <div class="card card-body ">
        <h4 class="card-title"><?= Html::encode($model->title) ?></h4>
        <div class="bg-light p-2 mb-2 fs-6 fw-lighter">posted by: <span class="fw-bolder"><?= $user ?></span>
            on <?= Yii::$app->formatter->asDatetime($model->created_at, 'short') ?></div>
        <p class="card-text"><?= StringHelper::truncateWords(Html::encode($model->body), 40) ?></p>
        <?= Html::a('More', ['view', 'slug' => $model->slug], ['class' => 'btn btn-dark']) ?>
    </div>
</div>