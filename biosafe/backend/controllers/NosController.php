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
use yii\db\ActiveQuery;
use app\components\PhpArrayFormatter;
use yii\helpers\Json;
use backend\models\Info;

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
           
           //echo '<script>alert("Suunnitelma luotu")</script>';
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                //try {
                    //echo '<script>alert("try")</script>';
                    //$modeli_id = $model->id;

                    if ($flag = $model->save(false)) {
                        foreach ($modelsBakteeri as $modelBakteeri) 
                        {
                            $modelBakteeri->nos_id = $model->id;
                            //$modelBakteeri->bakteeri_id = 
                            //$modelBakteeri->bakteeri_id = ArrayHelper::getValue($model->arraBakteeri);
                            //echo '<script>alert("häähää")</script>';
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
                                           
                        //return $this->redirect(['view', 'id' => $model->id]);
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
            throw new NotFoundHttpException('Sivua ei löytynyt');
        }
    }
    
    public function actionInfo($id)
    {
        $model = new Info();

        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
           
            return $this->redirect(['view', 'id' => $model->nos_id]);
        }
        else 
        {  
            $snimi =Yii::$app->user->identity->sukunimi;
            $enimi = Yii::$app->user->identity->etunimi;
            $model->nos_id = $id;   
            $model->bakteeri_id;
            return $this->render('info',['model'=>$model]);

          
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
            //return $this->redirect(['view', 'id' => $model->nos_id]);
        }
        else 
        {  
            //$snimi =Yii::$app->user->identity->sukunimi;
            //$enimi = Yii::$app->user->identity->etunimi;
            //$model->henkilo_id = $enimi . ' ' . $snimi;
            $model->nos_id = $id;            
            $model->lahetyspvm =  date('Y-m-d');
            return $this->renderAjax('sendView',['model'=>$model]);

          
        }
    }
    public function actionTulokset($id)
    {
        //as
        $model = new Tulokset();
        
        $model2 = new NosAnalysoitavat();
        $bakteeri = new Bakteeri();
        $array = [];

        $modelsBakteeri = [new Tulokset];
       
        
        
        //$bktr = unserialize($bktr);
        
        
        
        /* if( $_POST ) {
            die( print_r($_POST) );
            // or use
            // die( var_dump($_POST) );
        } */
               
       

        if ($model->load(Yii::$app->request->post()))//if ($model->load(Yii::$app->request->post()))//if ($model->load(Yii::$app->request->post()) && $model->save(false)) // //
            {
                        $tulokset = $_POST["Tulokset"];
                        $arvot = $tulokset['0'];
                        $i = 0;
                        $b_id = $tulokset['bakteeri_id'];
                        $n_id = $id;//$tulokset['nos_id'];

                        //echo '<script>alert($tulokset.length)</script>';
                         //$model->bakteeri_id = $tulokset['bakteeri_id'];
                         //$model->nos_id = $tulokset['nos_id'];

                        //$model->luontipvm = date('Y-m-d');
                                     
                        //$model->henkilo_id = Yii::$app->user->getId();

                        //$model->save(false);  $tulokset['lkm']

                       /*   for ($i = 0; $i < $tulokset['lkm']; $i++)
                            {
                                    
                                $model->m_tulos1 = $tulokset[$i]['m_tulos1'];
                                $model->M_tulos2 = $tulokset[$i]['M_tulos2'];
                                $model->insert(false);
                            } */

                            //foreach ($modelsBakteeri as $i => $modelsBakteeri) {}
                            do {
                                $tulos = new Tulokset();
                                $tulos->m_tulos1 = $tulokset[$i]['m_tulos1'];
                                $tulos->M_tulos2 = $tulokset[$i]['M_tulos2'];
                                $tulos->bakteeri_id = $b_id;
                                $tulos->nos_id = $n_id;
                               /*echo '<script>console.log($model->bakteeri_id = $b_id;
                                        $model->nos_id = $n_id;)</script>';
                                print_r($tulokset); */
                               

                              /*  if ($model->nos_id == 0 || $model->bakteeri_id == 0)
                                {
                                       $model->bakteeri_id = $b_id;
                                        $model->nos_id = $n_id;
                                } */

                                $tulos->save(false);
                                $i++;

                            } while ($i < (count($tulokset) - 1));

                            $target = NosAnalysoitavat::find()->where(['nos_id'=>$id, 'bakteeri_id' =>$b_id])->all();
                            $target[0]['otetut_naytteet_lkm'] = (count($tulokset) - 1);
                            //$target[0]->update(false); vaatii primary keyn
                            




        }
        else 
        {
            $model->lkm = 0;
            //$lkm = NosAnalysoitavat::find()->where(['nos_id' => $id, ])
            $model->nos_id = $id;
             $count = NosAnalysoitavat::find()->where(['nos_id' => $id])->all();
             //$model->bakteeri_id = $tulokset_bakteeri_id;

             //$array = Bakteeri::find()->asArray()->where(['id' => $count->bakteeri_id])->all();

            foreach ($count as $key => $value) {
                $bakteerin_id = Bakteeri::findOne($value->bakteeri_id);

                $array[$key] = ['id' =>$value->bakteeri_id, 'nimi'=>$bakteerin_id->nimi];
                //$array = Arrayhelper::map(Bakteeri::find()->where[]$value->bakteeri_id));
            } 
            /* if ($model->bakteeri_id == 1) {$model->m_tulos1 = "ASD";}
            else {$model->m_tulos1 = "HAA";} */

            /*if ($tulokset_bakteeri_id == null)
            {
                $tulokset_bakteeri_id = "Valitse bakteeri";
            }*/

            /*if (isset($_GET["Tulokset"]))
            {
                $tulokset = $_GET["Tulokset"];
                $tulokset_bakteeri_id = $tulokset['bakteeri_id'];
            }
            else
            {
                $tulokset_bakteeri_id = "Valitse bakteeri";
            }


            

            'valittu_bakteeri_id'=>$tulokset_bakteeri_id*/
            $osanaytteitaKpl = '-';

             return $this->renderAjax('tulokset',[
                'model'=>$model,
                'array'=>$array,
                'modelsBakteeri'=>$modelsBakteeri,
                'osanaytteitaKpl'=>$osanaytteitaKpl,
                

                
                
                ]);



              if (isset($_POST['btnHae'])) {$model->m_tulos1 = "12123213";}
            else {$model->m_tulos1 = "HAA";}
        }

    }


    public function actionKirjaus($id)
    {
        $modelsBakteeri = [new Tulokset];
        if (isset($_GET["Tulokset"]))
        {
            $tulokset = $_GET["Tulokset"];
            $tulokset_bakteeri_id = $tulokset['bakteeri_id'];
        }
        
        //$bktr = unserialize($bktr);
        $model = new Tulokset();
        $array = [];

        $naytteita = NosAnalysoitavat::find()->where( [ 'nos_id' => $id, 'bakteeri_id' => $tulokset_bakteeri_id ] )->all();

        //$osanaytteet_n = $naytteita->osanaytteita_n;
        //print_r($naytteita);

        $osanaytteet_n = $naytteita[0]['osanaytteita_n'];
        //print_r($osanaytteet_n);
        //$naytteita->osanaytteita_n;


       if ($model->load(Yii::$app->request->get()))
       {
             //Yii::$app->response->format = 'php';
            '<script>alert("here it stops")</script>';

            /* $items = [
                'model'=>$model,
                'array'=>$array,
                'modelsBakteeri'=>$modelsBakteeri,
                'valittu_bakteeri_id'=>$tulokset_bakteeri_id,
                'bakteeri_id'=>$tulokset_bakteeri_id,
                'osanaytteet_n'=>$osanaytteet_n
                
                ];
                return \yii\helpers\Json::encode($items); */
       }
       else 
       {
            $model->nos_id = $id;
            $model->bakteeri_id = $tulokset_bakteeri_id;

             $count = NosAnalysoitavat::find()->where(['nos_id' => $id])->all();

            

            foreach ($count as $key => $value) {
                $bakteerin_id = Bakteeri::findOne($value->bakteeri_id);

                $array[$key] = ['id' =>$value->bakteeri_id, 'nimi'=>$bakteerin_id->nimi];
                
            }




            echo 1;
           return $this->renderAjax('tulokset',[
                'model'=>$model,
                'array'=>$array,
                'modelsBakteeri'=>$modelsBakteeri,
                'valittu_bakteeri_id'=>$tulokset_bakteeri_id,
                'bakteeri_id'=>$tulokset_bakteeri_id,
                'osanaytteet_n'=>$osanaytteet_n
                
                ]);

       }

        //$model = new Tulokset();
        //$model->bakteeri_id = $id;
        //$model->nos_id = $id;

        //$lkm = NosAnalysoitavat::find()->where(['nos_id' => $id, 'bakteeri_id' => $bakteeri]);

       /* "<?= $form->field($model, 'nos_id')->textInput(['readonly' => true]) ?>
     
        <?= $form->field($model, 'm_tulos1')->textInput() ?>
        <?= $form->field($model, 'M_tulos2')->textInput() ?> "; */


    }
    public function actionTestaa($id, $id2) {

        $bakteeri = Bakteeri::findOne($id);

        $nayteTiedot = NosAnalysoitavat::find()->where( [ 'nos_id' => $id2, 'bakteeri_id' => $id ] )->all();
        $osanayte = $nayteTiedot[0]['osanaytteita_n'];
        $otetut_naytteet = $nayteTiedot[0]['otetut_naytteet_lkm'];
        $bNimi = $bakteeri->nimi;
        $bId = $bakteeri->id;

        
        $data = [ 
        'nimi'=> $bNimi,
        'id' => $bId,
        'otetut_naytteet' => $otetut_naytteet,
        'osanayte' => $osanayte,
        ];

        return Json::encode($data);
        
        

    }
 


}
