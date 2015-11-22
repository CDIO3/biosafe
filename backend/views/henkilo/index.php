<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HenkiloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Henkilos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="henkilo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Henkilo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'etunimi',
            'sukunimi',
            'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'puhnro',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'yritys_id',
            // 'asiakas_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
