
$(function(){
	$("#doctor_id").select2({
		theme: "bootstrap4",
		minimumInputLength: 3,
		allowClear: true,
		placeholder: "Selecione...",
		ajax: {
			url: 'http://clinic.local/admin/doctor/search/',
			dataType: 'json',
			data: function (params) {
				return {
					search: params.term
				};
			},
			processResults: function (data) {
				return {
					results: data
				};
			}
		}
	});


	$("#patient_id").select2({
		theme: "bootstrap4",
		minimumInputLength: 3,
		allowClear: true,
		placeholder: "Selecione...",
		ajax: {
			url: 'http://clinic.local/admin/patient/search/',
			dataType: 'json',
			data: function (params) {
				return {
					search: params.term
				};
			},
			processResults: function (data) {
				return {
					results: data
				};
			}
		}
	});
});
