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
                ],
    ]); ?>



</div>