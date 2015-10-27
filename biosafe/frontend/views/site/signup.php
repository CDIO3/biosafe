<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Yritys;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

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

                <?= $form->field($model, 'email')->textInput()->label('Sähköposti'); ?>

                <?= $form->field($model, 'puhnro')->textInput()->label('Puhelinnumero'); ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Salasana'); ?>

                <?= $form->field($model, 'yritys_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Yritys::find()->all(),'id','yritysnimi'),
                    'language' => 'fi',
                    'options' => ['placeholder' => 'Valitse yritys'],
                    'pluginOptions' => [
                        'allowClear' => true //haetaan listana yritykset joista hekilö valitsee omansa
                    ],
                    ]);
                    ?>

                <?= $form->field($model, 'passwordConfirm')->passwordInput()->label('Uudelleen syötä salasana'); ?>

                <div class="form-group">
                    <?= Html::submitButton('Rekisteröidy', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
