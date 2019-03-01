$(document).ready(function() {
	$('#viewRecords').on('click', function() {
		$('#container').slideUp('slow');
		console.log('Go');
	
	});
	$('#iksic').on('click', function() {

		$('#container').slideDown('slow');
	});

	$('#delete').on('click', function() {
		
		$('#container').slideDown(1);
	});
});