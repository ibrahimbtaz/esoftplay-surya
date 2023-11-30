_Bbc(function ($) {
	if (!$('footer#latest_news .more').length) {
		$('footer#latest_news').css('margin', '10px 0');
		$('#latest_news .love').css('float', 'none');
	}
	if (!$('footer#another_news .more').length) {
		$('footer#another_news').css('margin', '10px 0');
		$('#another_news .love').css('float', 'none');
	}

	function search_position() {
		var divAtas = $(".search_top");
		var divBawah = $(".search_popular");

		if (divBawah.index() < divAtas.index()) {
			divBawah.css({
				"margin-top": "20px",
				"margin-bottom": "0"
			});
		} else {
			divBawah.css("margin-top", "0px");
		}
		if (divAtas.index() < divBawah.index()) {
			divAtas.css({
				"margin-top": "20px",
				"margin-bottom": "0"
			});
		} else {
			divAtas.css("margin-top", "0px");
		}
	}
	function left_position() {
		var trending_tags = $(".trending_tags");
		var how_news = $(".hot_news");
		var colWidth = $(".col-md-6").width();

		if (!trending_tags.prev().hasClass("col-md-6") && !trending_tags.next().hasClass("col-md-6")) {
		  trending_tags.removeClass("col-md-6 col-sm-6").addClass("col-md-auto");
		}

		if (!how_news.prev().hasClass("col-md-6") && !how_news.next().hasClass("col-md-6")) {
		  how_news.removeClass("col-md-6 col-sm-6").addClass("col-md-auto");
		}
		
	}
		left_position();
	search_position();
});