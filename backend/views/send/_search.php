<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SendSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="send-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nos_id') ?>

    <?= $form->field($model, 'henkilo_id') ?>

    <?= $form->field($model, 'labra_id') ?>

    <?= $form->field($model, 'lisatietoja') ?>

    <?= $form->field($model, 'lahetyspvm') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
