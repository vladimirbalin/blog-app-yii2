<?php
/**
 * @var $model User
 */

use app\models\User;
use yii\helpers\Html;
$this->title = 'Profile Page';
?>
<div class="p-5">
    <?= Html::a('Edit Profile', ['profile/edit'], ['class' => "btn btn-dark float-right"])?>
    <div class="display-4 font-weight-bold mb-5">User Detail</div>

    <ul class="list-unstyled">
        <li><span>Name:</span> <?= $model->getFullName()?></li>
        <li><span>Address:</span> <?= $model->getFullAddress()?></li>
        <li><span>Phone:</span> <?= $model->phone?></li>
        <li><span>Email:</span> <?= $model->email?></li>
    </ul>
</div>