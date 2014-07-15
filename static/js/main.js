// main.js for chmgen

$(document).ready(function(e) {
	var search_url = $("meta[name='search_url']").attr('content');
	var creat_function_url = $("meta[name='creat_function_url']").attr('content');
	var creat_page_url = $("meta[name='creat_page_url']").attr('content');
	var edit_url = $("meta[name='edit_url']").attr('content');

	function generate_menu(json) {
		var content = "";

		if(!json){
			return "";
		}

		if (json['number'] <= 0) {
			// create exist
			if (json['create']) {
				var create = '<li role="presentation"><a role="menuitem" tabindex="-1" href="' + creat_function_url + '?key=' + json['create'] + '">create <code>' + json['create'] + '</code> function</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="' + creat_page_url + '?key=' + json['create'] + '">create <code>' + json['create'] + '</code> page</a></li>';
				//console.log(create);
			}
			content += create;
		} else{
			// create exist
			var create = "";
			if (json['create']) {
				create += '<li role="presentation" class="divider"></li><li role="presentation"><a role="menuitem" tabindex="-1" href="' + creat_function_url + '?key=' + json['create'] + '">create <code>' + json['create'] + '</code> function</a></li><li role="presentation"><a role="menuitem" tabindex="-1" href="' + creat_page_url + '?key=' + json['create'] + '">create <code>' + json['create'] + '</code> page</a></li>';
			}

			var suggest = "";
			for (var i = 0; i < json['number']; i++) {
				var name = json[i].name;
				suggest += '<li role="presentation"><a role="menuitem" tabindex="-1" href="' + edit_url + '?key=' + name + '&type=' + json[i].type + '">' + name + '</a></li>';
			};

			content = suggest + create;

		};
		
		if (content != "") {
			$("#menu").html(content).show();
		}

	}
	
	$("#search").keyup(function(e){
		var key = $(this).val();
		//var url = $("meta[name='search_url']").attr('content');
		
		$.ajax({
		   type: "GET",
		   url: search_url,
		   data: {'k':key},
		   success: function(json){
		     generate_menu(json);
		   }
		});

	});

	$(".dropdown").delegate("input,ul","focusout",function(){
		$("#menu").fadeOut(400);
	});

});