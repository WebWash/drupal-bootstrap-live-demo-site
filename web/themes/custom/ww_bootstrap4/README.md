# Bootstrap 4 subtheme

## Instructions

### Create subtheme by following these steps:

* Copy `_SUBTHEME` folder to the location of custom folder
* Rename `SUBTHEME` instances to your theme, e.g.  if your theme called `b4theme`:
  * Rename `SUBTHEME.info` to `b4theme.info.yml` and its content
  * Rename `SUBTHEME.libraries.yml` to `b4theme.libraries.yml`
  * Rename `SUBTHEME.theme` to `b4theme.theme` and its comments
* Update import path in `SUBTHEME/scss/style.scss` to Bootstrap 4 theme path 
    `@import "[DOCROOT]/themes/contrib/bootstrap4/scss/style";`, 
     eg replace [DOCROOT] with the relative path to your docroot.
     Final should look like `@import "../../../../../../themes/contrib/bootstrap4/scss/style";`.
* (Optional) Copy `style-guide` folder to your subtheme. The link will be available on `Manage theme` screen.

### Tools

You may setup your front end development workflow with npm/yarn by creating package.json and adding scripts to speed up development:

* Use [compiler](https://sass-lang.com/install) to compile SCSS to CSS.
* Use `eslint` and `sass-lint` to lint-check your SCSS and JS
* Use `browser-sync` to auto-reload pages when specified files have been updated (eg updates to js/css/twig)
* Use `lighthouse` to automatically test your colour pallet for accessibility issues (npm v8+ only)
