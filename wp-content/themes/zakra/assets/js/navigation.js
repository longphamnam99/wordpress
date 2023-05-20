/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(
	function () {
		var container, button, menu, links, i, len;

		container = document.getElementById( 'site-navigation' );
		if ( ! container ) {
			return;
		}

		menu = container.getElementsByTagName( 'ul' )[0];

		menu.setAttribute( 'aria-expanded', 'false' );
		if ( - 1 === menu.className.indexOf( 'nav-menu' ) ) {
			menu.className += ' nav-menu';
		}

		// Get all the link elements within the menu.
		links = menu.getElementsByTagName( 'a' );

		// Each time a menu link is focused or blurred, toggle focus.
		for ( i = 0, len = links.length; i < len; i ++ ) {
			links[i].addEventListener( 'focus', toggleFocus, true );
			links[i].addEventListener( 'blur', toggleFocus, true );
		}

		/**
		 * Sets or removes .focus class on an element.
		 */
		function toggleFocus() {
			var self = this;

			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( - 1 === self.className.indexOf( 'nav-menu' ) ) {

				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					if ( - 1 !== self.className.indexOf( 'focus' ) ) {
						self.className = self.className.replace( ' focus', '' );
					} else {
						self.className += ' focus';
					}
				}

				self = self.parentElement;
			}
		}

		/**
		 * Toggles `focus` class to allow submenu access on tablets.
		 */
		(
			function ( container ) {
				var touchStartFn, i,
				    parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

				if ( 'ontouchstart' in window ) {
					touchStartFn = function ( e ) {
						var menuItem = this.parentNode,
						    i;

						if ( ! menuItem.classList.contains( 'focus' ) ) {
							e.preventDefault();
							for ( i = 0; i < menuItem.parentNode.children.length; ++ i ) {
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

					for ( i = 0; i < parentLink.length; ++ i ) {
						parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
					}
				}
			}( container )
		);
	}()
);


/**
 * Fixes menu out of viewport
 */
( function () {
	var i;

	var container      = document.getElementById( 'site-navigation' ),
	    elWithChildren = document.querySelectorAll( '.tg-primary-menu li.menu-item-has-children, .tg-primary-menu li.page_item_has_children' ),
	    elCount        = elWithChildren.length;

	/**
	 * @see https://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport/125106#125106
	 */
	function elementInViewport( el ) {
		var top    = el.offsetTop,
		    left   = el.offsetLeft,
		    width  = el.offsetWidth,
		    height = el.offsetHeight;

		while ( el.offsetParent ) {
			el = el.offsetParent;
			top += el.offsetTop;
			left += el.offsetLeft;
		}

		return (
			top >= window.pageYOffset &&
			left >= window.pageXOffset &&
			( top + height ) <= ( window.pageYOffset + window.innerHeight ) &&
			( left + width ) <= ( window.pageXOffset + window.innerWidth )
		);
	} // End: function elementInViewport( el ) {

	// Loop through li having sub menu.
	for ( i = 0; i < elCount; i ++ ) {

		// On mouse enter.
		elWithChildren[i].addEventListener( 'mouseenter', function ( ev ) {
			var li = ev.currentTarget;

			if ( li ) {

				var subMenu = li.querySelectorAll( '.sub-menu, .children' )[0];

				if ( subMenu ) {
					var w = window,
					    d = document,
					    e = d.documentElement,
					    g = d.getElementsByTagName( 'body' )[0],
					    x = w.innerWidth || e.clientWidth || g.clientWidth,
					    y = w.innerHeight || e.clientHeight || g.clientHeight;

					if ( ! elementInViewport( subMenu ) ) {
						subMenu.classList.add( 'tg-edge' );
					}
				}
			}
		}, false );

		// On mouse leave.
		elWithChildren[i].addEventListener( 'mouseleave', function ( ev ) {
			var li = ev.currentTarget;

			if ( li ) {
				var sub = li.querySelectorAll( '.sub-menu, .children' )[0];

				sub.classList.remove( 'tg-edge' );

				if ( sub.classList.contains( 'tg-edge' ) ) {
					sub.classList.remove( 'tg-edge' );
				}
			}
		}, false );
	} // End: for ( i in elWithChildren ) {

} )();
