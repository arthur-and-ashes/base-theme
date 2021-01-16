jQuery(document).ready(function($){
	$(".burger").click(function() {
		$('.header-menu').toggleClass("on");
		$('.burger').toggleClass("on");
		$('.burger-menu').toggleClass("on");
	});
});

jQuery(document).ready(function($){
	$(window).scroll(function () {
		var sc = $(window).scrollTop();
		var scrollHeight =  $(document).height() - $(window).height(); 
		if (sc > 150 /* && scrollHeight > 280*/) {
			$(".site-header").addClass("on");
		} else {
			$(".site-header").removeClass("on");
		}
	});
});

jQuery(document).ready(function($){
  	slideShow();
	function slideShow(){
		var current = $('#slider .show');
		var next = current.next().length ? 
		current.next() :
		current.siblings().first();

		current.hide().removeClass('show');
		next.fadeIn("slow").addClass('show');
		setTimeout(slideShow, 9000);
	};
});

jQuery(document).ready(function($){
  	imageShow();
	function imageShow(){
		var current = $('#imageslide .new');
		var next = current.next().length ? 
		current.next() :
		current.siblings().first();

		current.hide().removeClass('new');
		next.fadeIn("slow").addClass('new');
		setTimeout(imageShow, 3000);
	};
});