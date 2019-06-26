$(document).ready(function(){
	$('.center input').keyup(function(){
		var words = $('input').val();

		if (words != '') {

			$.ajax({
				'url' : 'search.php',
				'method' : 'GET',
				'dataType' : 'json',
				'data' : {s : words}
			})
			.done(function(response){
				$('.results').html('');
				
				$.each(response, function(key, val){
					$('.results').append('<div class="item">' + val + '</div>');
				});
			})
			.fail(function(){
				$('.results').html('');
			});
			

		} else {
			$('.results').html('');
		}
	});
});