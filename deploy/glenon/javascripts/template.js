jQuery(document).ready(function($){	
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
 
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});	
	
	$(".carousel-posts").jCarouselLite({
       		scroll: 1,
			auto: 8000,
			btnNext: ".CarNext",
			btnPrev: ".CarPrev"
   		});	
	
	function portfolio_quicksand() {
		
		// Setting Up Our Variables
		var $filter;
		var $container;
		var $containerClone;
		var $filterLink;
		var $filteredItems
		
		// Set Our Filter
		$filter = $('.filter li.active a').attr('class');
		
		// Set Our Filter Link
		$filterLink = $('.filter li a');
		
		// Set Our Container
		$container = $('ul.filterable-grid');
		
		// Clone Our Container
		$containerClone = $container.clone();
		
		// Apply our Quicksand to work on a click function
		// for each for the filter li link elements
		$filterLink.click(function(e) 
		{
			// Remove the active class
			$('.filter li').removeClass('active');	
			
			// Split each of the filter elements and override our filter
			$filter = $(this).attr('class').split(' ');
			
			// Apply the 'active' class to the clicked link
			$(this).parent().addClass('active');
			
			// If 'all' is selected, display all elements
			// else output all items referenced to the data-type
			if ($filter == 'all') {
				$filteredItems = $containerClone.find('li'); 
			}
			else {
				$filteredItems = $containerClone.find('li[data-type~=' + $filter + ']'); 
			}
			
			// Finally call the Quicksand function
			$container.quicksand($filteredItems, 
			{
				// The Duration for animation
				duration: 750,
				// the easing effect when animation
				easing: 'easeInOutCirc',
				// height adjustment becomes dynamic
				adjustHeight: 'dynamic',
				// disable it if you're not using scaling effect or want to improve performance
				useScaling: true
			});
			
			//Initalize our PrettyPhoto and Image hover Script When Filtered
			$container.quicksand($filteredItems, 
				function () { lightbox(); imagehover(); }
			);	
		});
	}
		
	if(jQuery().quicksand) {
		portfolio_quicksand();	
	}
		
	function lightbox() {
		// Apply PrettyPhoto to find the relation with our portfolio item
		$("a[rel^='prettyPhoto']").prettyPhoto({
			// Parameters for PrettyPhoto styling
			animationSpeed:'fast',
			slideshow:5000,
			theme:'pp_default',
			show_title:false,
			overlay_gallery: false,
			social_tools: false
		});
	}
	
	function imagehover() {
		// Portfolio item hover effect
		$('.portfolio .hover a:has(span)').hover(function() { 
			$('span', this).fadeToggle(600); 
		});
	}
	
	if(jQuery().prettyPhoto) {
		lightbox();
	}
		
	if(jQuery().quicksand) {
		portfolio_quicksand();	
	}
		
	 // add class to anchor eg. .post a
	 $('.carousel-post a, .portfolio .classic a, .blog-thumb a').has('img').addClass('prettyPhoto');
	 $("a[class*='prettyPhoto']").prettyPhoto();
	 $('.carousel-post a, .portfolio .classic a, .blog-thumb a').has('img').attr('rel', '[gallery]'); //make sure gallery is wrapped in square brackets

	// add title from anchor to image description, add gallery for multiple images

	 $('.carousel-post a, .portfolio .classic a').click(function () {
	 var desc = $(this).attr('title');
	 $('.carousel-post a, .portfolio .classic a').has('img').attr('title', desc, 'rel', '[gallery]' ); //make sure gallery is wrapped&nbsp;&nbsp;square brackets

	}); 
	
	$('.dpe-flexible-posts.portf-cols a:has(span)').hover(function() { 
		$('span', this).fadeToggle(600); 
	});
	
	$('.portfolio .hover a:has(span)').hover(function() { 
		$('span', this).fadeToggle(600); 
	});
	
	var numberOfSlides = jQuery("#slider-wrap ul.slides > li").length;
	if(numberOfSlides == 0){
		numberOfSlides = 1;
	}
    var widthOfNav = 18*numberOfSlides;
    jQuery(".flexslider-caption").css('paddingRight', widthOfNav + 50 + 'px');
	
	// var conNav = $('.flex-control-nav').width();
	 // $('.flexslider-caption').css({'paddingRight': conNav + 'px'});

	
		/* Superfish
	================================================== */
	$(function(){ // run after page loads
		$('#navigation ul.menu').mobileMenu();
		
		$('#navigation ul.menu')
		.find('li.current_page_item,li.current_page_parent,li.current_page_ancestor,li.current-cat,li.current-cat-parent,li.current-menu-item')
			.addClass('active')
			.end()
			.superfish({
				speed		: 'fast',
				animation	: {height:'show'},
				autoArrows	: true
			});
	});
	
	// Forum Login
	
	$(function(){ // run after page loads
		$("#toggle").click(function() { 
	    // hides matched elements if shown, shows if hidden
	    $("#login-form").slideToggle();
	  });
	});

	// Style Tags
	
	$(function(){ // run after page loads
		$('p.tags a')
		.wrap('<span class="st_tag" />');
	});
	

	// Toggle Slides
	
	$(function(){ // run after page loads
			$(".toggle_container").hide(); 
			//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
			$("p.trigger").click(function(){
				$(this).toggleClass("active").next().slideToggle("normal");
				return false; //Prevent the browser jump to the link anchor
			});
	});
	
	// valid XHTML method of target_blank
	$(function(){ // run after page loads
		$('a[rel*=external]').click( function() {
			window.open(this.href);
			return false;
		});
	});


	/* Tabs Activiation
	================================================== */
	var tabs = $('ul.tabs');
	tabs.each(function(i) {
		//Get all tabs
		var tab = $(this).find('> li > a');
		$("ul.tabs li:first").addClass("active").fadeIn('fast'); //Activate first tab
		$("ul.tabs li:first a").addClass("active").fadeIn('fast'); //Activate first tab
		$("ul.tabs-content li:first").addClass("active").fadeIn('fast'); //Activate first tab
		
		tab.click(function(e) {
			
			//Get Location of tab's content
			var contentLocation = $(this).attr('href') + "Tab";
			
			//Let go if not a hashed one
			if(contentLocation.charAt(0)=="#") {
			
				e.preventDefault();
			
				//Make Tab Active
				tab.removeClass('active');
				$(this).addClass('active');
				
				//Show Tab Content & add active class
				$(contentLocation).show().addClass('active').siblings().hide().removeClass('active');
				
			} 
		});
	}); 

