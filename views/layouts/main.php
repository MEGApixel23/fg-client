<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\MobileAppAsset;
use yii\helpers\Url;

MobileAppAsset::register($this);
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

    <script>
        var apiUrl = '<?= Yii::$app->params['api-url'] ?>';
    </script>
</head>
<body>
<?php $this->beginBody() ?>

<?php
$menus = [];
if (!Yii::$app->session->get('is_authorized')) {
    $menus = [
        [
            'name' => 'Auth',
            'url' => '/site/auth',
        ], [
            'name' => 'Sign-up',
            'url' => '/site/sign-up',
        ]
    ];
}

?>
<nav>
    <ul class="right hide-on-med-and-down">
        <? foreach ($menus as $menu) : ?>
            <li><a href="<?= Url::to($menu['url']) ?>"><?= $menu['name'] ?></a></li>
        <? endforeach ?>
    </ul>
    <ul id="slide-out" class="side-nav">
        <? foreach ($menus as $menu) : ?>
            <li><a href="<?= Url::to($menu['url']) ?>"><?= $menu['name'] ?></a></li>
        <? endforeach ?>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>

<div class="wrap">
    <div class="section no-pad-bot">
        <div class="container">
            <?= $content ?>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
<script>
    $(document).ready(function() {
        $(".button-collapse").sideNav();
    });

</script>
</body>
</html>
<?php $this->endPage() ?>
