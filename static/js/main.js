// main.js for chmgen

$(document).ready(function(e) {

	function generate_menu(json) {
		// body...
	}

	$("#search").keyup(function(e){
		console.log("trig");
		key = $(this).val();

		var url = $("meta[name='search_url']").attr('content');
		
		$.ajax({
		   type: "GET",
		   url: url,
		   data: {'k':key},
		   success: function(json){
		     console.log(json);
		     generate_menu(json);
		   }
		});


	});

});