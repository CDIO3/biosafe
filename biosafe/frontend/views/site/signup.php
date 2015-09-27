<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Rekisteröidy käyttäjäksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Ole hyvä, täytä kaikki alla olevat tiedot:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'etunimi')->textInput()->label('Etunimi'); ?>

                <?= $form->field($model, 'sukunimi')->textInput()->label('Sukunimi'); ?>

                <?= $form->field($model, 'username')->textInput()->label('Käyttäjänimi'); ?>

                <?= $form->field($model, 'email')->textInput()->label('Sähköposti'); ?>

                <?= $form->field($model, 'puhnro')->textInput()->label('Puhelinnumero'); ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Salasana'); ?>

                <?= $form->field($model, 'passwordConfirm')->passwordInput()->label('Uudelleen syötä salasana'); ?>

                <div class="form-group">
                    <?= Html::submitButton('Rekisteröidy', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
