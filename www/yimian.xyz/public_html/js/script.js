// Slideshow Highlight - center vertical
$.fn.centerVertical = function(){
	
		var containerHeight = $(this).height();
		var detailHeight = $('.detail',this).height();
		var centerVert = (containerHeight - detailHeight)/2;
				
		$('.detail',this).css('top', centerVert);	  	
    return this; //important to include     
};
    	    
	$(window).load(function(){ //wait till all loaded especially images		
		 $(".centerVert").each(function(){
		 	 $(this).centerVertical();
		 })		
	});	 				
	
	// On resize
	$(window).resize(function() {
		 $(".centerVert").each(function(){
		 	 $(this).centerVertical();
		 })		
	});

//Navigation ScrollTop ref: https://goo.gl/l6oIPp
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 500);
        return false;
      }
    }
  });
   
});

//ref: http://goo.gl/8Rzzde
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 50) {
        $("nav").addClass("fixed-top-active");
    } else {
        $("nav").removeClass("fixed-top-active");
    }
});	

/* Masonry */
	// init Masonry
	var $grid = $('.grid').masonry({
		  itemSelector: '.grid-item'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
	  $grid.masonry('layout');
	});

/* ScrollFlow */
//http://goo.gl/SFI3Se
$(document).ready( function(){
    new ScrollFlow(); 
});

/* Parallax */
$(document).ready( function(){
  $('#scene').parallax();	
});

/* Wowjs */
wow = new WOW({
	boxClass:     'wow',      // default
	animateClass: 'animated', // default
	offset:       0,          // default
	mobile:       true,       // default
	live:         true        // default
})
wow.init();


/* Contact Form */
$(function(){
	$('#contactForm').submit(function() {
	    if ($.trim($("#honeypot").val()) !== "") {
	        alert('Please leave the honeypot field empty');
	        return false;
	    }
	}); 	
	//https://github.com/1000hz/bootstrap-validator	
  $('#contactForm').validator();
   	
});


// .modal-backdrop classes
$(function(){
		$(".modal-transparent").on('show.bs.modal', function () {
		  setTimeout( function() {
		    $(".modal-backdrop").addClass("modal-backdrop-transparent");
		  }, 0);
		});
		$(".modal-transparent").on('hidden.bs.modal', function () {
		  $(".modal-backdrop").addClass("modal-backdrop-transparent");
		});
		
		$(".modal-fullscreen").on('show.bs.modal', function () {
		  setTimeout( function() {
		    $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
		  }, 0);
		});
		$(".modal-fullscreen").on('hidden.bs.modal', function () {
		  $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
		});
});


