/**
 * @description This script is for the site navigation of WP Quantum Theme
 * @version     0.1.0
 * @author      Michael Geyer
 *
 */

/**
 *  Get DOM elements created by template-parts/header
 *
 */

const siteNavigationToggle = document.querySelector(
  '.site-header__inner__mobile-btn #menu-toggle'
);
const burgerBtn = document.querySelector(
  '.site-header__inner__mobile-btn #burger-btn'
);
const siteNavigation = document.querySelector('.site-header__inner__nav');

/**
 *
 * @function    toggleAriaProps
 * @param       el - DOM element to toggle aria-expanded value
 * @description Toggle the value of aria-expaneded html attribute on a given DOM element
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
 * @function    toggleSiteNavigation
 * @description Trigger burger btn animation and show mobile menu.
 */
const toggleSiteNavigation = function () {
  burgerBtn.classList.toggle('mobile-menu-burger-btn--is-active');
  siteNavigation.classList.toggle('responsive');
  toggleAriaProps(siteNavigationToggle);
};

/**
 *  Eventlistener for site navigation
 */
siteNavigationToggle.addEventListener('click', toggleSiteNavigation);
