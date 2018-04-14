var app = {};

app.web = {
	init : function(){
		app.web.common();
		app.web.news();
	},
	common : function(){
		CKEDITOR.replaceClass = 'ckeditor';

		$(".disable-form").submit(function(){
			$(this).find('.btn-submit').text("Please wait...");
			$(this).find('.btn-submit').prop('disabled', true);
		})

		$(".confirm-modal").click(function(){
			var url = $(this).data('url');
			var content = $(this).data('content');
			$("#confirm-content").text(content);
			$("#confirm-url").attr('href', url);
		});

		$('[data-toggle="tooltip"]').tooltip(); 
	},
	news : function(){		
		$("#newsContent").val($("#content").val());
	}
}

$(document).ready(function() {
	app.web.init();
});