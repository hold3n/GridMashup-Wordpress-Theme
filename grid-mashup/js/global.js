jQuery( function($) {
	
	// Scroll back to top	
	function WPEXBackTopScroll() {
		
		$( 'a[href=#top]' ).on('click', function() {
			$( 'html, body' ).animate({scrollTop:0}, 'normal');
			return false;
		} );
	
	}
	
	// Scroll to comments	
	function WPEXCommentScroll() {
		
		$( '.comment-scroll a' ).click( function(event) {		
			event.preventDefault();
			$( 'html,body' ).animate( {
				scrollTop: $( this.hash ).offset().top
				}, 'normal' );
		} );
		
	}
	
	// Responsive navbar
	function WPEXResponsiveNav() {
		var nav = $( '#site-navigation' ), button, menu;
		$( '.nav-toggle' ).on( 'click', function() {	
			$( '.nav-menu' ).toggleClass( 'toggled-on' );
			$( '.nav-toggle' ).find('.toggle-icon').toggleClass('icon-arrow-down icon-arrow-up');
		} );
	}
	
	//Toggle sidebar
	$('a#toggle-btn').click(function(){
		$('div#toggle-wrap').slideToggle();
		$(this).find('i').toggleClass('icon-reorder icon-remove');
	})
	
	
	//Toggle comments
	function ToggleComments() {
		jQuery('#comments').hide();
		jQuery('#show_comments').show();
	
		if ( jQuery('#show_comments').length > 0 ) {
			jQuery('#show_comments').bind('click', function(e) {
				e.preventDefault();
				jQuery('#comments, #hide_comments').show();
				jQuery('body, html').animate({scrollTop: jQuery('#comments').offset().top}, 200);
				jQuery(this).hide();
			});
		}
		if ( jQuery('#hide_comments').length > 0 ) {
			jQuery('#hide_comments').bind('click', function(e) {
				e.preventDefault();
				jQuery('#comments').hide();
				jQuery(this).hide();
				jQuery('#show_comments').show();
			});
		}
		
	
	}
	
	
	
	
	// Masonry Widths
	function WPEXMasonry() {
		
		// Shit browsers
		if ($.browser.msie && parseInt($.browser.version, 10) === 8) {
			
			$('.grid').masonry({
					itemSelector: '.loop-entry',
					gutterWidth : 20,
					columnWidth: 300,
					isAnimated: false
			});
		
		// Decent browsers		
		} else {
			
			
			var $windowWidth = $(window).width();
			var $gridWidth = $('.grid').width();
			
			//Monitor superiore a 1024	
			if ( $windowWidth > 1024 ) {
				var $colWidth = 290;
				 $('.grid').masonry({
					itemSelector: '.loop-entry',
					gutterWidth : 20,
					columnWidth: $colWidth,
					isAnimated: true
				});
				$('.loop-entry').width( $colWidth );
			
			//iPad orizzontale	
			} else if ( $windowWidth > 768 && $windowWidth <= 1024) {
				var $colWidth = 310;
				 $('.grid').masonry({
					itemSelector: '.loop-entry',
					gutterWidth : 20,
					columnWidth: $colWidth,
					isAnimated: true
				});
				$('.loop-entry').width( $colWidth );			
				
			
			//iPad verticale	
			} else if ( $windowWidth > 480 && $windowWidth <= 768 ) {
				var $colWidth = 330;
				$('.grid').masonry({
					itemSelector: '.loop-entry',
					gutterWidth : 20,
					columnWidth: $colWidth,
					isAnimated: true
				});
				$('.loop-entry').width( $colWidth );
				
			//iPhone orizzontale	
			} else if ( $windowWidth > 320 && $windowWidth <= 480 ) {
				var $colWidth = 190;
				$('.grid').masonry({
					itemSelector: '.loop-entry',
					gutterWidth : 10,
					columnWidth: $colWidth,
					isAnimated: true
				});
				$('.loop-entry').width( $colWidth );
			
			
			//iPhone verticale + altro	
			} else {
				$('.grid').masonry({
					itemSelector: '.loop-entry',
					gutterWidth : 10,
					columnWidth: 280,
					isAnimated: true
				});
				$('.loop-entry').width(280);
			}
		}
	}
	
	
	$(document).ready(function(){
		WPEXBackTopScroll();
		WPEXCommentScroll();
		WPEXResponsiveNav();
		WPEXMasonry();
		ToggleComments();
	});
	
	
	$(window).load(function(){
		WPEXMasonry();
	});
	
	
	$(window).resize(function() {
   		WPEXMasonry();
	});
	
	if (document.addEventListener){
		window.addEventListener("orientationchange", function() {
			WPEXMasonry();
		});
		
		window.addEventListener("resize", function() {
			WPEXMasonry();
		});
	}
	
	
});