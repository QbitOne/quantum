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
-   `npm run compile:css` :
-   `npm run compile:js` :
-   `npm run serve` :
-   `npm run lint:css` : checks all CSS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
-   `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
-   `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.
