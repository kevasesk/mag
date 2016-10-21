<?php
use app\models\Products;
use app\models\G;
use yii\helpers\Html;
//print_R($products);

//print_R($products);
$products_items=Products::findAll(array_keys($products));
G::dd($products);

foreach($products_items as $key=>$item){?>

    <div class="col-md-3" >
        <div class="single-product-container">
            <div class="row"><img src=""></div>
            <div class="row"><?=$item->id;?></div>
            <div class="row"><?=$item->title;?></div>
            <div class="row"><?=$item->cost;?> $</div>
            <div class="row">cat:<?=$item->category->title;?></div>
            <div class="row">
                <h3>META:</h3>
                <?php foreach($item->meta as $one_meta)
                {
                    if($one_meta->meta_key=="_image")
                    {
                        echo Html::img(G::getImage($item->id),[
                            'width'=>200,
                            'height'=>200,
                        ]);
                        //"<img src='../uploads/{$one_meta->meta_value}'>";
                    }
                    else
                    {
                        echo $one_meta->meta_key.":".$one_meta->meta_value."<br>";
                    }

                }
                ?>
            </div>
            <div class="row">
                <?= Html::a('delete one', ['site/delcartitem/','id'=>$item->id]) ?>
                <?= Html::a('delete all', ['site/delcartitem/','id'=>null]) ?>
<!--                <a href="/delcartitem?id=--><?//=$item->id;?><!--" >delete one</a><br>-->
<!--                <a href="/delcartitem?id=null" >delete all</a>-->
            </div>
            <div class="row">
               COUNT:<?=$products[$item->id];
                ?>
            </div>
        </div>
    </div>

 <?php } ?>
<?=Html::a('To order','#',['class'=>'order-button']);?>



