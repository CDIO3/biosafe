<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Send */

$this->title = 'Update Send: ' . ' ' . $model->nos_id;
$this->params['breadcrumbs'][] = ['label' => 'Sends', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nos_id, 'url' => ['view', 'id' => $model->nos_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="send-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
