#WP Boilerplate

This is a simple theme setup that I'll use as a boilerplate for any standard
Wordpress projects.

It aims to help a Wordpress developer deal with separation of concerns, as well
as enforcing a stricter layout for assets/files.

As you probably know, Wordpress encourages a lot of bad behaviours when it comes
to structuring your themes. For example, it says to put all your styles in a
single style.css file in the root of the theme when we all know it's better to
have a proper asset directory structure and to use SASS/Less/Stylus if we are
feeling adventurous!

##Overview

* Base files containing the bare minimum markup to reduce deletions
* A simple, consistant folder structure for assets.
* Node Package Manager for any dependency management.
* Gulp for handling:
    * SASS to CSS concantination/minification.
    * JS concantination/minification.
    * Image optimisation.
* Plugins managed through composer. By default I include:
    * [Advanced Custom Fields](https://github.com/elliotcondon/acf)
    * [Duplicate Post](https://wordpress.org/plugins/duplicate-post/)
    * [Regenerate Thumbnails](http://wordpress.org/plugins/regenerate-thumbnails/)
    * [Bulk Creator](http://wordpress.org/plugins/bulk-creator)

##Structure

The theme has the following structure:

```
.
├── assets
│   ├── img
│   ├── js
│   │   ├── src
│   │   │   ├── main.js
│   │   │   └── ...
│   │   └── vendor
│   │       └── ...
│   └── styles
│       ├── jeet
│       │   ├── _functions.scss
│       │   ├── _grid.scss
│       │   └── _settings.scss
│       ├── mixins
│       │   ├── _breakpoints.scss
│       │   ├── _helpers.scss
│       │   └── _font-awesome.scss
│       ├── partials
│       │   ├── _footer.scss
│       │   ├── _header.scss
│       │   ├── _home.scss
│       │   ├── _layout.scss
│       │   ├── _reset.scss
│       │   ├── _sidebar.scss
│       │   └── _typography.scss
│       ├── placeholders
│       │   ├── _buttons.scss
│       │   ├── _clearfix.scss
│       │   ├── _forms.scss
│       │   ├── _layout.scss
│       │   └── _typography.scss
│       ├── vars
│       │   ├── _colors.scss
│       │   ├── _misc.scss
│       │   └── _typography.scss
│       ├── vendor
│       │   └── ...
│       └── main.scss
├── inc
├── lib
│   ├── _config.php
│   ├── bodyClasses.php
│   ├── helpers.php
│   └── wpSpecific.php
├── public
│   ├── js
│   │   └── main.min.js
│   └── styles
│       └── main.css
├── 404.php
├── README.md
├── composer.json
├── composer.lock
├── config.rb
├── footer.php
├── front-page.php
├── functions.php
├── gulpfile.js
├── header.php
├── index.php
├── package.json
├── page.php
├── sidebar.php
├── single.php
└── style.css
```

##To do

* Finish v2.0 which will feature a proper object orientated way of managing
  things like post-types and meta fields.
* Improve the documentation by adding an in-depth Wiki.
