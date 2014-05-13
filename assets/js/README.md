#/assets/js

This the is the directory for any JS files. All files will get concantinated
minified into one single file: `functions.min.js`.

##/src

This is where all of the bespoke & project specific JS files should go. Split the
code into files with specific responsibilities, with their own namespace.

##/vendor

Any third party libraries not managed through Bower should go here, and get
concantinated into `functions.min.js`.