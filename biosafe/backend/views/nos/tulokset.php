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
use yii\helpers\Url;




/* @var $this yii\web\View */
/* @var $model backend\models\Nos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tulokset center-block" style="display: table-cell; padding-left:200px;">

   <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $model->bakteeri_id = filter_input_array(INPUT_GET, 'bakteeri_id'); ?>
    
    <?= $form->field($model, 'bakteeri_id')->dropDownList(ArrayHelper::map($array,'id','nimi'),['prompt'=>'Valitse', 'style' => 'display:table-cell;', 'id'=>'bakteeriList',
    

   ]); ?>
  


   


<table class="table table-bordered table-condensed table-hover small kv-table" style=" width:500px; ">
                <tbody><tr class="success">
                    <th colspan="3" class="text-center text-success">Suunnitelman tiedot</th>
                </tr>
                <tr class="active">
                    <th class="text-left">Näytteenottosuunnitelman ID </th>
                    <td class="text-center" colspan="2" id="DIVnos_id"><?php echo $model->nos_id; ?></td>
                </tr>
               <tr class="active">
                    <th class="text-left">Bakteerin ID / Nimi</th>
                    <td class="text-center" id="DIVbakteeri_id" value="">-</td>
                    <td class="text-center" id="DIVbakteeri_nimi" value="">-</td>
                </tr>                         
                <tr class="warning">
                    <th>Otettavat näytteet / Otetut näytteet</th>
                    <th class="text-center" id="DIVosanaytteet"><?php echo $osanaytteitaKpl; ?></th>
                    <th class="text-center" id="DIVotetutNaytteet">-</th>
                </tr>
            </tbody></table>











    <div class="row" style="display:table; margin-left:2px;" >

     <div class="panel panel-default">
        <div class="panel-heading" style="height:80%;" ><h4><i class="glyphicon glyphicon-option-vertical"></i> Lisää tuloksia</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin(['id' => 'DynamicFormWidget',
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1,// 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsBakteeri[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'bakteeri_id',
                    'm_tulos1',
                    'M_tulos2',
                                  
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
                                <?= $form->field($modelsBakteeri, "[{$i}]m_tulos1")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelsBakteeri, "[{$i}]M_tulos2")->textInput(['maxlength' => true]) ?>
                            </div>
                         
                            </div>
                            
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

   




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tallenna tulokset' : 'create', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'tuloksetSubmit', 'disabled' => true]) ?>
    </div>

    
    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
$('#bakteeriList').change(function(){
    var valittuId = $(this).val();
    
    

    if (valittuId > 0) { 
        
        $('#tuloksetSubmit').prop("disabled", false);
        $.get('index.php?r=nos/testaa',{id : valittuId,id2 : $model->nos_id}, function(data, data2){
        var data = $.parseJSON(data);
        //alert(data.nimi);
        $('#DIVbakteeri_id').html(data.id);
        $('#DIVbakteeri_nimi').html(data.nimi);
        $('#DIVosanaytteet').html(data.osanayte);
        $('#DIVotetutNaytteet').html(data.otetut_naytteet);
        });
        
        //$osanaytteitaKpl = data.osanayte
        //$('#DynamicFormWidget').attr('min', 1);
        //alert($('#DynamicFormWidget')); 
        //console.log($('#DynamicFormWidget'));
       
        

    


    }

    else {
            $('#tuloksetSubmit').prop("disabled", true);
            $('#DIVbakteeri_id').html("-");
            $('#DIVbakteeri_nimi').html("-");
            $('#DIVosanaytteet').html("-");
            $('#DIVotetutNaytteet').html("-");
            $('#DynamicFormWidget').attr("min"), 0;

         

    }

          
});

$('form#dynamic-form').on('beforeSubmit', function(e)
{
    var \$form = $(this);
    $.post(
        \$form.attr("action"), 
        \$form.serialize()
        )
       
                $(\$form).trigger("reset");
                //$(document).find('#secondmodal').modal('hide');
                $.pjax.reload({container:'#nosGrid'});
                alert("Tulokset tallennettu!");
         
    return false;
    
});
JS;
$this->registerJs($script);
?>








 	


    

