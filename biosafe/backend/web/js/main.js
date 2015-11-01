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
}); */