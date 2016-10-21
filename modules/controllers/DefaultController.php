<?php

namespace app\modules\controllers;

use Yii;
use yii\web\Controller;
use app\models\Products;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest)
        {
            return $this->redirect('/site/index');
        }
        else
        {
            return $this->render('index');
        }


    }

}
