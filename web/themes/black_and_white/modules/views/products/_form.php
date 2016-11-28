<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\G;
/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'id_category')->textInput() ?>


<?php



echo ($categories) ? $form->field($model, 'id_category')->dropDownList($categories) : '';
//exit(print_R($categories));
echo ($manufacturers) ? $form->field($model, 'id_manufacturers')->dropDownList($manufacturers) : '';
// if no meta on product show this. if there is meta in product...show foreach fields
?>



    <h4>Атрибуты:</h4><br>

      <?php foreach($model->meta as $one)
            {

                if($one->meta_key!=='_image')
                {

                    echo $one->meta_key.": ".$one->meta_value."<br>";
                }
                else
                {
                    echo Html::img(G::getImage($model->id),['width'=>200,'height'=>200]);
                }

            }
                echo $form->field($upload, 'imageFile')->fileInput() ;
    ?>

    <?='<input type="text"  class="input-controll col-md-6" name="Metaproducts[meta_key][1]" >'?>
    <?='<input type="text"  class="input-controll col-md-6" name="Metaproducts[meta_value][1]" >'?>

    <a href="#" class="col-md-12" >добавить атрибут</a>




    <?//= $form->field($meta, 'id_product')->textInput() ?>

    <?//= $form->field($meta, 'meta_key')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($meta, 'meta_value')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
