$(document).ready(function(){
      $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
	
	
	$('#slideshow > div:gt(0)').hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  3000);
});