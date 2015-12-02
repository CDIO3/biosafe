<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sends';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="send-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Send', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nos_id',
            'henkilo_id',
            'labra_id',
            'lisatietoja:ntext',
            'lahetyspvm',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
