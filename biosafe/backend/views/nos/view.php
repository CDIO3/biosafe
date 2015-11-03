<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Nos */

$this->title ='Näytteenottosuunnitelma id: '+ $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'luontipvm',
            'naytteenottopvm',
            'tuote_id',
            'bakteeri_id',
            'henkilo_id',
            //'nayte_tutkittu',
            'Raja_arvo1_m',
            'Raja_arvo2_M',
            'Osanaytteita_n',
            'Osanaytteidenmaara_c',
        ],
    ]) ?>
     <?= Html::submitButton($model->isNewRecord ? 'Luo uusi' : 'Lähetä näyte', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
