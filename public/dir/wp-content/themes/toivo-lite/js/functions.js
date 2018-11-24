
/**
 * Enable tab support for dropdown menus.
 */
( function() {
	var container, containerTop, menu, menuTop, links, linksTop;

	container = document.getElementById( 'menu-primary' );
	
	containerTop = document.getElementById( 'menu-top' );

	/**
	 * Make dropdown menus keyboard accessible.
	 */
	 
	if ( container ) {
		
		menu = container.getElementsByTagName( 'ul' )[0];

		// Get all the link elements within the menu.
		links = menu.getElementsByTagName( 'a' );

		// Each time a menu link is focused or blurred call the function toggleFocus.
		for ( var i = 0, len = links.length; i < len; i++ ) {
			links[i].onfocus = toggleFocus;
			links[i].onblur = toggleFocus;
		}
		
	}
	
	if ( containerTop ) {
		
		menuTop = containerTop.getElementsByTagName( 'ul' )[0];

		// Get all the link elements within the menu.
		linksTop = menuTop.getElementsByTagName( 'a' );

		// Each time a menu link is focused or blurred call the function toggleFocus.
		for ( var i = 0, len = linksTop.length; i < len; i++ ) {
			linksTop[i].onfocus = toggleFocus;
			linksTop[i].onblur = toggleFocus;
		}
		
	}

	function toggleFocus() {
		var current = this,
		    ancestors = [];

		// Create an array of <li> ancestors of the current link. Stop upon
		// reaching .menu-items at the top of the current menu system.
		while ( -1 === current.className.indexOf( 'menu-items' ) ) {
			if ( 'li' === current.tagName.toLowerCase() ) {
				ancestors.unshift( current );
			}
			current = current.parentElement;
		}

		// For each element in ancestors[] toggle the class .focus.
		for ( i = 0, len = ancestors.length; i < len; i++ ) {
			if ( -1 !== ancestors[i].className.indexOf( 'focus' ) )
				ancestors[i].className = ancestors[i].className.replace( ' focus', '' );
			else
				ancestors[i].className += ' focus';
		}
	}
	
	// Fix child menus for touch devices.
	function fixMenuTouchTaps( container ) {
		var touchStartFn,
		    parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for( var i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( var i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false )
			}
		}
	}
	
	if ( container ) {
		fixMenuTouchTaps( container );
	}
	
} )();

/**
 * Skip link focus fix.
 */
( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();
