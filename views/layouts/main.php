<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$isGuest = Yii::$app->user->isGuest;
$items = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Tenants', 'url' => ['/tenant/display']],
            ['label' => 'Zone', 'url' => ['/zone/display']],
            ['label' => 'Categories', 'url' => ['/category/display']],
            ['label' => 'Floor', 'url' => ['/floor/display']],
            ['label' => 'Login', 'url' => ['/site/login']],
            ];
$adminItems = [];
if (!$isGuest) {
    array_push($adminItems, ['label' => 'Tenant', 'url' => ['/tenant/index']]);
    array_push($adminItems, ['label' => 'User', 'url' => ['/user/index']]);
    array_push($adminItems, ['label' => 'Zone', 'url' => ['/zone/index']]);
     array_push($adminItems, ['label' => 'Floor', 'url' => ['/floor/index']]);
      array_push($adminItems, ['label' => 'Category', 'url' => ['/category/index']]);
    array_push($adminItems, ['label' => 'Logout (' . Yii::$app->user->identity->username . ')','url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]);
}         



?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'SuperMall',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (!$isGuest) {
                  echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => $adminItems,
                    ]);
                    }
                else
                 {
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => $items,
                    ]);
                  }

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; SuperMall <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
