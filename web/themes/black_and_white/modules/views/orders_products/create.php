<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrdersProducts */

$this->title = 'Create Orders Products';
$this->params['breadcrumbs'][] = ['label' => 'Orders Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
