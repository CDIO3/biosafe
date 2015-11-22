<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\models\Tuote;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TuoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Selaa tuotteita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tuote-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Luo uusi tuote', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php //Pjax::begin(['timeout' => 2000]); //pjax search päälle?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nimi',
            'ean',
            [
                'attribute'=>'asiakas_id',
                'value'=>'asiakas.nimi',
            ],
            [
                'attribute'=>'yritys_id',
                'value'=>'yritys.yritysnimi',
            ],
            //'asiakas.nimi',
            //'yritys.yritysnimi',
            'Ravintokoostumus:ntext',       
            [
                'attribute' => 'sisaltaako_porkkanaa', //kovakoodattu kyllä ja ei lista
                'value' => 'sisaltaako_porkkanaa',
                'format'=>'raw',
                'filter' => Html::activeDropDownList($searchModel, 'sisaltaako_porkkanaa', 
                   array("Kyllä"=>"Kyllä","Ei"=>"Ei"),['class'=>'form-control','prompt' => 'Kaikki']),
            ],
            [
                'attribute'=>'sisaltaako_perunaa',
                'filter'=>Html::activeDropDownList($searchModel, 'sisaltaako_perunaa', 
                    array("Kyllä"=>"Kyllä","Ei"=>"Ei"),['class'=>'form-control','prompt' => 'Kaikki']),

            ],

            //'sisaltaako_perunaa',
            'Tuoteryhma',
            // 'yritys_id',
            // 'asiakas_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php //Pjax::end(); ?>
</div>
