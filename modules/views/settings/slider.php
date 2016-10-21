<?php
    use yii\helpers\Html;
    use app\models\G;
    use yii\widgets\ActiveForm;
?>
<div class="page-title">Slider settings:</div>
<?php $form = ActiveForm::begin();

?>
    <table class="table admin-table">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>in slider</th>

        </tr>
        <?php

            //G::dd($model);
        foreach($model as $item){
        ?>
            <tr>
                <td><?php echo $item->id;?></td>
                <td><?php echo $item->title;?></td>
                <td><?php echo Html::img(G::getImage($item->id),[
                            'width'=>200,
                            'height'=>200,
                    ]);?></td>
                <td><input type="checkbox" name="<?php echo $item->id;?>" <?php if($item->in_slider) echo 'checked';?>></td>
            </tr>
        <?php } ?>
    </table>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>