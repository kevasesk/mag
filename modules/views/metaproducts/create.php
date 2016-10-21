<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MetaProducts */

$this->title = 'Create Meta Products';
$this->params['breadcrumbs'][] = ['label' => 'Meta Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meta-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
