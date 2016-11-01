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

document.getElementById('designer').addEventListener('click', function(){
	var design = document.getElementsByClassName('designer');
	var works = document.getElementsByClassName('mix');
	works.hidden;
	console.log(design);
});

var $work = $('.mix');
	console.log($work);
	$work.onclick();

$work.on('click', function(){
	console.log(this);

});