#WP Boilerplate
###by Jake Cleary

This is a simple theme setup that I'll use as a boilerplate for any standard
Wordpress projects.

##Overview

* Base files containing the bare minimum markup to reduce deletions
* A simple, consistant folder structure for assets
* A `package.json` for any development dependency management
* A `bower.json` files for managing front-end dependencies
* A `gulpfile.js` for handling:
    * SASS to CSS concantination/minification
    * JS concantination/minification
    * Image optimisation
* A few of plugins that are present in any of my WP projects, such as:
    * [Advanced Custom Fields](https://github.com/elliotcondon/acf)
    * [Duplicate Post](https://wordpress.org/plugins/duplicate-post/)
    * [Regenerate Thumbnails](http://wordpress.org/plugins/regenerate-thumbnails/)

##Structure

The theme has the following structure (simplified for presentational purposes):

```
.
├── assets
│   ├── img
│   ├── js
│   │   ├── src
│   │   │   └── main.js
│   │   └── vendor
│   └── styles
│       ├── modules
│       │   └── ...
│       ├── partials
│       │   └── ...
│       ├── vendor
│       │   └── ...
│       └── main.sass
├── inc
│   └── ...
├── lib
│   ├── helpers.php
│   └── wpSpecific.php
├── public
│   └── ...
├── 404.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── sidebar.php
├── single.php
└── style.css
```