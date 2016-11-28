<?php


namespace app\assets;

use yii\web\AssetBundle;


class MyAppAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/black_and_white';
    public $baseUrl = '@web/themes/black_and_white';
    public $css = [
        'css/style.css',
        'css/slider.css',
        'css/jquery.bxslider.css'
        //'css/jquery.bxslider.css',
        //'css/slider.css',
    ];
    public $js = [
        'js/jquery.bxslider.min.js',
        'js/slider.js',
        'js/order.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}

