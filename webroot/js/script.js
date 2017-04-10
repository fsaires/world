$(document).ready(function () {
	$.blockUI.defaults.message ='<h1><img src="img/loading.gif" /></h1>'; 
});

function atualizaEstado(){
	$.blockUI();
	jQuery.ajax({
		type:'POST',
		async: true,
		cache: false,
		url: '/world/mundo/getEstados',
		data:{paiid: jQuery('#paiid').val()},
		success: function(response){	
			jQuery('#estid').html(response).show();
			existeEstado();
			atualizaCidade();
			$.unblockUI();
		}
	});
}

function atualizaCidade(){
	$.blockUI();
	jQuery.ajax({
		type:'POST',
		async: true,
		cache: false,
		url: '/world/mundo/getCidades',
		data:{estid: jQuery('#estid').val(), paiid: jQuery('#paiid').val()},
		success: function(response){	
			jQuery('#cidid').html(response).show();
			$.unblockUI();
		}
	});
}

function showDados(){
	if(jQuery('#paiid').val() == ""){
		alert('The field "Countries / País" is required!');
		jQuery('#paiid').focus();
		return false;	
	}
	
	if( $('#estid').is(':visible') ) {
		if(jQuery('#estid').val() == ""){
			alert('The field "States / Estados" is required!');
			jQuery('#estid').focus();
			return false;
		}
	} 

	if(jQuery('#cidid').val() == ""){
		alert('The field "Cities / Cidades" is required!');
		jQuery('#cidid').focus();
		return false;
	}
	
	$.blockUI();
	jQuery.ajax({
		type:'POST',
		async: true,
		cache: false,
		url: '/world/mundo/showDados',
		data:{paiid: jQuery('#paiid').val(), estid: jQuery('#estid').val(), cidid: jQuery('#cidid').val()},
		success: function(response){	
			jQuery('#divDados').html(response).show();
			jQuery('#paiid').val('');
			jQuery('#estid').val('');
			jQuery('#cidid').val('');
			$.unblockUI();
		}
	});
}

function existeEstado(){
	jQuery.ajax({
		type:'POST',
		async: true,
		cache: false,
		url: '/world/mundo/existeEstado',
		data:{paiid: jQuery('#paiid').val()},
		success: function(response){	
			if($.trim(response) == 'N'){
				jQuery('label[for="estid"]').hide();
				jQuery('#estid').hide();
			} else {
				jQuery('label[for="estid"]').show();
			}
		}
	});
}
