import swal from 'sweetalert';



$('.js-datatable').on('click', '.js-button-delete', event => {
	event.stopPropagation();
	event.preventDefault();
	
	swal({
	  title: "Tem certeza que deseja deletar?",
	  text: "Após apagado, este registro não pode ser recuperado!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	    $(event.currentTarget).parents('form').submit();
	  } else {
	    swal("O registro não foi deletado!");
	  }
	});
});

$('.js-datatable').on('click', '.js-open-modal', event => {
	event.stopPropagation();
	event.preventDefault();
	
	let urlSearch = event.currentTarget.getAttribute('data-id');

	if(!urlSearch){
		console.error('Error: Essa url não existe!');
		return false;
	}

	$.ajax({
		method: "GET",
		url: urlSearch,
	})
	.done(function( data ) {
			$('#result-search-modal').html(data);
			$("#modal-search").modal();
	})
	.fail(function(xhr, textStatus, errorThrown) {
		console.error('Erro ao executar função: ' +xhr.textStatus);
	});
	
});

$('#birthday, #date').mask('00/00/0000 99:99');
$('#rg').mask('99.999.999-99');
$('#cpf').mask('999.999.999-99');
$('#zipcode').mask('99.999-999');
$('#phone').mask('(99) 99999-9999');
