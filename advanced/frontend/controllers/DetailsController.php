<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Details;
use frontend\models\DetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Stock;
use frontend\models\User;
use frontend\models\Cart;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\web\ForbiddenHttpException;

/**
 * DetailsController implements the CRUD actions for Details model.
 */
class DetailsController extends Controller
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

    /**
     * Lists all Details models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $cart = Yii::$app->cart;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBuy($id, $book_id){
        if(Yii::$app->user->can('request_detail')){
            $user_id = Yii::$app->user->id;
            $price = Yii::$app->db->createCommand('SELECT price FROM details where id='.$id)->queryScalar();

            $tan = date("Y-m-d");
            $date = date_create($tan);
            date_add($date, date_interval_create_from_date_string("7 days"));

            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->stock_id = $id;
            $cart->buy_date = $tan;
            $cart->total+=1;
            $cart->cost = $price;
            $cart->save(false);

            //update stock buku
            $stock = Stock::findOne($id);
            $stock->book_stock-=1;
            $stock->save();

            return $this->redirect(Url::to(['cart/index_cart', 'status' => 'success']));
        }else{
            return $this->redirect(Url::to(['site/index']));
        }
    }    

    /**
     * Displays a single Details model.
     * @param integer $id
     * @return mixed
     */
     public function actionView($id)
    { 
        if(Yii::$app->user->can('view_detail')){
            $stock = new Stock();
            //$detail = new Details();
            $detail = Details::find()->where(['id'=>$id])->one();
            $stock = Stock::find()->where(['book_id' => $detail->id]);

            $DataProvider = new ActiveDataProvider(
                [
                    'query' => $stock,
                    //'pagination' => ['pageSize'=>20]
                ]
            );
            return $this->render('view', [
            'model' => $detail,
            'stock' => $stock,
            'dataProvider' => $DataProvider,]);
        }else{
            return $this->redirect(Url::to(['site/login']));   
        }
    }

    /**
     * Creates a new Details model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Details();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Details model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Details model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Details model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Details the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Details::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}