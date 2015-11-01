<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Näytteenottosuunnitelma';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="nos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Luo Näytteenottosuunnitelma', ['value'=>Url::to('index.php?r=nos/create'), 'class' => 'btn btn-success','id'=>'modalNos']) ?>
    </p>
   
         <?php 
        

             Modal::begin([ //luo popup-window modalin
                'header'=>'<h4 id="modalHeader"></h4>',
                'id'=>'modal',
                'size'=>'modal-lg',
            ]);

        echo "<div id=modalContent></div>";

        Modal::end();
    
        
       
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) { //tällä värit search kolumneille
                    if ($model->nayte_lahetetty == 'Kyllä') 
                    {
                        return ['class'=>'success']; //danger, warning, success
                    }
                    else if ($model->nayte_lahetetty == 'Kyllä' && $model->analyysi_tehty == 'Kyllä')
                    {
                        return ['class'=>'danger'];
                    }

                },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'luontipvm',           
            'tuote_id',
            'bakteeri_id',
            //'nayte_lahetetty',
            //'analyysi_tehty',
            [
                'attribute'=>'analyysi_tehty',
                'filter'=>Html::activeDropDownList($searchModel, 'analyysi_tehty', 
                    array("Kyllä"=>"Kyllä","Ei"=>"Ei"),['class'=>'form-control','prompt' => 'Kaikki']),

            ],
             [
                'attribute'=>'nayte_lahetetty',
                'filter'=>Html::activeDropDownList($searchModel, 'nayte_lahetetty', 
                    array("Kyllä"=>"Kyllä","Ei"=>"Ei"),['class'=>'form-control','prompt' => 'Kaikki']),

            ],
            [
                'attribute'=>'naytteenottopvm', //datepicker search-kentässä
                'value'=>'naytteenottopvm',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                    'model'=>$searchModel,
                    'name' => 'check_issue_date', 
                    'value' => date('d-M-Y', strtotime('+2 days')),
                    'options' => ['placeholder' => 'Valitse'],
                    'language' => 'fi',
                    'pluginOptions' => [
                        'format' => 'dd-M-yyyy',
                        'todayHighlight' => true
                    ]]),
            ],
            // 'henkilo_id',
            // 'nayte_tutkittu',
            // 'Raja_arvo1_m',
            // 'Raja_arvo2_M',
            // 'Osanaytteita_n',
            // 'Osanaytteidenmaara_c',

            [   'class' => 'yii\grid\ActionColumn',
                //'headerOptions'=> ['class' => 'action-column'],
               //'context' => $this->context,
                'template' => '{view} {update} {tulokset}',

                                      
            ],
             [   'class' => 'yii\grid\ActionColumn',
                //'headerOptions'=> ['class' => 'action-column'],
               //'context' => $this->context,
                'template' => '{send} {delete}',                          
            ],
                
            


        ],
    ]); ?>



</div>
