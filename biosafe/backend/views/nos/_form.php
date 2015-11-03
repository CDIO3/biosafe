<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Tuote;
use backend\models\Bakteeri;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Nos_analysoitavat;



/* @var $this yii\web\View */
/* @var $model backend\models\Nos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nos-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
     
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

    



    <div class="row" style="width:80% display:table" >

     <div class="panel panel-default">
        <div class="panel-heading" style="width:80%" ><h4><i class="glyphicon glyphicon-option-vertical"></i> Analysoitavat bakteerit</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsBakteeri[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nimi',
                    'm_oletusarvo1',
                    'M_oletusarvo2',
                    'Osanaytteita_n',
                    'Osanaytteidenmaara_c',                
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsBakteeri as $i => $modelsBakteeri): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Valitse uusi kohde</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus" id="lisaa_analyysi" ></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo '<div class="panel-body" id="analyysi">'; ?>
                        <?php
                            // necessary for update action.
                            if (! $modelsBakteeri->isNewRecord) {
                                echo Html::activeHiddenInput($modelsBakteeri, "[{$i}]id");
                            }
                        ?>
                        
                        <div class="row">
                        <div class="col-sm-6">
                        <?= $form->field($modelsBakteeri, "[{$i}]bakteeri_id")->dropDownList(ArrayHelper::map(Bakteeri::find()->all(),'id','nimi'), ['prompt'=>'Valitse']) ?>
                        </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelsBakteeri, "[{$i}]m_arvo1")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelsBakteeri, "[{$i}]M_arvo2")->textInput(['maxlength' => true]) ?>
                            </div>
                              <div class="col-sm-6">
                                <?= $form->field($modelsBakteeri, "[{$i}]osanaytteita_n")->textInput() ?>
                            </div>
                              <div class="col-sm-6">
                                <?= $form->field($modelsBakteeri, "[{$i}]osanaytteita_c")->textInput() ?>
                            </div>
                            
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Luo uusi' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    
    <?php ActiveForm::end(); ?>

</div>
