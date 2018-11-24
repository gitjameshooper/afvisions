
	// Main nagivation
	if (document.getElementById("menu-primary")) {
		var buttonMain = document.getElementById( 'nav-toggle' );
		var navMain = responsiveNav(".main-navigation", { // Selector
			transition: 350,             // Integer: Speed of the transition, in milliseconds
			customToggle: "#nav-toggle", // Selector: Specify the ID of a custom toggle
			init: function () {          // Set ARIA for menu toggle button
				buttonMain.setAttribute( 'aria-expanded', 'false' );
				buttonMain.setAttribute( 'aria-pressed', 'false' );
				buttonMain.setAttribute( 'aria-controls', 'menu-primary' );
			},
			open: function () {
				buttonMain.setAttribute( 'aria-expanded', 'true' );
				buttonMain.setAttribute( 'aria-pressed', 'true' );
			},
			close: function () {
				buttonMain.setAttribute( 'aria-expanded', 'false' );
				buttonMain.setAttribute( 'aria-pressed', 'false' );
			},
		});
	}
	
	// Top navigation
	if (document.getElementById("menu-top")) {
		var buttonTop = document.getElementById( 'top-nav-toggle' );
		var navTop = responsiveNav(".top-navigation", { // Selector
			transition: 350,                 // Integer: Speed of the transition, in milliseconds
			customToggle: "#top-nav-toggle", // Selector: Specify the ID of a custom toggle
			init: function () {              // Set ARIA for menu toggle button
				buttonTop.setAttribute( 'aria-expanded', 'false' );
				buttonTop.setAttribute( 'aria-pressed', 'false' );
				buttonTop.setAttribute( 'aria-controls', 'menu-top' );
			},
			open: function () {
				buttonTop.setAttribute( 'aria-expanded', 'true' );
				buttonTop.setAttribute( 'aria-pressed', 'true' );
			},
			close: function () {
				buttonTop.setAttribute( 'aria-expanded', 'false' );
				buttonTop.setAttribute( 'aria-pressed', 'false' );
			},
		});
	}
	
	// Social
	if (document.getElementById("menu-social")) {
		var buttonSocial = document.getElementById( 'social-nav-toggle' );
		var navSocial = responsiveNav(".social-navigation", { // Selector
			transition: 350,                    // Integer: Speed of the transition, in milliseconds
			customToggle: "#social-nav-toggle", // Selector: Specify the ID of a custom toggle
			init: function () {                 // Set ARIA for menu toggle button
				buttonSocial.setAttribute( 'aria-expanded', 'false' );
				buttonSocial.setAttribute( 'aria-pressed', 'false' );
				buttonSocial.setAttribute( 'aria-controls', 'menu-social' );
			},
			open: function () {
				buttonSocial.setAttribute( 'aria-expanded', 'true' );
				buttonSocial.setAttribute( 'aria-pressed', 'true' );
			},
			close: function () {
				buttonSocial.setAttribute( 'aria-expanded', 'false' );
				buttonSocial.setAttribute( 'aria-pressed', 'false' );
			},
		});
	}