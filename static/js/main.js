$(document).ready(function(){
	a_index();
	arriba();
	menuactive();
	scroll_producto();
	submenu();
});
//FUNCION SCROLL TO TOP
function arriba(){
	$("#IrArriba").hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 200) {
		$('#IrArriba').fadeIn();
		} else {
		$('#IrArriba').fadeOut();
		}
	});
	$('#IrArriba a').click(function (e) {
		e.preventDefault();
		$('body,html').animate({scrollTop: 0}, 800);
	});
};
//INDEX LINK A SCROLL SUAVE
function a_index(){
	$('.slider_title a').on('click', function(e) {
		e.preventDefault();
		var $link = $(this);
		var anchor  = $link.attr('href');
	    $('html, body').stop().animate({
	        scrollTop: $(anchor).offset().top
	    },1200);
	});
};
//MENU CLASS ACTIVE
function menuactive(){	
	$(".header .hn_nav ul li a").click(function() {
		$(".header.hn_nav .ul_nav li a").removelass("selected");
		$(this).toggleClass('selected');
	});
};
//SUBMENU FIXED
function submenu(){
	//Scroll fixed submenu
	var s = $("#submenu");
    var pos = s.position();                    
    $(window).scroll(function() {
        var windowpos = $(window).scrollTop();

        if (windowpos >= pos.top) {
            s.addClass("fixed");
        } else {
            s.removeClass("fixed"); 
        }
    });
    //Scroll suvae a divs
    $('.menu_sub li a').on('click', function(e) {
		e.preventDefault();
		var $link = $(this);
		var anchor  = $link.attr('href');
	    $('html, body').stop().animate({
	        scrollTop: $(anchor).offset().top
	    },1200);
	});
};
//MOSTRAR PRODUCTOS
function scroll_producto(e){
	$('.spp_p a').on('click', function(e) {
		e.preventDefault();
		var $link = $(this);
		var anchor  = $link.attr('href');
		$('.sec_producto').addClass('hide').hide('fast');
		$(anchor).toggle('900').removeClass('hide');
		$('html, body').stop().animate({
	        scrollTop: $('.header_page').offset().top
	    },1000);
	});
	$('.content_return a').on('click', function(e) {
		e.preventDefault();
		$('.pro_individual').addClass('hide').hide('fast');
		$('.sec_producto').toggle('900').removeClass('hide');
		$('html, body').stop().animate({
	        scrollTop: $('.sec_producto').offset().top
	    },1000);
	});
};