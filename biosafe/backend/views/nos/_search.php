<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',

        
    ]); ?>

    <?php // $form->field($model, 'id') ?>

    <?= $form->field($model, 'luontipvm') ?>

    <?= $form->field($model, 'naytteenottopvm') ?>

    <?= $form->field($model, 'tuote_id') ?>

    <?= $form->field($model, 'bakteeri_id') ?>

    <?= $form->field($model, 'nayte_lahetetty') ?>

    <?= $form->field($model, 'analyysi_tehty') ?>

    <?php // echo $form->field($model, 'henkilo_id') ?>

    <?php // echo $form->field($model, 'nayte_tutkittu') ?>

    <?php // echo $form->field($model, 'Raja_arvo1 m') ?>

    <?php // echo $form->field($model, 'Raja_arvo2 M') ?>

    <?php // echo $form->field($model, 'Osanaytteita_n') ?>

    <?php // echo $form->field($model, 'Osanaytteidenmaara_c') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
