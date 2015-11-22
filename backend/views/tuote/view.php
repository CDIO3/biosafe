<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tuote */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tuotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tuote-view">

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
            'nimi',
            'ean',
            'Ravintokoostumus:ntext',
            'sisaltaako_porkkanaa',
            'sisaltaako_perunaa',
            'Tuoteryhma',
            'yritys_id',
            'asiakas_id',
        ],
    ]) ?>

</div>
