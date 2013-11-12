(function($){

	$(document).ready(function(){

		$(".carousel-outer").advancedCarousel({

			waitTime : 000,
			carouselInner : ".carousel-inner",
			wrapper : ".wrapper",
			carouselItem : ".carousel-item",
			customHeight : 400,
			leftLink : ".left-link",
			rightLink : ".right-link",
			scrollButtonsContainer : ".scroll-buttons",
			scrollButtonClass : ".scroll-button",
			autoSlide : true,
			animationDuration: 1000,
			easing: "easeInOutCubic"

		});

	});

})(jQuery)
