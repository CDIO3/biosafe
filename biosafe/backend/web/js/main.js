	 $(function openModal(){ //popup-window scripti

	$('.modalPopUp').click(function(){ //column action napit joilla class=modalPopUp
		//var elementId = $(this).closest('tr').data('key');
		$('#modal').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));

		    document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
		});

	$('#modalNos').click(function(){ //nos/create nappi
		
		$('#modal').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));

		    //document.getElementById('modalHeader').innerHTML = '<h4>Luo näytteenottosuunnitelma</h4>';
		});
	});

	

	/* function newDiv(i){
		alert("test");
	 i = i + 1;
	 console.log(i);
	 $('#analyysi'+i).load(location.href + ('#analyysi'+i));
	 //.find('#analyysi'+i)
	 //.load($(this).attr('id'));

	 //$("#divId").load(location.href + " #divId>*", "");
	 //return void;
	
	

*/

$('#lisaa_analyysi00').click(function(){
	$('#bakteeri-1-nimi').load(location.href + ('#bakteeri-1-nimi'));
	alert("test");
	});


/* $(".modalButtoni").click(function() {
    $.get(
        index.php?r=nos/view // Add missing part of link here        
        {
            id: $(this).closest('tr').data('key')
        },
        function (data) {
            $('.modal').html(data);
            $('#modalContent').modal();
        }  
    );
}); 

TÄMÄ ON SE PERKELE MIKÄ EI TOIMI SELECT2


 <?= $form->field($modelsBakteeri, "[{$i}]nimi")->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Bakteeri::find()->all(),'id','nimi'),
                        'language' => 'fi',
                        'options' => ['placeholder' => 'Valitse'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        ]);
                        ?> 




                        ||||||||||||||||||||||||||||
                        VANHA NOS _FORM

                            

    <?= $form->field($model, 'array')->checkboxList(
    ArrayHelper::map(Bakteeri::find()->all(),'id','nimi'),
    ['prompt'=>'Valitse']
    ) ?>

    

    <?= $form->field($model, 'Raja_arvo1_m')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'Raja_arvo2_M')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'Osanaytteita_n')->textInput() ?>

    <?= $form->field($model, 'Osanaytteidenmaara_c')->textInput() ?>

*/