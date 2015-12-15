<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Laboratoriot;

/* @var $this yii\web\View */
/* @var $model backend\models\Send */
/* @var $form ActiveForm */
?>
<div class="sendView">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nos_id')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'bakteeri_id')->textInput(['readonly' => true]) ?>
    <?php ActiveForm::end(); ?>

</div><!-- sendView -->