/***********************************************************************************************************************
DOCUMENT: includes/javascript.js
DEVELOPED BY: Ryan Stemkoski
COMPANY: Zipline Interactive
EMAIL: ryan@gozipline.com
PHONE: 509-321-2849
DATE: 3/26/2009
UPDATED: 3/25/2010
DESCRIPTION: This is the JavaScript required to create the acc style menu.  Requires jQuery library
NOTE: Because of a bug in jQuery with IE8 we had to add an IE stylesheet hack to get the system to work in all browsers. I hate hacks but had no choice :(.
************************************************************************************************************************/
	//acc BUTTON ACTION (ON CLICK DO THE FOLLOWING)
	$('.accButton').click(function() {

		//REMOVE THE ON CLASS FROM ALL BUTTONS
		$('.accButton').removeClass('on');
		  
		//NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
		$('.accContent').slideUp('slow');
   
		//IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
		if($(this).next().is(':hidden') == true) {
			
			//ADD THE ON CLASS TO THE BUTTON
			$(this).addClass('on');
			  
			//OPEN THE SLIDE
			$(this).next().slideDown('slow');
		 } 
		  
	 });
	  
	
	/*** REMOVE IF MOUSEOVER IS NOT REQUIRED ***/
	
	//ADDS THE .OVER CLASS FROM THE STYLESHEET ON MOUSEOVER 
	$('.accButton').mouseover(function() {
		$(this).addClass('over');
		
	//ON MOUSEOUT REMOVE THE OVER CLASS
	}).mouseout(function() {
		$(this).removeClass('over');										
	});
	
	/*** END REMOVE IF MOUSEOVER IS NOT REQUIRED ***/
	
	
	/********************************************************************************************************************
	CLOSES ALL S ON PAGE LOAD
	********************************************************************************************************************/	
	$('.accContent').hide();
});

	