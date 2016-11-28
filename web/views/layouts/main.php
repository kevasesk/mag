<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
<body>

    <?php $this->beginBody() ?>
    <header>


        <div class="navmenu">
            <div class="row">
                <?php
                echo Menu::widget([
                    'items' => [

                        ['label' => 'Сайт', 'url' => ['/site/index']],
                        ['label' => 'Gii', 'url' => ['/gii']],

                    ],
                    'activeCssClass'=>'active',
                    'options'=>[
                        'class'=>'nav nav-pills',
                    ],
                ]);
                ?>
            </div>

        </div>
    </header>


    <div class="row content-admin">
        <div class="col-md-2">
            <?php
            $linkTemplate = '<a class="list-group-item" href="{url}">{label}</a>';
            echo Menu::widget([
                'encodeLabels' => false,
                'items' => [
                    ['label' => 'Контент','options'=>['class'=>'nav-header list-group-item']],
                    ['label' => '<i class="fa fa-shopping-cart" aria-hidden="true"></i> Продукты', 'url' => ['products/'],
                        'template'=>$linkTemplate,
                    ],
                    ['label' => '<i class="fa fa-cog" aria-hidden="true"></i> --Meta', 'url' => ['metaproducts/'],
                        'template'=>$linkTemplate,
                    ],

//                    ['label' => '<i class="fa fa-wpforms" aria-hidden="true"></i> Категории', 'url' => ['categories/'],
//                        'template'=>$linkTemplate,
//                    ],
//                    ['label' => '<i class="fa fa-trademark" aria-hidden="true"></i> Произвоители', 'url' => ['manufacturers/'],
//                        'template'=>$linkTemplate,
//                    ],
//                    ['label' => 'Управление','options'=>['class'=>'nav-header list-group-item']],
//                    ['label' => '<i class="fa fa-money" aria-hidden="true"></i> Заказы', 'url' => ['orders/'],
//                        'template'=>$linkTemplate,
//                    ],
//                    ['label' => '<i class="fa fa-users" aria-hidden="true"></i> Пользователи', 'url' => ['users/'],
//                        'template'=>$linkTemplate,
//                    ],
//                    ['label' => 'Система','options'=>['class'=>'nav-header list-group-item']],
//                    ['label' => '<i class="fa fa-cog" aria-hidden="true"></i> Настройки', 'url' => ['settings/'],
//                        'template'=>$linkTemplate,
//                    ],


                ],
                //'itemOptions'=>['class'=>''],
                'activeCssClass'=>'active',

                'options'=>[
                    'class'=>'nav nav-list',
                ],
            ]);
            ?>

        </div>
        <div class="col-md-10">
            <?= $content ?>
        </div>
    </div>
    <footer class="footer">
    </footer>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
