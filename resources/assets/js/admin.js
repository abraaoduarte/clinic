import swal from 'sweetalert';

$('.js-button-delete').on('click', event => {
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

$('#birthday').mask('00/00/0000');
$('#rg').mask('99.999.999-99');
$('#cpf').mask('999.999.999-99');
$('#zipcode').mask('99.999-999');
$('#phone').mask('(99) 99999-9999');
