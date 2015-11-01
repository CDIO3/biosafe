<?php

namespace backend\controllers;

use Yii;
use backend\models\Nos;
use backend\models\NosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\NosBakteerit;
use yii\widgets\Pjax;
use backend\models\send;
/**
 * NosController implements the CRUD actions for Nos model.
 */
class NosController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Nos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Nos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Nos();
        

        if ($model->load(Yii::$app->request->post())) 
        {
            $model->luontipvm = date('Y-m-d');
          
            $model->henkilo_id = Yii::$app->user->getId();
            $model->save(false);

            foreach ($model->array as $key => $value)
            {
                $model2 = new NosBakteerit();
                $model2->nos_id = $model->id;
                $model2->bakteeri_id = $value;
                $model2->save();
            }
            

            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Nos model.
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
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Nos model.
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
     * Finds the Nos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionSend($id)
    {
        $model = new Send;

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $nos1 = Nos::findOne($id);
            $nos1->nayte_lahetetty = 'Kyllä';
            $nos1->update();
            $model->henkilo_id = Yii::$app->user->getId();            
            $model->save();
            return $this->redirect(['view', 'id' => $model->nos_id]);
        }
        else 
        {  
            $snimi =Yii::$app->user->identity->sukunimi;
            $enimi = Yii::$app->user->identity->etunimi;
            //$model->henkilo_id = $enimi . ' ' . $snimi;
            $model->nos_id = $id;            
            $model->lahetyspvm =  date('Y-m-d');
            return $this->render('sendView',['model'=>$model]);

          
        }
    }
 


}
