$(function(){
	//alert ("Hello from jQuery");
	// $('#box').hide();
	
	$('.thing').fadeOut("slow");

	//$('h1').css('color', 'red');

	$('button').click(function(){
		var thing = $('.thing');
		thing.fadeIn(3000);
		thing.css("color", "white");
	});

	//$('h2, h3, h4').css("border", "solid 1px red");

	//$('div#container').css("border", "solid 1px red");

	//$('p.lead').css("border", "solid 1px red");

	//first item of list
	//$('li:first').css("border", "solid 1px red");

	//all of even list
	//$('li:even').css("border", "solid 1px red");

	/*
	$('div em').css("border", "solid 1px green");
	$('div em').css("padding", "5px");
	*/

	//select p in div
	$('div > p').css("border", "solid 1px green");

	//all level of heading
	$(':header').css("background", "magenta");
	$(':header').css("color", "white");

	//contain NGUYEN
	$('div:contains("Brad")').css("border", "solid 1px blue");

	/* jQuery EVENTS METHOD*/

	$('#box').click(function(){
		alert('You clicked the box');
	});


	//lost focus
	$('input').blur(function(){
		if($(this).val() == "") {
			$(this).css("border", "solid 1px red");
			$('#message').text("You forgot to add text?");
		}
	});


	//keydown
	$("input").keydown(function() {
		if ($(this).val() == "") {
			$(this).css("border", "solid 1px #777");
			$('#message').text("You forgot to add text?");

		}
	});

	$("#box").hover(function() {
		$(this).text("you hovered in");
	}, function() {
		$(this).text("you hovered out");
	});


	/* ---------------------------
			jQuery Chaining 
	------------------------------ */
	$('.notification-bar').delay(1000).slideDown().delay(3000).fadeOut();

	/* ---------------------------
			jQuery Hide / Show 
	------------------------------ */
	//$('h1').hide();

	//$('.hidden').show();

	$('div.hidden').fadeIn(8000);

	$('p').fadeOut(5000);

	$('#box1').click(function() {
		$(this).fadeTo(2000, 0.75, function(){
			//animation is complete
		})
	});

	$('button').click(function(){
		$('#box1').slideToggle();
	});

	/* ---------------------------
			jQuery ANIMATE 
	------------------------------ */

	//left arrow event
	$('#left').click(function(){
		$(".box-anim").animate({
			/* this happens when you click at the first time
			left: '-40px'
			*/

			left: "-=40px",
			fontSize: "-=2px"

		}, function(){
			//Animation is complete
		});	
	});

	//right arrow event
	$('#right').click(function(){
		$(".box-anim").animate({
			/* this happens when you click at the first time
			left: '-40px'
			*/

			left: "+=40px",
			fontSize: "+=2px"
		}, function(){
			//Animation is complete
		});	
	});

	//up arrow event
	$('#up').click(function(){
		$(".box-anim").animate({
			/* this happens when you click at the first time
			left: '-40px'
			*/

			top: "-=10px",
			opacity: "+=0.1"
		}, function(){
			//Animation is complete
		});	
	});

	//down arrow event
	$('#down').click(function(){
		$(".box-anim").animate({
			/* this happens when you click at the first time
			left: '-40px'
			*/

			top: "+=10px",
			opacity: "-=0.1"
		}, function(){
			//Animation is complete
		});	
	});

	/* ---------------------------
			jQuery CSS 
	------------------------------ */
	/*
	$('#circle2').css({
		"background": "#8a8d22",
		"display": "inline-block",
		"color": "#fff",
		"text-align": "center",
		"line-height": "140px",
		"height": "140px",
		"width": "140px",
		"margin": "40px"
	});
	$("#circle2").addClass("circleShape"); */

	/*$('#circle2').css({
		"background": "#8a8d22",
		"display": "inline-block",
		"color": "#fff",
		"text-align": "center",
		"line-height": "140px",
		"height": "140px",
		"width": "140px",
		"margin": "40px"
	}).addClass("circleShape");*/

	$('#circle2').addClass('cssChoCircle1va2').addClass('circleShape');
	
});