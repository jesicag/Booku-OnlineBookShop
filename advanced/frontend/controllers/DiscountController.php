<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Discount;
use frontend\models\DiscountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Details;
use frontend\models\DetailsSearch;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\web\ForbiddenHttpException;
use frontend\models\User;
use yii\helpers\Json;
use yii\web\ErrorAction;
use common\widgets\Alert;
/**
 * DiscountController implements the CRUD actions for Discount model.
 */
class DiscountController extends Controller
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
     * Lists all Discount models.
     * @return mixed
     */
    public function actionIndex()
    {
        $user = Yii::$app->user->id;
        $searchModel = new DiscountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Discount model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDiscount(){
        $cat = Yii::$app->db->createCommand('SELECT category FROM discount')->queryScalar();
        // var_dump($cat);die();
        // $discount = Discount::find()->where(['category'=>$cat])->one();
        // $det = Details::find()->all();
        // $searchModel = new DetailsSearch();
        $query = Details::find()->where(['category'=>$cat]);
        
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query
            ]
        );
        return $this->render('discount',[
            // 'model'=> $discount,
//            'det' => $det,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Discount model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Discount();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Discount model.
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
     * Deletes an existing Discount model.
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
     * Finds the Discount model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Discount the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Discount::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPay(){
        $user = Yii::$app->user->id;
        $model = new Discount();
        $cat = Yii::$app->db->createCommand('SELECT category FROM discount')->execute();
        // $pr = Details::find()->where(['category'=>$cat]);
        // $pa = Discount::find()->where(['category'=>$pr]);
        $pri = Yii::$app->db->createCommand('SELECT price FROM details WHERE category='.$cat)->queryScalar();
        $per = $model->percent;

        $jl = $pri*$per*0.01;
        $s = User::findOne($user);
        $s->sum_cost = $jl;
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
            'amount' => $jl,
            'code' => $model->seq
        ];
        
        $sikilatUrl  = Yii::$app->params['sikilat'] . "?data=" . Json::encode($params);
        
        Yii::$app->response->redirect($sikilatUrl);
        Yii::$app->end();
    }
}
