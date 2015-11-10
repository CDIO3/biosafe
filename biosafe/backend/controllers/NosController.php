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
use backend\models\Bakteeri;
use yii\helpers\ArrayHelper;
use backend\models\DFmodel;
use backend\models\NosAnalysoitavat;
use backend\models\Tulokset;
use yii\web\Response;
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
           
            ]
           
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
        $modelsBakteeri = [new NosAnalysoitavat];

                       
                         


       

        if ($model->load(Yii::$app->request->post()))//if ($model->load(Yii::$app->request->post()))//if ($model->load(Yii::$app->request->post()) && $model->save(false)) // //
            {

                        $model->luontipvm = date('Y-m-d');                    
                        $model->henkilo_id = Yii::$app->user->getId();

                        $model->save(false);

             $modelsBakteeri = DFmodel::createMultiple(NosAnalysoitavat::classname());
             DFmodel::loadMultiple($modelsBakteeri, Yii::$app->request->post());

            // ajax validation
            /* if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsBakteeri),
                    ActiveForm::validate($modelCustomer)
                );
            } */

            // validate all models
            $valid = $model->validate();
            $valid = DFmodel::validateMultiple($modelsBakteeri) && $valid;
           
           echo '<script>alert("here it stops")</script>';
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                //try {
                    echo '<script>alert("try")</script>';
                    //$modeli_id = $model->id;

                    if ($flag = $model->save(false)) {
                        foreach ($modelsBakteeri as $modelBakteeri) 
                        {
                            $modelBakteeri->nos_id = $model->id;
                            //$modelBakteeri->bakteeri_id = 
                            //$modelBakteeri->bakteeri_id = ArrayHelper::getValue($model->arraBakteeri);
                            echo '<script>alert("häähää")</script>';
                            //$modelBakteeri->nos_id = $model->id;
                            //$modelBakteeri->save(false);
                            if (! ($flag = $modelBakteeri->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                            
                        }
                    }
                    if ($flag) {
                        $transaction->commit();                     
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
               /* } catch (Exception $e) {
                    $transaction->rollBack();
                } */
            }





             // tässä loppuu
            

        
           /* $i = 0;
            foreach ($model->array as $key => $value)
            {

                $model2 = new NosAnalysoitavat();
                $model2->nos_id = $model->id;
                $model2->bakteeri_id = $arraBakteeri;
                $model2->osanaytteita_n = $i . $Osanaytteita_n;
                $model2->osanaytteita_c = $i . $Osanaytteidenmaara_c;
                $model2->save();
                $i++;
            } */
            

            //return $this->redirect(['view', 'id' => $model->id]);

         } else {

            //echo '<script>alert("asdasd")</script>';
            return $this->renderAjax('create', [
                'model' => $model,
                'modelsBakteeri' => (empty($modelsBakteeri)) ? [new NosAnalysoitavat] : $modelsBakteeri
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
            return $this->render('update', [
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
        $model = new Send();

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
    public function actionTulokset($id)
    {
        //as
        $model = new Tulokset();
        $modelsBakteeri = [new Tulokset];
        $model2 = new NosAnalysoitavat();
        $bakteeri = new Bakteeri();
        $array = [];
        
        /* if( $_POST ) {
            die( print_r($_POST) );
            // or use
            // die( var_dump($_POST) );
        } */
               


    

       $modelsBakteeri = [new Tulokset];

                       
                         


       

        if ($model->load(Yii::$app->request->post()))//if ($model->load(Yii::$app->request->post()))//if ($model->load(Yii::$app->request->post()) && $model->save(false)) // //
            {

                        $model->luontipvm = date('Y-m-d');                    
                        $model->henkilo_id = Yii::$app->user->getId();

                        $model->save(false);

             $modelsBakteeri = DFmodel::createMultiple(Tulokset::classname());
             DFmodel::loadMultiple($modelsBakteeri, Yii::$app->request->post());

            // ajax validation
            /* if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsBakteeri),
                    ActiveForm::validate($modelCustomer)
                );
            } */

            // validate all models
            $valid = $model->validate();
            $valid = DFmodel::validateMultiple($modelsBakteeri) && $valid;
           
           echo '<script>alert("here it stops")</script>';
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                //try {
                    echo '<script>alert("try")</script>';
                    //$modeli_id = $model->id;

                    if ($flag = $model->save(false)) {
                        foreach ($modelsBakteeri as $modelBakteeri) 
                        {
                            $modelBakteeri->nos_id = $model->id;
                            //$modelBakteeri->bakteeri_id = 
                            //$modelBakteeri->bakteeri_id = ArrayHelper::getValue($model->arraBakteeri);
                            echo '<script>alert("häähää")</script>';
                            //$modelBakteeri->nos_id = $model->id;
                            //$modelBakteeri->save(false);
                            if (! ($flag = $modelBakteeri->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                            
                        }
                    }
                    if ($flag) {
                        $transaction->commit();                     
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
               /* } catch (Exception $e) {
                    $transaction->rollBack();
                } */
            }
        else 
        {
            //$lkm = NosAnalysoitavat::find()->where(['nos_id' => $id, ])
            $model->nos_id = $id;
             $count = NosAnalysoitavat::find()->where(['nos_id' => $id])->all();

             //$array = Bakteeri::find()->asArray()->where(['id' => $count->bakteeri_id])->all();

            foreach ($count as $key => $value) {
                $bakteerin_id = Bakteeri::findOne($value->bakteeri_id);

                $array[$key] = ['id' =>$value->bakteeri_id, 'nimi'=>$bakteerin_id->nimi];
                //$array = Arrayhelper::map(Bakteeri::find()->where[]$value->bakteeri_id));
            } 
            /* if ($model->bakteeri_id == 1) {$model->m_tulos1 = "ASD";}
            else {$model->m_tulos1 = "HAA";} */

             return $this->render('tulokset',[
                'model'=>$model,
                'array'=>$array,
                
                ]);


              if (isset($_POST['btnHae'])) {$model->m_tulos1 = "12123213";}
            else {$model->m_tulos1 = "HAA";}
        }

    }

    public function actionKirjaus($id)
    {
        
        //$model = new Tulokset();
        //$model->bakteeri_id = $id;
        //$model->nos_id = $id;

        //$lkm = NosAnalysoitavat::find()->where(['nos_id' => $id, 'bakteeri_id' => $bakteeri]);

       echo "<?= $form->field($model, 'nos_id')->textInput(['readonly' => true]) ?>
     
        <?= $form->field($model, 'm_tulos1')->textInput() ?>
        <?= $form->field($model, 'M_tulos2')->textInput() ?> ";


    }
 


}
