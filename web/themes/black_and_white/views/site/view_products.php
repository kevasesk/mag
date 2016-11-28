<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'cost',
            'id_category',
            'id_manufacturers',
        ],
    ]) ?>
    <h3>META:</h3><br>
    <?php foreach($model->meta as $one_meta)
    {
        if($one_meta->meta_key=='_image')
        {
            echo "image:";
            echo "<img src='/../uploads/{$one_meta->meta_value}' /><br>"; 
        }
        else
        {
            echo $one_meta->meta_key.":";
            echo $one_meta->meta_value."<br>";
        }
        
       
    }?>

</div>
