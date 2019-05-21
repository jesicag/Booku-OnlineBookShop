<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Cart;
use frontend\models\CartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\web\ForbiddenHttpException;
use frontend\models\User;
use frontend\models\Stock;
use yii\helpers\Json;
use yii\web\ErrorAction;
use common\widgets\Alert;
/**
 * CartController implements the CRUD actions for Cart model.
 */
class CartController extends Controller
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
     * Lists all Cart models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex_cart($status){
         $user = Yii::$app->user->id;
         $searchModel = new CartSearch();
         $dataProvider = new ActiveDataProvider([
            'query' => Cart::find()->where(['user_id'=> $user]),
            'pagination'=>['pageSize'=>20,],
         ]);

         return $this->render('index',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'status' => $status,
         ]);
    }

    public function actionCancel($id, $stock){
     $update_stock = Stock::findOne($stock);
     $update_stock->book_stock+=1;
     $update_stock->save();

     $this->findModel($id)->delete();
     return $this->redirect(Url::to(['cart/index_cart', 'status'=>'view']));
    }

    public function actionApprove($id){
        // $tan = date("Y-m-d");
        
        // //$tanggal = date_format($date, "Y-m-d");
        $model = Cart::findOne($id);
        // $model->buy_date = $tan;
        $model->save();

        return $this->redirect(['index']);
    }

    public function actionReject($id, $stock){
        $update_stock = Stock::findOne($stock);
        // $model->buy_date = '0000-00-00';
        $model->save();

        return $this->redirect(Url::to(['cart/index', 'status'=>'view']));
    }


    /**
     * Displays a single Cart model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cart();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cart model.
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
     * Deletes an existing Cart model.
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
     * Finds the Cart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cart::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPay(){
        $user = Yii::$app->user->id;
        $model = new Cart();
        $sum = Yii::$app->db->createCommand('SELECT sum(cost) FROM cart WHERE user_id='.$user)->queryScalar();
        $s = User::findOne($user);
        $s->sum_cost = $sum;
        $s->save();

        $model->generateSequence();
        
        $session = Yii::$app->session;
        $buyings = [];
        if ($session->has('buyings')){
            $buyings = $session->get('buyings');
        }
        $buyings[$model->seq] = $model;
        $session->set('buyings', $buyings);
        
        $params = [
            'api_key' => Yii::$app->params['api_key'],
            'receiver_no' => Yii::$app->params['merchant_account_no'],
            'amount' => $sum,
            'code' => $model->seq
        ];
        
        $sikilatUrl  = Yii::$app->params['sikilat'] . "?data=" . Json::encode($params);
        
        Yii::$app->response->redirect($sikilatUrl);
        Yii::$app->end();
    }

}
