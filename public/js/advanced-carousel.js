(function($){

	var defaults = {

		waitTime : 800

	},
	// This is so that all functions can have acces to all options 
	// no matter what scope leve we're at
	parent;

	function lSAdvancedSlider(element, settings)
	{
		this.options = {};

		parent = this;

		this.element = element;
		$.extend(this.options, defaults, settings);

		this.carouselOuter = 
			this.element;

		this.autoSlide = this.options.autoSlide;

		this.carouselInner = 
			$(this.options.carouselInner);				

		this.wrapper = 
			$(this.options.wrapper);

		this.customHeight = 
			this.options.customHeight;

		this.carouselItem = 
			this.options.carouselItem;

		// this.singleImageWidth = this.carouselOuter.width() - 
		// 	(this.leftTransparentElement.width() + 
		// 		this.rightTransparentElement.width());

		this.leftLink = $(this.options.leftLink);

		this.rightLink = $(this.options.rightLink);

		this.scrollButtonsContainer = $(this.options.scrollButtonsContainer);

		this.scrollButtonClass = this.options.scrollButtonClass;

		this.numberOfCarouselItems = $(parent.carouselItem).length;

		this.singleCarouselItemWidth = parent.carouselOuter.width();

		this.animationDuration = this.options.animationDuration;

		this.easingType = this.options.easing;

		this.init();
	};

	//this function will be called at first time and subsequently anytime 
	// our browser window is resized
	lSAdvancedSlider.prototype.reCalculateElementSizes = _.throttle(function(){

		// parent.wrapper.finish();
		parent.disableAllClickHandlers();

		parent.singleCarouselItemWidth = parent.carouselOuter.width();
		parent.wrapper.width(parent.singleCarouselItemWidth * parent.numberOfCarouselItems);
		$(parent.carouselItem).animate({width: parent.singleCarouselItemWidth}, 100, function(){
			parent.carouselInner.css({height: parent.wrapper.height()});
			parent.rightLink.css({top: (parent.carouselOuter.height() - parent.leftLink.height()) / 2});
			parent.leftLink.css({top: (parent.carouselOuter.height() - parent.leftLink.height()) / 2});

			parent.setupAllClickHandlers();
		});
		
		parent.wrapper.animate({left: 0}, 100, parent.easingType);
	}, 500);

	lSAdvancedSlider.prototype.setupAllClickHandlers = function(){
		$(document).on("keyup",function(e){
			parent.handleDocumentKeyPress(e);
		});

		parent.leftLink.on("click", function(e){
			e.preventDefault();
			parent.slideRight();
		});
		
		parent.rightLink.on("click", function(e){
			e.preventDefault();
			parent.slideLeft();
		});
	}

	lSAdvancedSlider.prototype.disableAllClickHandlers = function(){
		$(document).off("keyup");

		parent.leftLink.off("click");
		
		parent.rightLink.off("click");
	}

	lSAdvancedSlider.prototype.init = function()
	{
		var totalNumberOfImages = $(parent.carouselItem).length;

		this.reCalculateElementSizes();

		parent.setupAllClickHandlers();

			// parent.carouselInner.height(parent.customHeight).width(parent.singleImageWidth);
			// parent.leftTransparentElement.height(parent.customHeight);
			// parent.rightTransparentElement.height(parent.customHeight);
			// $(parent.carouselItem).height(parent.customHeight);

		// $(parent.carouselItem).eq($(parent.carouselItem).length - 1).
		// 	insertBefore($(parent.carouselItem).eq(0));

		


		$(window).resize(function(){
			parent.reCalculateElementSizes()
			parent.scrollButtonsContainer.find("li").first().addClass("activeLink").siblings("li").removeClass("activelink");
		});

		var originalWaitTime = parent.waitTime;
		parent.waitTime = 0;
		parent.slideLeft();
		parent.waitTime = originalWaitTime;

		parent.createSlidingLinks();

		parent.scrollButtonsContainer.find("li").first().addClass("activeLink").siblings("li").removeClass("activelink");

		// parent.scrollButtonsContainer.
		// 	css({"left" : (parent.carouselInner.width() - 
		// 			parent.scrollButtonsContainer.width())/2});
	
		if(parent.autoSlide == true)
		{
			// parent.setUpAutoScroll();
		}
	};


	lSAdvancedSlider.prototype.slideLeft = _.debounce(function(numberOfSlides)
	{

		parent.adjustSlidingLinkColourWhenGoingLeft();

		if(Math.abs(parent.wrapper.css("left").replace("px", "")) >= (Math.abs(parent.wrapper.width() - parent.singleCarouselItemWidth))){
			// parent.moveFirstCarouselItemToLastPlace();
			parent.wrapper.animate({left: 0}, parent.animationDuration/2, parent.easingType);
			return;
		}

		parent.wrapper.animate({left: "-="+parent.singleCarouselItemWidth}, parent.animationDuration, parent.easingType);
		return;

		if((parseInt(parent.wrapper.css("left").replace("px",""))) == -(parent.singleImageWidth))
		{

			var first = $(parent.carouselItem).first();
			var last = $(parent.carouselItem).last();

			$(parent.carouselItem).first().
				insertAfter($(parent.carouselItem).last());

			//slide right once when we reached end
			var originalWaitTime = parent.waitTime;
			parent.waitTime = 0;
			parent.wrapper.animate({"left" : "+="+parent.singleImageWidth+"px"}, parent.waitTime);
			parent.waitTime = originalWaitTime;
		}

		//adjust activelink classes
		


		$(document).off("keyup");
		parent.wrapper.animate({"left" : "-="+parent.singleImageWidth+"px"}, parent.waitTime, function(){
			var originalWaitTime;

			$(document).on("keyup",function(e){
				parent.handleDocumentKeyPress(e);
			});

			originalWaitTime = parent.waitTime;
			parent.waitTime = 100;

			if(numberOfSlides > 1)
			{
				parent.slideLeft(--numberOfSlides);
			}

			parent.waitTime = originalWaitTime;
		});
	}, 400);

	lSAdvancedSlider.prototype.adjustSlidingLinkColourWhenGoingRight = function(link){
		var currentActiveLink = parent.scrollButtonsContainer.find(".activeLink");
		var nextActiveLink = currentActiveLink.prev();
		if(typeof link !== "undefined"){
			nextActiveLink = link;
		}
		if(nextActiveLink.length == 0)
		{
			nextActiveLink = parent.scrollButtonsContainer.children().last();
		}
		currentActiveLink.removeClass("activeLink");
		nextActiveLink.addClass("activeLink");
	}	

	lSAdvancedSlider.prototype.adjustSlidingLinkColourWhenGoingLeft = function(link){
		var currentActiveLink = parent.scrollButtonsContainer.find(".activeLink");
		var nextActiveLink = currentActiveLink.next();
		if(typeof link !== "undefined"){
			nextActiveLink = link;
		}
		if(nextActiveLink.length == 0)
		{
			nextActiveLink = parent.scrollButtonsContainer.children().first();
		}
		currentActiveLink.removeClass("activeLink");
		nextActiveLink.addClass("activeLink");
	}

	lSAdvancedSlider.prototype.slideRight = _.debounce(function(numberOfSlides)
	{

		parent.adjustSlidingLinkColourWhenGoingRight();		

		if(Math.abs(parent.wrapper.css("left").replace("px", "")) <= 0){
			// parent.moveFirstCarouselItemToLastPlace();
			parent.wrapper.animate({left: -parent.singleCarouselItemWidth * (parent.numberOfCarouselItems-1)}, parent.animationDuration/2, parent.easingType);
			return;
		}

		parent.wrapper.animate({left: "+="+parent.singleCarouselItemWidth}, parent.animationDuration, parent.easingType);
		return;
		if((parseInt(parent.wrapper.css("left").replace("px",""))) == -(parent.singleImageWidth))
		{

			$(parent.carouselItem).last().
				insertBefore($(parent.carouselItem).first());

			//slide left once when we reach end
			var originalWaitTime = parent.waitTime;
			parent.waitTime = 0;
			parent.wrapper.animate({"left" : "-="+parent.singleImageWidth+"px"}, parent.waitTime);
			parent.waitTime = originalWaitTime;
		}

		//adjust activelink classes
		

		$(document).off("keyup");
		parent.wrapper.animate({"left" : "+="+parent.singleImageWidth+"px"}, parent.waitTime, function(){
			var originalWaitTime;

			$(document).on("keyup",function(e){
				parent.handleDocumentKeyPress(e);
			});

			originalWaitTime = parent.waitTime;
			parent.waitTime = 100;

			if(numberOfSlides > 1)
			{
				parent.slideRight(--numberOfSlides);
			}

			parent.waitTime = originalWaitTime;

		});
		
	}, 400);

	lSAdvancedSlider.prototype.createSlidingLinks = function()
	{
		$(parent.carouselItem).each(function(index, value){

			var newLink = $("<li>", { class: parent.scrollButtonClass.replace(".","")});
			
			newLink.on("click", function(){

				parent.autoSlide = false;

				var index, numberOfSlides;
				var currentActiveLink = parent.scrollButtonsContainer.find(".activeLink");
				var indexOfActiveLink = parent.scrollButtonsContainer.find("li").index(currentActiveLink);
				//currentActiveLink.removeClass("activeLink");

				//$(this).addClass("activeLink");
				var indexOfClickedLink = parent.scrollButtonsContainer.find("li").index($(this));

				if(indexOfActiveLink < indexOfClickedLink)
				{
					//slide to the right
					parent.adjustSlidingLinkColourWhenGoingRight($(this));
					numberOfSlides = indexOfClickedLink - indexOfActiveLink;
					
					parent.slideLeftNumberOfTimes(numberOfSlides);
				}

				if(indexOfActiveLink > indexOfClickedLink)
				{
					//slide to the left
					parent.adjustSlidingLinkColourWhenGoingLeft($(this));
					numberOfSlides = indexOfActiveLink - indexOfClickedLink;

					parent.slideRightNumberOfTimes(numberOfSlides);
				}
				
			});

			parent.scrollButtonsContainer.append(newLink);

		});
	}

	lSAdvancedSlider.prototype.slideLeftNumberOfTimes = _.debounce(function(numberOfSlides){
		parent.wrapper.animate({left: "-="+numberOfSlides*parent.singleCarouselItemWidth}, parent.animationDuration, parent.easingType);
	}, 400);

	lSAdvancedSlider.prototype.slideRightNumberOfTimes = _.debounce(function(numberOfSlides){
		parent.wrapper.animate({left: "+="+numberOfSlides*parent.singleCarouselItemWidth}, parent.animationDuration, parent.easingType);
	}, 400);

	lSAdvancedSlider.prototype.setUpAutoScroll = function()
	{
		setTimeout(function(){
			if(parent.autoSlide == true)
			{
				parent.slideLeft();
				parent.setUpAutoScroll();
			}
		}, 3000);
	}

	lSAdvancedSlider.prototype.disableAutoScroll = function(){
		parent.autoSlide = false;
	}

	lSAdvancedSlider.prototype.handleDocumentKeyPress = _.debounce(function(e){

			//left key pressed
			if(e.keyCode == 37)
			{
				parent.slideRight();
			}

			//right key pressed
			if(e.keyCode == 39)
			{
				parent.slideLeft();
			}

	}, 400);

	$.fn.advancedCarousel = function(settings){

		var $this = this;
		new lSAdvancedSlider($this, settings);

		return $this;

	};

})(jQuery)