<?php
use yii\widgets\LinkPager;
use app\models\Cart;
?>
    <ul class="bxslider">
        <?php
            foreach($slider as $key=>$img){
        ?>
            <li data-id="<?php echo $key;?>"><a href=""><img src="../uploads/<?php echo $img;?>" /></a></li>
        <?php } ?>
    </ul>

<div class="block-title">
    <span>Сортировать по:</span>
</div>


<div class="products-list" >
    <?php


    foreach($models as $item){?>


        <div class="single-product-container">
            <div class="row">
                <?php
                $img='';
                    foreach($item->meta as $one_meta){
                        if($one_meta->meta_key=="_image") {
                            $img=$one_meta->meta_value;
                            break;
                        }
                    }
                ?>
                <img src='../uploads/<?php echo $img;?>'>
            </div>
            <div class="row"><?=$item->title;?></div>
            <div class="row"><?=$item->cost;?> $</div>
            <div class="row">cat:<?=$item->category->title;?></div>
            <div class="row meta-row">
                <h5>Дополнительная информация:</h5>
                <?php foreach($item->meta as $one_meta)
                {
                    if($one_meta->meta_key!="_image")
                    {
                        echo $one_meta->meta_key.":".$one_meta->meta_value."<br>";
                    }

                }
                ?>
            </div>

            <a href="/site/cart?id=<?=$item->id;?>" class="left">Add to chart</a>
            <a href="/site/products?id=<?=$item->id;?>" class="right">Info</a>



        </div>

     <?php } ?>

</div>

<div class="pagination-container">
    <?php
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
    ?>
</div>


<!--<div class="row pagination-container">
    <ul class="pagination">
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
    </ul>
</div>
-->