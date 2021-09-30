/**
 * @file siteNavigation.js
 * @description
 * It set the behaviour of the website menu as well
 * as the general behaviour of showing submenus.
 *
 * Required using WP function wp_nav_menu
 * as well as
 *
 * - site-nav.css
 * - mobile-site-nav.css
 * - mobile-site-nav-toggle.css
 *
 * @author Michael Geyer
 * @version 1.0
 *
 * */

/**
 * Get all DOM Element and check if they existing
 *
 * - #site-navigation <nav>
 * - #menu-toggle <button>
 * - #burger-btn <span>
 * - #primary_menu <ul>
 * - #primary_menu-mobile <ul>
 *
 */
const siteNavigation = document.querySelector('#site-navigation');
isDOMelementExisting(siteNavigation, '#site-navigation');
const mobileSiteNavigation = document.querySelector('#mobile-site-navigation');
isDOMelementExisting(mobileSiteNavigation, '#mobile-site-navigation');
const menuToggle = document.querySelector('#menu-toggle');
isDOMelementExisting(menuToggle, '#menu-toggle');
const burgerBtn = document.querySelector('#burger-btn');
isDOMelementExisting(burgerBtn, '#burger-btn');
const mobileMenu = document.querySelector('#primary_menu-mobile');
isDOMelementExisting(mobileMenu, '#primary_menu-mobile');

/**
 * Add event for menuToggle to toggle mobile Menu
 *
 * - click
 *
 */

menuToggle.addEventListener('click', function () {
	burgerBtn.classList.toggle('mobile-menu-burger-btn--is-active');
	toggleAriaProps(menuToggle);
	slideToggle(mobileMenu);
});

/**
 *  Add document event to hide mobile Menu
 *
 * - click
 *
 */
document.addEventListener('click', function (event) {
	// First see if mobile Menu is visibile by checking the aria-expanded on menuToggle
	if (menuToggle.getAttribute('aria-expanded') === 'true') {
		const isClickOnMobileToggle = menuToggle.contains(event.target);
		const isClickInsideMobileNav = mobileSiteNavigation.contains(event.target);

		// If not a click of mobileToggle and not inside mobileNav
		if (!isClickOnMobileToggle && !isClickInsideMobileNav) {
			hideMobileMenuOnEvent();
		}
	} else {
		return;
	}
});

/**
 *  Add window events to hide mobile Menu
 *
 * - resize
 * - scroll
 *
 */

window.addEventListener('resize', function () {
	// First see if mobile Menu is visibile by checking the aria-expanded on menuToggle
	if (menuToggle.getAttribute('aria-expanded') === 'true') {
		hideMobileMenuOnEvent();
	} else {
		return;
	}
});

// TODO: do not execute menu height is > window height
window.addEventListener('scroll', function () {
	// First see if mobile Menu is visibile by checking the aria-expanded on menuToggle
	if (menuToggle.getAttribute('aria-expanded') === 'true') {
		hideMobileMenuOnEvent();
	} else {
		return;
	}
});

/**
 *
 *
 */

(function () {
	const itemHasSubMenu = document.querySelectorAll(
		'.site-header .menu-item-has-children > a'
	);
	// Checks if subMenus are existing, if not exit function
	if (isDOMelementExisting(itemHasSubMenu, '#sub-menus') === false) {
		return;
	}

	for (const hasSubMenu of itemHasSubMenu) {
		hasSubMenu.insertAdjacentElement('beforeend', addSubMenuIndicator());

		// get the main ul to check if mobile or desktop
		const parentNav =
			hasSubMenu.parentElement.parentElement.parentElement.parentElement;

		if (parentNav.id === 'site-navigation') {
			// hasSubMenu.addEventListener("mouseover", function (event) {
			//   showSubMenu(event, "mouse");
			// });
			hasSubMenu.addEventListener('mouseenter', function (event) {
				showSubMenu(event, 'mouse');
			});
			hasSubMenu.addEventListener('mouseleave', function (event) {
				hideSubMenu(event, 'mouse');
			});
			hasSubMenu.addEventListener('focus', function (event) {
				showSubMenu(event, 'focus');
			});
			hasSubMenu.addEventListener('blur', function (event) {
				hideSubMenu(event, 'blur');
			});
			hasSubMenu.addEventListener('touch', function (event) {
				showSubMenu(event, 'touch');
			});
		} else if (parentNav.id === 'mobile-site-navigation') {
			hasSubMenu.addEventListener('focus', function (event) {
				showSubMenu(event, 'focus');
			});
			hasSubMenu.addEventListener('blur', function (event) {
				hideSubMenu(event, 'blur');
			});
			hasSubMenu.addEventListener('touch', function (event) {
				showSubMenu(event, 'touch');
			});
			hasSubMenu.addEventListener('click', function (event) {
				event.preventDefault();
				const indicator = event.target.lastElementChild;
				console.log(indicator);
				indicator.addEventListener('click', function () {
					alert('hey');
				});
				console.log(indicator);
				console.log('mobile-click');
			});
		} else {
			return;
		}
	}
})();

/**
 * @function isDOMElementExisting
 *
 * @param element variable name
 * @param id css id name
 *
 */

function isDOMelementExisting(element, id) {
	// Return early if the given element do not exist.
	if (!element || element.length === 0) {
		console.log(`Element with the id of ${id} is missing!`);
		return false;
	} else {
		return true;
	}
}

/**
 * @function toggleAriaProps
 *
 * @param el - DOM Element to toggle aria-expanded
 *
 */

