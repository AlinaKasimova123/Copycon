(function ($) {
  "use strict";

	 $(document).ready(function(){
		 $('.carousel_se_01_carousel' ).owlCarousel({
			items: 3,
			dots: true,
			dotsEach: 3,
			loop:true, 
			margin:10,
    		responsiveClass:true,
		    nav: true,
			autoWidth:true,
		   
		    mouseDrag: true,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
		    responsive: {
		        0:{
		          items: 1,
				  loop: true
		        },
		        480:{
		          items: 1,
				  loop: true
		        },
		        767:{
		          items: 2,
				  loop: true
		        },
		        992:{
		          items: 3,
				  loop: true
		        },
		        1200:{
		          items: 3,
				  loop: true
		        }
		    }
		  });

	 });
})(jQuery); 


(function ($) {
	"use strict";
  
	   $(document).ready(function(){
		   $('.carousel_se_02_carousel' ).owlCarousel({
			  items: 3,
			  dotsEach: 2,
			  loop:true, 
			  nav: true,
			  autoWidth:false,

			 
			  mouseDrag: true,
			  autoplay:true,
			  autoplayTimeout:3000,
			  autoplayHoverPause:true,
			  responsiveClass: true,
			  responsive: {
				  0:{
					items: 1,
					loop: true
				  },
				  480:{
					items: 1,
					loop: true
				  },
				  767:{
					items: 2,
					loop: true
				  },
				  992:{
					items: 3,
					loop: true
				  },
				  1200:{
					items: 3,
					loop: true
				  }
			  }
			});
  
	   });
  })(jQuery);