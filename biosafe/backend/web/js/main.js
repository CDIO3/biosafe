	 $(function openModal(){ //popup-window scripti

	$('.modalPopUp').click(function(e){
	e.preventDefault(); //column action napit joilla class=modalPopUp
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

	 $('#bakteeriList').click(function(e) { 
	e.preventDefault();
	e.stopPropagation();
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

$('#tulokset-bakteeri_id').click(function(){

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




    TAULU



    <table class="table table-bordered table-condensed table-hover small kv-table">
                <tbody><tr class="danger">
                    <th colspan="3" class="text-center text-danger">Buy Amount Breakup</th>
                </tr>
                <tr class="active">
                    <th class="text-center">#</th>
                    <th>Breakup</th>
                    <th class="text-right">Price</th>
                </tr>
                <tr>
                    <td class="text-center">1</td><td>Base Price</td><td class="text-right">113.40 </td>
                </tr>
                <tr>
                    <td class="text-center">2</td><td>Tax @ 6%</td><td class="text-right">7.56</td>
                </tr>
                <tr>
                    <td class="text-center">3</td><td>Shipping @ 4%</td><td class="text-right">5.04</td>
                </tr>
                <tr class="warning">
                    <th></th><th>Total</th><th class="text-right">126.00</th>
                </tr>
            </tbody></table>


            AAAAAAAAAAAAAAAAAAAAAAAAAA







                  <?= $form->field($model, "bakteeri_id")->dropDownList(ArrayHelper::map($array,'id','nimi'),['prompt'=>'Valitse', 'style'=> 'width:80%; color:red; display:table; vertical-align: middle; margin: 0 auto; ',
     'onchange'=>'$.post("index.php?r=nos/toimii,{"id" : $(this).val()}, function(data) { $("select#tulokset-bakteeri_id").html(data); });
' ]); ?> 







$.post("index.php?r=nos/toimii&id='.'" +$(this).val(), function(data) { $("select#tulokset-bakteeri_id").html(data); });









asdasddas

*/