function toggleAriaProps(el) {
	if (el.getAttribute('aria-expanded') === 'true') {
		el.setAttribute('aria-expanded', 'false');
	} else {
		el.setAttribute('aria-expanded', 'true');
	}
}

/**
 * @function hideMobileMenuOnEvent
 *
 */
function hideMobileMenuOnEvent() {
	burgerBtn.classList.remove('mobile-menu-burger-btn--is-active');
	toggleAriaProps(menuToggle);
	slideUp(mobileMenu);
}

/**
 * @function addSubMenuIndicator
 *
 */

function addSubMenuIndicator() {
	const subMenuIndicator = document.createElement('span');
	subMenuIndicator.classList.add('sub-menu-indicator');
	subMenuIndicator.innerHTML =
		'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="0.5em" height="0.5em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1200 1200"><path d="M600.006 989.352l178.709-178.709L1200 389.357l-178.732-178.709L600.006 631.91L178.721 210.648L0 389.369l421.262 421.262l178.721 178.721h.023z" fill="#626262"/></svg>';

	return subMenuIndicator;
}

/**
 * @function showSubMenu
 *
 */

function showSubMenu(el, eventTrigger) {
	if (eventTrigger === 'mouse') {
		const subMenu = el.target.nextElementSibling;
		if (subMenu.style.display === 'block') {
			return;
		} else {
			// toggleAriaProps(el.target);
			slideDown(subMenu, 150);
		}
	}

	if (eventTrigger === 'focus') {
		toggleAriaProps(el.target);
		const subMenu = el.target.nextElementSibling;
		slideDown(subMenu);
	}
}

/**
 * @function hideSubMenu
 *
 */

function hideSubMenu(el, eventTrigger) {
	if (eventTrigger === 'mouse') {
		const subMenu = el.target.nextElementSibling;
		if (subMenu.style.display === 'block') {
			const parentListItem = el.target.parentElement;
			parentListItem.addEventListener('mouseleave', function () {
				slideUp(subMenu, 150);
				// toggleAriaProps(el.target);
			});
			return;
		} else {
			slideUp(subMenu);
			// toggleAriaProps(el.target);
		}
	}

	if (eventTrigger === 'blur') {
		toggleAriaProps(el.target);
		const subMenu = el.target.nextElementSibling;
		if (subMenu.nodeName === 'UL') {
			toggleAriaProps(el.target);
			const subMenuItems = subMenu.children;
			const lastSubMenuItem = subMenuItems[subMenuItems.length - 1];
			lastSubMenuItem.addEventListener('focusout', function () {
				slideUp(subMenu);
				toggleAriaProps(el.target.parentElement.firstElementChild);
			});
		}
	}
}
/****************************************
 * SlideUp, SlideDown and SlideToggle Functions
 *
 * Convert from jQuery to vanilla JS
 * @see https://dev.to/bmsvieira/vanilla-js-slidedown-up-4dkn
 *
 */

/**
 * @function slideUp
 *
 * @param {*} target DOM-Element
 * @param {number} duration default 650ms
 */
let slideUp = (target, duration = 650) => {
	target.style.transitionProperty = 'height, margin, padding';
	target.style.transitionDuration = duration + 'ms';
	target.style.transitionTimingFunction = 'ease-out';
	// target.style.boxSizing = "border-box";
	target.style.height = target.offsetHeight + 'px';
	target.offsetHeight;
	target.style.overflow = 'hidden';
	target.style.height = 0;
	target.style.paddingTop = 0;
	target.style.paddingBottom = 0;
	target.style.marginTop = 0;
	target.style.marginBottom = 0;
	window.setTimeout(() => {
		target.style.display = 'none';
		target.style.removeProperty('height');
		target.style.removeProperty('padding-top');
		target.style.removeProperty('padding-bottom');
		target.style.removeProperty('margin-top');
		target.style.removeProperty('margin-bottom');
		target.style.removeProperty('overflow');
		target.style.removeProperty('transition-duration');
		target.style.removeProperty('transition-property');
		target.style.removeProperty('transition-timing-function');
		//alert("!");
	}, duration);
};

/**
 * @function slideDown
 *
 * @param {*} target DOM-Element
 * @param {number} duration default 650ms
 */
let slideDown = (target, duration = 650) => {
	target.style.removeProperty('display');
	let display = window.getComputedStyle(target).display;
	if (display === 'none') display = 'block';
	target.style.display = display;
	let height = target.offsetHeight;
	target.style.overflow = 'hidden';
	target.style.height = 0;
	target.style.paddingTop = 0;
	target.style.paddingBottom = 0;
	target.style.marginTop = 0;
	target.style.marginBottom = 0;
	target.offsetHeight;
	// target.style.boxSizing = "border-box";
	target.style.transitionProperty = 'height, margin, padding';
	target.style.transitionDuration = duration + 'ms';
	target.style.transitionTimingFunction = 'ease-out';
	target.style.height = height + 'px';
	target.style.removeProperty('padding-top');
	target.style.removeProperty('padding-bottom');
	target.style.removeProperty('margin-top');
	target.style.removeProperty('margin-bottom');
	window.setTimeout(() => {
		target.style.removeProperty('height');
		target.style.removeProperty('overflow');
		target.style.removeProperty('transition-duration');
		target.style.removeProperty('transition-property');
		target.style.removeProperty('transition-timing-function');
	}, duration);
};

/**
 * @function slideToggle
 *
 * @param {*} target DOM-Element
 * @param {number} duration default 650ms
 */
var slideToggle = (target, duration = 650) => {
	if (window.getComputedStyle(target).display === 'none') {
		return slideDown(target, duration);
	} else {
		return slideUp(target, duration);
	}
};
