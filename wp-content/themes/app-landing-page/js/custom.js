
jQuery(document).ready(function($){

	$("body").niceScroll({
		cursorcolor: "#5fbd3e",
		zindex: "999999",
		cursorborder: "none",
		cursoropacitymin: "0",
		cursoropacitymax: "1",
		cursorwidth: "8px",
		cursorborderradius: "0px;"
	});

	/* Equal Height */
     $('.section-5 .col').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
    });
    
    /* Date Picker */
    $( "#datepicker" ).datepicker();

	$('#responsive-menu-button').sidr({
    	name: 'sidr-main',
    	source: '#site-navigation',
    	side: 'right'
    });

	var date_in = app_landing_page_data.date;

   	$('#days').countdown( date_in, function(event) {
  		$(this).html(event.strftime('%D'));
	});
	$('#hours').countdown( date_in, function(event) {
  		$(this).html(event.strftime('%H'));
	});
	$('#minutes').countdown(date_in, function(event) {
  		$(this).html(event.strftime('%M'));
	});
	$('#seconds').countdown(date_in, function(event) {
  		$(this).html(event.strftime('%S'));
	});
	
	//Event CountDown------------
	new WOW().init();

	
});