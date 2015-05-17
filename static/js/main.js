/*!
 * main.js
 * v1.0.8
 * http://sintrave.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2015, Sintrave Elevadores
 * http://www.sintrave.com
 */

$(function(){ 
	a_index();
	ajax_contact();
	arriba();
	menuactive();
	scroll_producto();
	submenu();
});

//FUNCTION AJAX CONTACT FORM
function ajax_contact(){
	$("#ajax-contact-form").submit(function() {
        $('#load').append('<center><img src="/static/img/loading.gif" alt="Cargando..." id="loading" /></center>');

        var fem = $(this).serialize(),
			note = $('#note');
	
        $.ajax({
            type: "POST",
            url: "/contacto/contact.php",
            data: fem,
            success: function(msg) {
				if ( note.height() ) {			
					note.slideUp(500, function() { $(this).hide(); });
				} 
				else note.hide();

				$('#loading').fadeOut(300, function() {
					$(this).remove();

					// Message Sent? Show the 'Thank You' message and hide the form
					result = (msg === 'OK') ? '<div class="success">Tu mensaje fue enviado exitosamente!</div>' : msg;

					var i = setInterval(function() {
						if ( !note.is(':visible') ) {
							note.html(result).slideDown(500);
							clearInterval(i);
						}
					}, 40);    
				}); // end loading image fadeOut
            }
        });

        return false;
    });
};

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
	$('.conoce a').on('click', function(e) {
		e.preventDefault();
		var $link = $(this);
		var anchor  = $link.attr('href');
	    $('html, body').stop().animate({
	        scrollTop: $(anchor).offset().top
	    },800);
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