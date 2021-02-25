<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\controllers\PostController;
use app\controllers\ProfileController;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'sticky-top navbar-expand-lg navbar-dark bg-dark',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            ['label' => Yii::t('main', 'Home'), 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Posts', 'url' => ['/post'], 'active' => get_class($this->context) === PostController::class],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Create account', 'url' => ['/auth/signup'], 'visible' => Yii::$app->user->isGuest],
            ['label' => 'Login', 'url' => ['/auth/login'], 'visible' => Yii::$app->user->isGuest],
            ['label' => 'My Profile', 'url' => ['/profile'], 'visible' => !Yii::$app->user->isGuest, 'active' => get_class($this->context) === ProfileController::class],
            !Yii::$app->user->isGuest ? (
                '<li>'
                . Html::beginForm(['/auth/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username .')',
                    ['class' => 'btn btn-link nav-link border-0']
                )
                . Html::endForm()
                . '</li>'
            ) : '',
            ['label' => 'ru', 'url' => ['/site/ru'], ],
            ['label' => 'en', 'url' => ['/site/en']],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">Simple blog app <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
