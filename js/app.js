$(document).foundation();

// document.getElementById('designer').addEventListener('click', function(){
// 	var n = document.getElementsByClassName('designer');
// 	n.innerHTML = '[eq[qe';
// });

//  $(document).ready(function(){
//     $("#menu").on("click","a", function (event) {
//         event.preventDefault();
//         var id  = $(this).attr('href');
//         	console.log(id);
//             top = $(id).offset().top;
//         $('body,html').animate({scrollTop: top}, 1500);
//     });
// });

var $design 	= $('#designer'),
	$poligraphs = $('#poligraphs'),
	$sites		= $('#sites'),
	$work 	= $(".mix");

$design.on('click', function(){
	// var design = $('.designer');
	$work.hide()
  		.filter( ".designer" )
    	.css( "display", "inline-block" );
});

$poligraphs.on('click', function(){
	// var poligraphs = $('.poligraphs');
	$work.css( "display", "none" )
  		.filter( ".poligraphs" )
    	.css( "display", "inline-block" );
});

$sites.on('click', function(){
	// var design = $('.designer');
	$work.css( "display", "none" )
  		.filter( ".sites" )
    	.css( "display", "inline-block" );
});


