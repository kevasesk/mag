<?php

namespace app\models;

class G
{
    public static function dd($arg=null)
    {
        echo "<pre>";
        print_r($arg);
        echo "</pre>";
    }
    public static function ddd($arg=null)
    {
        echo "<pre>";
        print_r($arg);
        echo "</pre>";
        exit();
    }
    public static function getProductImages()
    {
        $products = Products::find()->all();
        foreach ($products as $i=>$one)
        {
            $tmp_img='';
            if($one->in_slider)
            {
                foreach ($one->meta as $meta) {
                    if ($meta->meta_key == '_image') {
                        $tmp_img = $meta->meta_value;
                        break;
                    }
                }
                $formated_slider_images[$one->id] = $tmp_img;
            }
        }
        return $formated_slider_images;
    }
    public static function getImage($prod_id)
    {
        $products = Products::findOne($prod_id);
        foreach($products->meta as $meta)
        {
            if ($meta->meta_key == '_image')
                return '/../uploads/'.$meta->meta_value;
        }
    }
}