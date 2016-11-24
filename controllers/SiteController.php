<?php

namespace app\controllers;

use app\models\MetaProducts;
use app\models\Products;
use app\models\Cart;
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

        Cart::add($id);
        return $this->redirect('index');
    }
    public function actionCartview()
    {

        return $this->render('cart',[
            'products'=>Cart::getProductsFromCookies()
        ]);
    }
    public function actionDelcartitem($id)
    {
        //exit(print_R(Yii::$app->request->cookies['cart']->value));




        //ERROR   get cookies->to arr->uset->unset item->rewrite cookie->go to cartview!!!!!!!!!!!!!!!!
        Cart::del($id);
        return $this->redirect(['/site/cartview']);
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
