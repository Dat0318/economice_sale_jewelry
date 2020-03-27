

$(document).ready(function($) {
	$(".header2 .menu > li > a").click(function(){
		$(".active").removeClass("active");
		$(this).addClass('active');
	});
});

$(document).ready(function(){
	$(".treeview-menu").hide();
	// $(".fa").click(function(){
	// 	$(this).next().slideToggle();
	// });
});
