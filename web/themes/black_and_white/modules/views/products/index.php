<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\G;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-conteiner">


    <div class="page-title"><?= Html::encode($this->title) ?> Admin</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=>'',
        'columns' => [
            'id',
            'title',
            'cost',
            [
                'label' => 'Image',
                'format' => 'raw',
                'value' => function($data){

                    return !($data)?
                        '(No img)':
                        Html::img(G::getImage($data->id),
                            [
                                'width'=>'50',
                                'height'=>'50'
                            ]
                        );

                },
            ],
            [
                'label' => 'Category',
                'format' => 'raw',
                'value' => function($data){

                    return !($data->category->title)? '(No category)':$data->category->title;

                },
            ],
            [
                'label' => 'Manufacturer',
                'format' => 'raw',
                'value' => function($data){

                    return !($data->manufacturer->manufacturers_title)? '(No manuf)':$data->manufacturer->manufacturers_title;

                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
