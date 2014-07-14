// main.js for chmgen

$(document).ready(function(e) {

	function generate_menu(json) {
		var content = "";

		if(!json){
			return "";
		}

		if (json['number'] <= 0) {
			// create exist
			if (json['create']) {
				var create = '<li role="presentation"><a role="menuitem" tabindex="-1" href="#">create <code>' + json['create'] + '</code> function</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">create <code>' + json['create'] + '</code> page</a></li>';
			}
			content += create;
		} else{
			// create exist
			var create = "";
			if (json['create']) {
				create += '<li role="presentation" class="divider"></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">create <code>' + json['create'] + '</code> function</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="#">create <code>' + json['create'] + '</code> page</a></li>';
			}

			var suggest = "";
			for (var i = 0; i < json['number']; i++) {
				var name = json[i].name;
				suggest += '<li role="presentation"><a role="menuitem" tabindex="-1" href="#">' + name + '</a></li>';
			};

			content = suggest + create;

		};
		
		if (content != "") {
			$("#menu").html(content).show();
		}

	}

	$("#search").keyup(function(e){
		//console.log("trig");
		key = $(this).val();

		var url = $("meta[name='search_url']").attr('content');
		
		$.ajax({
		   type: "GET",
		   url: url,
		   data: {'k':key},
		   success: function(json){
		     //console.log(json);
		     generate_menu(json);
		   }
		});


	}).blur(function(e){
		$("#menu").hide();
	});

});