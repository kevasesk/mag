<?php
use yii\widgets\LinkPager;
use app\models\Cart;
?>


   <!--     <div class="dm-image-conteiner">

                <a href="" class="fa fa-chevron-left"></a>
                <img class="dm-image" img-num="0" />

                    <div style="table-cell">
                        <ul style="display:table;" class="dm-points">
                        </ul>
                    </div>
                <a href="" class="fa fa-chevron-right"></a>

        </div>

    <script src="/js/jquery.bxslider.min.js"></script>
    <link href="/css/jquery.bxslider.css" rel="stylesheet" />
     -->


    <ul class="bxslider">
        <?php
            foreach($slider as $key=>$img){
        ?>
            <li data-id="<?php echo $key;?>"><a href=""><img src="../uploads/<?php echo $img;?>" /></a></li>
        <?php } ?>
    </ul>
<div class="row navmenu">
    <ul class="nav nav-pills">
        <li class="active"><a href="#">Телефоны</a></li>
        <li><a href="#">Планшеты</a></li>
        <li><a href="#">Ноутбуки</a></li>
        <li><a href="#">PC</a></li>
    </ul>
</div>

<div class="row products-list" >
    <?php


    foreach($models as $item){?>

    <div class="col-md-3" >
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
            <div class="row">
                <h3>META:</h3>
                <?php foreach($item->meta as $one_meta)
                {
                    if($one_meta->meta_key!="_image")
                    {
                        echo $one_meta->meta_key.":".$one_meta->meta_value."<br>";
                    }

                }
                ?>
            </div>
            <div class="row">
                <a href="/site/cart?id=<?=$item->id;?>" class="btn btn-default">Add to chart</a>
                <a href="/site/products?id=<?=$item->id;?>" class="btn btn-default">Info</a>
            </div>
        </div>
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