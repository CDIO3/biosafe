<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tuote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tuote-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nimi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ean')->textInput() ?>

    <?= $form->field($model, 'Ravintokoostumus')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sisaltaako_porkkanaa')->dropDownList([ 'Kyllä' => 'Kyllä', 'Ei' => 'Ei', ], ['prompt' => 'Valitse']) ?>

    <?= $form->field($model, 'sisaltaako_perunaa')->dropDownList([ 'Kyllä' => 'Kyllä', 'Ei' => 'Ei', ], ['prompt' => 'Valitse']) ?>

    <?= $form->field($model, 'Tuoteryhma')->dropDownList([ 'Valmisruoka' => 'Valmisruoka', 'Lihavalmiste' => 'Lihavalmiste', 'Raakalihavalmiste' => 'Raakalihavalmiste', 'Muu' => 'Muu', ], ['prompt' => 'Valitse']) ?>

    <?= $form->field($model, 'yritys_id')->textInput() ?>

    <?= $form->field($model, 'asiakas_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
