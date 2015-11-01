<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Send */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="send-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nos_id')->textInput() ?>

    <?= $form->field($model, 'henkilo_id')->textInput() ?>

    <?= $form->field($model, 'labra_id')->textInput() ?>

    <?= $form->field($model, 'lisatietoja')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lahetyspvm')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
