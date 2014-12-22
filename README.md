Wordpress Dummy Info
---------------------

## Configuration
- Provide a wp-local-config.php file for local development

## Project Structure

mbi-theme
|
-- *.php
-- assets
		|
		-- conf
				|
				-- scripts.json
		-- src
				|
				-- js
				-- styles
		-- build (generated)


## Styleguides SCSS
### scss selectors
- List @extend(s) First
- List "Regular" Styles Next
- List @include(s) Next
- Nested Selectors Last
- Maximum Nesting: Three Levels Deep !!!

### naming
- Variablize All Colors

### misc
- _shame.scss last
- do not commit .css files




folder


content
	- mu-plugins
	- plugins
	- themes
		- main
			- includes
				- wp-base (git repo)
					- themesetup.class.php
				- projectspecific.class.php


			- assets
				- components
					- common (default web compontens, git-repo)
					- wc-projectspecific.php


				- styles
					- baseCss
					-


				- scripts


				- gfxSrc (spritemaps, svgs)


			- build
				- scripts
				- styles
			- gfx
			- style.css (blank)
			- index.php
			- page.php
			- ...
	- uploads
