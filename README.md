# QbitOne Quantum Theme

## Requirements

`Quantum` requires the following dependencies:

-   [Node.js](https://nodejs.org/)
-   [Composer](https://getcomposer.org/)

## Setup

To start using all the tools that come with `Quantum` you need to install the necessary Node.js and Composer dependencies:

```sh
$ composer install
$ npm install
```

### Available CLI commands

`Quantum` comes packed with CLI commands tailored for WordPress theme development :

-   `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).

-   `composer lint:php` : checks all PHP files for syntax errors.

-   `composer make-pot` : generates a .pot file in the `languages/` directory.

-   `npm run compile:css` : take `main.css` in the `style/` directory and generates a `style.css` and a `style.min.css` in the `assets/css/unminified/` and `assets/css/minified/` directory.

-   `npm run compile:js` : take all the js files in the `js/core/` directory and generates a `bundle.min.js` in the `js/` directory.

-   `npm run compile:js -- --foo` : take `foo.js` in the `js/custom/`directory and generates a `foo.min.js` in the `js/custom/minified/` directory.

-   `npm run serve` : creates a developement server using [browser-synch](https://browsersync.io).
    While running watches all .css files in `style/` and regenerates files in `assets/css/` on save.
    **NOTE: use `gulpfile.js line 95` for configuration. Set proxy according to your requirement.**

-   `npm run lint:css` : checks all CSS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).

-   `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).

-   `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.
