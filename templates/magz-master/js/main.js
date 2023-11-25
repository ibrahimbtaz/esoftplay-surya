_Bbc(function ($) {
	if (!$('footer#latest_news .more').length) {
		$('footer#latest_news').css('margin', '10px 0');
		$('#latest_news .love').css('float', 'none');
	}
	if (!$('footer#another_news .more').length) {
		$('footer#another_news').css('margin', '10px 0');
		$('#another_news .love').css('float', 'none');
	}

	function periksaPosisi() {
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
	periksaPosisi();
});