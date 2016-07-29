<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
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
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (!Yii::$app->user->isGuest) {
        $leftMenuItems = [
            ['label' => '控制台', 'items' => [
                ['label' => '概要', 'url' => ['/site/index']],
                ['label' => '个人设置', 'url' => ['/site/profile']],
            ]],
            ['label' => '撰写', 'items' => [
                ['label' => '撰写文章', 'url' => ['/post/create']],
                ['label' => '创建页面', 'url' => ['/page/create']],
            ]],
            ['label' => '管理', 'items' => [
                ['label' => '文章', 'url' => ['/post']],
                ['label' => '独立页面', 'url' => ['/page']],
                ['label' => '评论', 'url' => ['/comment']],
                ['label' => '分类', 'url' => ['/category']],
                ['label' => '标签', 'url' => ['/tag']],
                ['label' => '文件', 'url' => ['/media']],
                ['label' => '用户', 'url' => ['/user']],
            ]],
            ['label' => '设置', 'items' => [
                ['label' => '基本', 'url' => ['/option/index']],
            ]],
        ];
        //
        $rightMenuItems = [
            [
                'label' => '登出(' . Yii::$app->user->identity->screenname . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
            //查一下 urlManage的作用
            ['label' => '网站', 'url' => Yii::$app->frontendUrlManager->getHostInfo(), 'linkOptions' => ['target' => '_blank']],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $leftMenuItems,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $rightMenuItems,
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
