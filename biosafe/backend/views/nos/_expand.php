<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Näytteen tulokset';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="nos-index">

<table class="table table-bordered table-condensed table-hover small kv-table">
                <tbody><tr class="danger">
                  <?php 
                $x = 5;
               
                
                $i;
                
                for ($s = 0; $s < 3; $s++)
                {
                    echo " 
                    <th colspan='3' class='text-center text-danger'>Bakteerin ".($s+1)." nimi</th>
                
                </tr>
                <tr class='active'>
                    <th class='text-center'>#</th>
                    <th>Raja-arvo m</th>
                    <th class='text-right'>Raja-arvo M</th>
                </tr>
                ";
                for ($i = 0; $i < $x; $i++)
                {
                     $luku1 = 12;
                     
                    echo "
                    <tr>
                        <td class='text-center'>".((float)$i + 1)."</td><td>".((float)$luku1 * 1.8 +$s+$i)."</td><td class='text-right'>".((float)$luku1 * 2.12 +$s+$i)."</td>
                    </tr>
                    ";
                        
                }
            
            }
               
               
               
               echo " <tr class='warning'>
                    <th></th><th></th><th class='text-right'>Tuloksia ".$s." kpl</th>
                </tr> ";
                
                 ?>

            </tbody></table>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
             
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'hover' => true,
        //'condensed' => true,
        'responsive'=>true,
        //'pagination' => 'false',
        'summary'=>'', //poistaa 'showing x items..'
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
                ],

               
       
       
               

    ]); ?>



</div>