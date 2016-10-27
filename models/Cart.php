<?php

namespace app\models;

use Yii;

class Cart
{
    public static function getCookies()
    {
        $items=explode(',',Yii::$app->request->cookies['cart']->value);
        unset($items[0]);
        return array_count_values($items);
    }
    public static function getFormatProducts($products)
    {
        $format=[];
        $prods=Products::findAll(array_keys($products));
        foreach ($prods as $key=>$product)
        {
            $format[]=[
                'id'=>$product->id,
                'name'=>$product->title,
                'cost'=>$product->cost,
                'count'=>$products[$product->id],
                'total_cost'=>$products[$product->id]*$product->cost,
            ];
        }
        return $format;
    }
    public static function tableRows($products)
    {
            $return='';
        foreach ($products as $key=>$product)
        {
            $return.="<tr>";
                $return.="<input type='hidden' name='products[]' value='{$product['id']}'>";
                $return.="<td>{$product['name']}</td>";
                $return.="<td>{$product['cost']}</td>";
                $return.="<td><input type='hidden' name='count[]' value='{$product['count']}'>{$product['count']}</td>";
                $return.="<td>{$product['total_cost']}</td>";
            $return.="</tr>";
        }
        return $return;
    }
}