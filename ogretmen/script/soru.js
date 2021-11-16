
ClassicEditor.create(document.getElementById('soru_metni'));

$(document).ready(function () {
    $('#takeSelect').hide();
	$('#sinavlar').val("0");
  
  $('#sinavlar').change(function () {
    selectVal = $('#sinavlar').val();
   
    if (selectVal == 0) {
       $('#soru_sec').prop("disabled", true);
    }
    else {
      $('#soru_sec').prop("disabled", false);
      $('#takeSelect').val(selectVal);
    }
  });
});

$('#myForm').on('submit', function(e){
  $('#soruekle').modal('show');
  e.preventDefault();
});

