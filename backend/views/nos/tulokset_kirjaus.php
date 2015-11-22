<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\NosAnalysoitavat;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>
<div class="tulokset_kirjaus">

 <?php $form = ActiveForm::begin(); ?>

       <div class="form-group">

       		<?= $form->field($model, 'm_tulos1')->textInput() ?>
        	<?= $form->field($model, 'M_tulos2')->textInput() ?>
            
            <?= Html::submitButton('Lähetä', ['class' => 'btn btn-success', 'id' =>'btnSubmit']) ?>








            	<?php $form = ActiveForm::begin(['id' => 'form2']); ?>

    

        <?= $form->field($model, 'nos_id')->textInput(['readonly' => true]) ?>
     
        <?= $form->field($model, 'm_tulos1')->textInput() ?>
        <?= $form->field($model, 'M_tulos2')->textInput() ?>

        <?= Html::submitButton('form1', ['class' => 'btn btn-success', 'id' =>'btn1']) ?>

		
		
        <table class="table table-bordered table-condensed table-hover small kv-table" style="display:none">
                <tbody><tr class="danger">
                  
              
                    
                    <th colspan="3" class="text-center text-danger">   
 
					</th>
                
                </tr>
                <tr class='active'>
                    <th class='text-center'>#</th>
                    <th>Raja-arvo m</th>
                    <th class='text-right'>Raja-arvo M</th>
                </tr>

               <?php
               $x = 5;
                for ($i = 0; $i < $x; $i++)
                {
                     $luku1 = 12;
                    echo "
                    <tr>
                        <td class='text-center'>".((float)$i + 4)."</td><td>".($luku1 + 4)."</td><td class='text-right'>".((int)$i + 12)."</td>
                    </tr>
                    ";
                        
                }
            

               
                ?>
               
                <tr class="warning">
                    <th></th><th>Footer</th><th class="text-right">Tähän jotain</th>
                </tr>
            </tbody></table>

              





        
        <div class="form-group">
            
            <?= Html::submitButton('Lähetä', ['class' => 'btn btn-success', 'id' =>'btnSubmit']) ?>


      
        </div>
    <?php ActiveForm::end(); ?>


      
        </div>
    <?php ActiveForm::end(); ?>

    

</div>