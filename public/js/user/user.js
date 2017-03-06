$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
	$('.list-group-item a').each(function(index, el) {
        if($(el).attr('href')==location.href){
            $(el).parent('li.list-group-item').addClass('active');
        }
    });
    $('input[name="post_money"]').priceFormat({
	    prefix: '',
	    centsSeparator: ',',
	    thousandsSeparator: '.'
	});
    $('input[name="post_date"]').datetimepicker({
        format:'DD-MM-YYYY',
    })
});