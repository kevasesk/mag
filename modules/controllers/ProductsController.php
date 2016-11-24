<?php

namespace app\modules\controllers;

use app\models\Categories;
use app\models\Manufacturers;
use app\models\MetaProducts;
use Yii;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'main';
        $searchModel = new ProductsSearch();
        $model=new Products();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model  = new Products();
        $meta   = new MetaProducts();
        $upload = new UploadForm();

        $all_categories=$this->resetArr(Categories::find()->select('title')->asArray()->all());
        $manufacturers=$this->resetArr(Manufacturers::find()->select('manufacturers_title')->asArray()->all());


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $new_meta=Yii::$app->request->post();
            $length=count($new_meta['Metaproducts']['meta_key']);
            for($i=0;$i<=$length;$i++)
            {
                $new_record=new MetaProducts();
                    $new_record->id_product=$model->id;
                    $new_record->meta_key = $new_meta['Metaproducts']['meta_key'][$i];
                    $new_record->meta_value = $new_meta['Metaproducts']['meta_value'][$i];
                $new_record->save();
            }
            $name=$this->actionUpload();

            $image=new MetaProducts();
                $image->id_product=$model->id;
                $image->meta_key = '_image';
                $image->meta_value = $name;
            $image->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('create', [
                'model' => $model,
                'meta'=>$meta,
                'categories'=>$all_categories,
                'manufacturers'=>$manufacturers,
                'upload'=>$upload,
            ]);
        }
    }
    public function resetArr($arr)
    {
        foreach ($arr as $ind=>$val)
        {
            $arr[$ind]=reset($arr[$ind]);
        }
        return $arr;
    }

    public function actionUpdate($id)
    {
        $model  = $this->findModel($id);
        $meta   = new MetaProducts();
        $upload = new UploadForm();

        $all_categories=$this->resetArr(Categories::find()->select('title')->asArray()->all());
        $manufacturers=$this->resetArr(Manufacturers::find()->select('manufacturers_title')->asArray()->all());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $name=$this->actionUpload();
            $image=MetaProducts::findOne(['meta_key'=>'_image','id_product'=>$model->id])?
                                MetaProducts::findOne(['meta_key'=>'_image','id_product'=>$model->id]):
                                    new MetaProducts();
                $image->id_product=$model->id;
                $image->meta_key = '_image';
                $image->meta_value = $name;
            $image->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'meta'=>$meta,
                'categories'=>$all_categories,
                'manufacturers'=>$manufacturers,
                'upload'=>$upload,

            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                return $model->name;

               // return $this->redirect(['index']);
            }
        }

       //return $this->render('upload', ['model' => $model]);
    }
}
