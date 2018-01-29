# HIKO
HIKO is a digital publishing platform for Victoria University of Wellington.

HIKO runs on a custom Wordpress setup, comprised primarily of a theme and a number of plugins.

The theme is built on top of [JointsWP](http://jointswp.com/), which uses the [Foundation 6](https://foundation.zurb.com/) front-end framework. Foundation’s grid system was used prominently throughout the site.

The plugins used by the site include:
* [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) - for custom metadata fields and relationships
* [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/) - for multiple post authors
* [Custom Post Type UI](https://wordpress.org/plugins/custom-post-type-ui/) - for custom post types
* [Edit Flow](https://wordpress.org/plugins/edit-flow/) - for internal post comments and user groupings
* [Jetpack Markdown](https://wordpress.org/plugins/jetpack-markdown/) - to enable authorship using markdown

The custom backend for the site uses JavaScript and jQuery for various DOM manipulation requirements - please make sure your uses have JS enabled on their browsers for best performance.

Accessibility testing conducted using the [aXe](https://www.axe-core.org/) accessibility engine.

## Wordpress Settings
The following settings need to be applied for HIKO to look correctly:

### Menus
(in *Appearance/Menus*):
  * **Main** menu should contain only the following pages:
    * Blog
    * Projects
    * Series

  * **Footer** menu should contain:
    * Terms
    * About
    * Contact
    Footer menu’s *display location* should also be set to *‘Footer links’*

### Home
(in *Settings/Reading*):
* Home page displays, homepage setting should be set to ‘Home’
