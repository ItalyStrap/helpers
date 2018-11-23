# ItalyStrap Helpers

[![License](https://poser.pugx.org/italystrap/helpers/license)](https://packagist.org/packages/italystrap/helpers)
[![Latest Stable Version](https://poser.pugx.org/italystrap/helpers/v/stable)](https://packagist.org/packages/italystrap/helpers)


Breadcrumbs Class API for WordPress

This package create an HTML or Json Breadcrumbs elements to display on your WordPress site

## Installation

### Install with Composer

Add the package to your projects `composer.json` file. Visit [getcomposer.org](http://getcomposer.org/) more information.


```shell
composer require illuminated/helper-functions
```

or

```json
{
    "require": {
        "italystrap/breadcrumbs": "dev-master"
    }
}
```

### Install Manually

Download and include the class file into your theme/plugin:

```php
include_once 'path/to/ItalyStrap/Breadcrumbs.php';
```

## Available functions

* [HTML](#html)
	* [get_attr](#array_except_value)

## HTML

### `ItalyStrap\HTML\get_attr()`

Build list of attributes into a string and apply contextual filter on string:

```php

$attr = [
	'id'	=> 'unique_id',
	'class'	=> 'some_class',
];

$output = get_attr( $context, $attr, false );

// id="unique_id" class="some_class"

printf(
	'<span%s>Title</span>',
	$output
);
```

or

```html
<span<?php get_attr( $context, $attr, true ) ?>>Title</span>
```

```php
// <span id="unique_id" class="some_class">Title</span>
```

## Notes

*  Licensed under the [GNU General Public License v2.0](https://github.com/ItalyStrap/breadcrumbs/blob/master/LICENSE)
*  Maintained under the [Semantic Versioning Guide](http://semver.org)

## Author

**Enea Overclokk**
*  [https://italystrap.com/](https://italystrap.com/)
