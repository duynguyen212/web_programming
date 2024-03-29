$(document).ready(function(){
	$('#go').click(function(){
		var carWidth = $('#car1').width();

		//get the width of the racetrack
		var raceTrackWidth = $(window).width() - carWidth;
		
		//set a flag variable to FALSE by default
		var isComplete = false;

		//set a flag variable to FIRST by default
		var place = 'first';

		//build a function that checks if a car has won the race
		function checkIsComplete() {
			if (isComplete == false) {
				isComplete = true;
			} else {
				place = 'second';
			}
		}

		//generate a random between 1 and 5000
		var raceTime1 = Math.floor((Math.random() * 5000) + 1);
		var raceTime2 = Math.floor((Math.random() * 5000) + 1);

		//animate car 1
		$('#car1').animate({
			//move the car width of the racetrack
			left: raceTrackWidth
		}, raceTime1, function(){
			//animation is complete

			//run a function
			checkIsComplete();

			//give some text feedback in the race info box
			$('#raceInfo1 span').text('Finished in ' + place + ' place and clocked in at ' + raceTime1 + ' milliseconds');
		});

		//animate car 2
		$('#car2').animate({
			//move the car width of the racetrack
			left: raceTrackWidth
		}, raceTime2, function(){
			//animation is complete

			//run a function
			checkIsComplete();

			//give some text feedback in the race info box
			$('#raceInfo2 span').text('Finished in ' + place + ' place and clocked in at ' + raceTime2 + ' milliseconds');
		});
	});

	$('#reset').click(function(){
		$('.car').css('left', '0');
		$('.raceInfo span').text('');
	});
});