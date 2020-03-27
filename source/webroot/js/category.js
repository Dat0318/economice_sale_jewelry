
$(document).ready(function() {
	$('.cat').click(function(event) {
		$('.cat').removeClass('active');
		$(this).addClass('active');
	});
	$("#ex2").slider({
	});
		var from= $("#ex2").data('slider').getValue()[0];
		var to= $("#ex2").data('slider').getValue()[1];
		$('#from').val(from);
		$('#to').val(to);
		$('#from-text').text(from.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
		$('#to-text').text(to.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
	$('#ex2').change(function(event) {
		var from= $("#ex2").data('slider').getValue()[0];
		var to= $("#ex2").data('slider').getValue()[1];
		$('#from').val(from);
		$('#to').val(to);
		$('#from-text').text(from.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
		$('#to-text').text(to.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
	});
	
});
