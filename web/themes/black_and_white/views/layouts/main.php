<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Menu;
use app\models\Cart;
use yii\helpers\Url;
use app\models\G;
use app\assets\MyAppAsset;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

MyAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <?= Html::csrfMetaTags() ?>
    <title>Cool Technik</title>
    <?php $this->head() ?>
</head>
<!-----------------------------------POPUP----------------------------->
<div class="order-background">
</div>
    <div class="order-form">
        <div class="close">X</div>
        <div class="order-container">
            <form action="<?= Url::toRoute(['orders/create/']);?>" method="post">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <div class="row">
                    <span class="col-md-6">name:</span>
                    <?= Html::textInput('name',null,['class'=>'col-md-6',]); ?>
<!--                    <input type="text" class="col-md-6">-->
                </div>
                <div class="row">
                    <span class="col-md-6">surname:</span>
                    <?= Html::textInput('surname',null,['class'=>'col-md-6',]); ?>
                </div>
                <div class="row">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Cost</th>
                            <th>Count</th>
                            <th>Total Cost</th>
                        </tr>
                        <?php
                            $products=Cart::getFormatProducts();
                            echo Cart::tableRows($products);
                        ?>

                    </table>
                </div>

                <div class="order-controls">
                    <!-- Only AJAX only way to normal post data=------------------------------------------>
                    <input type="submit" value="Submit" class="submit-button">
                    <input type="button" value="Close" class="close-button">
                </div>
            </form>
        </div>

    </div>
<!-----------------------------------POPUP----------------------------->
<body>
<div class="main-container">
<header class="container">
    <div class="logo-container">
        <?php echo Html::img('@img/logo.png') ?>
    </div>
<div class="menu-container">
    <?php echo Menu::widget([
        'items' => [
            ['label' => 'Главная', 'url' => ['site/index']],
            ['label' => 'Корзина', 'url' => ['site/cartview']],
            !Yii::$app->user->isGuest ?['label' => 'Admin', 'url' => ['admin/']]:'',
            Yii::$app->user->isGuest ?['label' => 'Login', 'url' => ['/site/login']]:
                ['label' => 'Logout('.Yii::$app->user->identity->username.')', 'url' => ['site/logout'], ['data-method' => 'post']],
        ],
        'activeCssClass'=>'active',
        'options'=>[
            'class'=>'menu-list',
        ],
    ]);
    // echo Html::a('LogOut', ['site/logout'], ['data-method' => 'post']);
    ?>
</div>




</header>
<div class="categories-line">
    <div class="container">
        <ul>
            <li class="active"><a href="#">Телефоны</a></li>
            <li><a href="#">Планшеты</a></li>
            <li><a href="#">Ноутбуки</a></li>
            <li><a href="#">PC</a></li>
        </ul>
    </div>

</div>
<?php $this->beginBody() ?>
<div class="container">
    <?= $content ?>
</div>


<footer class="footer">
    <div class="container">
        1111
    </div>

</footer>

<?php $this->endBody() ?>
</div>
</body>
</html>
<?php $this->endPage() ?>
