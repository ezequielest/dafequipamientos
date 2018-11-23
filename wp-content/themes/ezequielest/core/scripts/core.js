jQuery(document).ready(function(){
    
	if(typeof skrollr !== "undefined") skrollr.init({ forceHeight: false });
	
	//MOBILE MENU REDIRECT
	//Redirects the user to the target page when selecting a menu item
	jQuery('.menu-mobile').on('change', function(){
		var url = jQuery(this).val();
		if(url){
			window.location = url;
		}
		return false;
	});
	
	//DEFAULT WORDPRESS GALLERY LIGHTBOX
	//Adds PrettyPhoto to galleries with the source file as the target link
	jQuery("a[rel^='gallery']").prettyPhoto({
		show_title: false,
		overlay_gallery: false,
		theme: 'pp_default',
		deeplinking: false,
		social_tools: false
	});
	
	//INLINE SLIDESHOWS
	//Enables inline slideshows
	jQuery('.slideshow-slides').each(function(){
		var p = this.parentNode;
		jQuery(this).cycle({
			fx: 'fade',
			pause: true,
			pauseOnPagerHover: true,
			containerResize: false,
			slideResize: false,
			fit: 1,
			before: resize_slideshow_height,
			after: resize_slideshow_height,
			prev: jQuery('.slideshow-prev', p),
			next: jQuery('.slideshow-next', p),
			pager: jQuery('.slideshow-pages', p)
		});    
	});
	
	//SKIPPING BUTTONS
	//Adds smooth scrolling to an anchor link with the specified class
	jQuery('.skip-to').click(function(e){
		e.preventDefault();
		var target_id = jQuery(this).attr('href');
		jQuery('html, body').animate({
			scrollTop: jQuery(target_id).offset().top
		}, 1000);
	});
	
});

//Formats Twitter strings with links
function format_twitter_message(str){
	str=' '+str;
	str = str.replace(/((ftp|https?):\/\/([-\w\.]+)+(:\d+)?(\/([\w/_\.]*(\?\S+)?)?)?)/gm,'<a href="$1" target="_blank">$1</a>');
	str = str.replace(/([^\w])\@([\w\-]+)/gm,'$1@<a href="http://twitter.com/$2" target="_blank">$2</a>');
	str = str.replace(/([^\w])\#([\w\-]+)/gm,'$1<a href="http://twitter.com/search?q=%23$2" target="_blank">#$2</a>');
	return str;
}

//Resizes slideshow height after each transition
function resize_slideshow_height(curr, next, opts, fwd) {
	var ht = jQuery(this).height();
	jQuery(this).parent().animate({height: ht});
}


