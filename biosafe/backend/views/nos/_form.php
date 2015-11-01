<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Tuote;
use backend\models\Bakteeri;
use kartik\date\DatePicker;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\Nos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nos-form">

    <?php $form = ActiveForm::begin(); ?>
     
      <?= $form->field($model, 'naytteenottopvm')->widget(DatePicker::className(),[
        'name' => 'deadline',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'removeButton' => [ 'title'=>'Tyhjennä'],
        'pickerButton' => [ 'title'=>'Valitse päivä'],
        'value' => date('yyyy-mm-dd'),
        'options' => ['placeholder' => 'Valitse'],
        'language' => 'fi',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'startDate' => 'today',
            'todayBtn' => true,
            //'calendarWeeks' => true
            'multidate' => true

            ]
         

    ]);

     ?>
  
     
    <?= $form->field($model, 'tuote_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Tuote::find()->all(),'id','nimi'),
    'language' => 'fi',
    'options' => ['placeholder' => 'Valitse'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
    ?>
    

    <?= $form->field($model, 'array')->checkboxList(
    ArrayHelper::map(Bakteeri::find()->all(),'id','nimi'),
    ['prompt'=>'Valitse']
    ) ?>

    

    <?= $form->field($model, 'Raja_arvo1_m')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'Raja_arvo2_M')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'Osanaytteita_n')->textInput() ?>

    <?= $form->field($model, 'Osanaytteidenmaara_c')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Luo uusi' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    
    <?php ActiveForm::end(); ?>

</div>
