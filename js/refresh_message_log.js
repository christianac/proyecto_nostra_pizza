$.ajaxSetup ({
	cache: false
});

$(setInterval(function() {
	$('.main_sr').load('mostrar_mesas_soloread.php');
	//$(".main_Sr").attr({ scrollTop: $('.main').attr('scrollHeight') });
}, 500));