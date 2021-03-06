<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Nos */

$this->title = 'Update Nos: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Näytteenottosuunnitelma', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
