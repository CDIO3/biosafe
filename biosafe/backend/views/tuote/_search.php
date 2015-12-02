<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TuoteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tuote-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nimi') ?>

    <?= $form->field($model, 'ean') ?>

    <?= $form->field($model, 'Ravintokoostumus') ?>

    <?= $form->field($model, 'sisaltaako_porkkanaa') ?>

    <?php // echo $form->field($model, 'sisaltaako_perunaa') ?>

    <?php // echo $form->field($model, 'Tuoteryhma') ?>

    <?php // echo $form->field($model, 'yritys_id') ?>

    <?php // echo $form->field($model, 'asiakas_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
