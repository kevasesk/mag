<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Menu;
use app\models\Cart;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\LinkPager;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<!-----------------------------------POPUP----------------------------->
<div class="order-background">
</div>
    <div class="order-form">
        <div class="close">X</div>
        <div class="order-container">
            <form action="/order/create" method="post">
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
                            $products=Cart::getFormatProducts(Cart::getCookies());
                            echo Cart::tableRows($products);
                        ?>

                    </table>
                </div>

                <div class="order-controls">
                    <input type="button" value="Submit" class="submit-button">
                    <input type="button" value="Close" class="close-button">
                </div>
            </form>
        </div>

    </div>


<!-----------------------------------POPUP----------------------------->
<body>
<div class="main-container">
<header>
    <div class="row logo">
        <div class="col-md-6">
<!--            <img src="images/logo.png" width="250" />-->
        </div>
        <div class="col-md-6">
            <div class="row">Телефоны:</div>
            <div class="row">+38(063)-472-74-23</div>
            <div class="row">+38(095)-472-74-23</div>
        </div>
    </div>

    <div class="navmenu">
        <div class="row">
            <div class="col-md-8">


            </div>
            <div class="col-md-4">
                <?php

                echo Menu::widget([
                    'items' => [
                        ['label' => 'Главная', 'url' => ['site/index']],
                        ['label' => 'Гарантии', 'url' => ['site/guaranty']],
                        ['label' => 'Корзина', 'url' => ['site/cartview']],
                        !Yii::$app->user->isGuest ?['label' => 'Admin', 'url' => ['admin/']]:'',
                        Yii::$app->user->isGuest ?['label' => 'Login', 'url' => ['/site/login']]:
                        ['label' => 'Logout('.Yii::$app->user->identity->username.')', 'url' => ['site/logout'], ['data-method' => 'post']],
                    ],
                    'activeCssClass'=>'active',
                    'options'=>[
                        'class'=>'nav nav-pills',
                    ],
                ]);
               // echo Html::a('LogOut', ['site/logout'], ['data-method' => 'post']);
               ?>

            </div>
        </div>

    </div>
</header>
<?php $this->beginBody() ?>




    <div class="container">

        <?= $content ?>
    </div>


<footer class="footer">

</footer>

<?php $this->endBody() ?>
</div>
</body>
</html>
<?php $this->endPage() ?>
