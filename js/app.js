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

/*var $all		= $('#all'),
	$design 	= $('#designer'),
	$poligraphs = $('#poligraphs'),
	$sites		= $('#sites'),
	$work 	= $(".mix");

$all.on('click', function(){
	// var design = $('.designer');
	$work.show();
});

$design.on('click', function(){
	$design.addClass('fn-work-sort__item_current');
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

function sort(item){
	item.addClass('fn-work-sort__item_current');
	$work.hide()
  		.filter( ".designer" )
    	.css( "display", "inline-block" );
}*/

$(function() {

	var newSelection = "";

	$(".fn-work-sort__item").click(function(){

	    $(".mix").fadeTo(200, 0.10);

		$(".fn-work-sort__item").removeClass("fn-work-sort__item_current");
		$(this).addClass("fn-work-sort__item_current");

		newSelection = $(this).attr("rel");

		$(".mix").not("."+newSelection).slideUp();
		$("."+newSelection).slideDown();

	    $(".mix").fadeTo(400, 1);

	});

});