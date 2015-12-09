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

    <?php $form = ActiveForm::begin(['id'=>'sendForm']); ?>

        <?= $form->field($model, 'nos_id')->textInput(['readonly' => true]) ?>
        <?= $form->field($model, 'henkilo_id')->textInput(['readonly' => true, 'value' => '1']) ?>
        <?= $form->field($model, 'lahetyspvm')->textInput(['readonly' => true]) ?>

                <?= $form->field($model, 'labra_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(laboratoriot::find()->all(),'id','laboratio_nimi'),
                'language' => 'fi',
                'options' => ['placeholder' => 'Valitse'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                ]);
                ?>

        <?= $form->field($model, 'lisatietoja')->textarea(['rows' => 3]) ?>

        





        
        <div class="form-group">
            <?= Html::submitButton('Lähetä', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- sendView -->

<?php 
$script = <<< JS

$('form#sendForm').on('beforeSubmit', function(e)
{
    var \$form = $(this);
    $.post(
        \$form.attr("action"), 
        \$form.serialize()
        )
       
                //$(\$form).trigger("reset");
                $(document).find('#modal').modal('hide');
                $.pjax.reload({container:'#nosGrid'});
                alert("Suunnitelma lähetetty!");
         
    return false;
    
});
JS;
$this->registerJs($script);
?>
