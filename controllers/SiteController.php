<?php

namespace app\controllers;

use app\models\MetaProducts;
use app\models\Products;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Session;
use yii\data\Pagination;
use app\models\G;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [

        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $products   = Products::find()->all();
        $query      = Products::find();
        $countQuery = clone $query;

        $pages      = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize'=>50,
        ]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        //G::dd(G::getProductImages());exit();


        return $this->render('index',[
                'model'=>$products,
                'models'=>$models,
                'pages' => $pages,
                'slider'=>G::getProductImages(),
            ]);
    }
    public function actionCart($id)
    {

        Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'cart',
            'value' =>Yii::$app->request->cookies['cart']->value.','.$id,
        ]));
        return $this->redirect('index');
    }
    public function actionCartview()
    {
        $items=explode(',',Yii::$app->request->cookies['cart']->value);
        unset($items[0]);
        $filtered_items=array_count_values($items);

        return $this->render('cart',[
            'products'=>$filtered_items
        ]);
    }
    public function actionDelcartitem($id)
    {
        //exit(print_R(Yii::$app->request->cookies['cart']->value));




        //ERROR   get cookies->to arr->uset->unset item->rewrite cookie->go to cartview!!!!!!!!!!!!!!!!
        $items=explode(',',Yii::$app->request->cookies['cart']->value);
        unset($items[0]);
        foreach ($items as $key=>$item)
        {
            if($item==$id)
            {
                unset($items[$key]);
                break;
            }
        }
        //$products=Products::findAll($items);
        $filtered_items=array_count_values($items);
       // $filtered_items['0']=$filtered_items[''];
        //unset($filtered_items['']);
       //G::ddd($filtered_items);
        Yii::$app->request->cookies['cart']->value=implode(',',$filtered_items);
        return $this->render('cart',[
            'products'=>$filtered_items
        ]);
    }
    public function actionProducts($id)
    {
        $products=new Products();
        return $this->render('view_products', [
            'model' => $products::findOne($id),

        ]);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        //exit('dfgdfg');
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
}
