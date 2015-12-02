<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Kirjaudu sisään';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Täytä alla olevat kentät kirjautuaksesi</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput()->label('Käyttäjänimi'); ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Salasana'); ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Muista minut'); ?>

                <div style="color:#999;margin:1em 0">
                    Unohditko salasanasi? <?= Html::a('Resetoi salasana', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Kirjaudu', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
