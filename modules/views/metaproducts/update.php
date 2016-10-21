<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MetaProducts */

$this->title = 'Update Meta Products: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Meta Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meta-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
