# DWP-Wordpress
Digital publishing platform for Victoria University of Wellington. Built on top of Wordpress

DWP runs on a custom Wordpress setup, comprised primarily of a theme and a number of plugins.

The theme is built on top of [JoitnsWP](http://jointswp.com/), which uses the [Foundation 6](https://foundation.zurb.com/) frontend framework. Foundation’s grid system was used prominently throughout the site.

The plugins used by the site include:
* [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) - for custom metadata fields and relationships
* [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/) - for multiple post authors
* [Custom Post Type UI](https://wordpress.org/plugins/custom-post-type-ui/) - for custom post types
* [Jetpack Markdown](https://wordpress.org/plugins/jetpack-markdown/) - to enable authorship using markdown

The custom backend for the site uses JavaScript and jQuery for various DOM manipulation requirements - please make sure your uses have JS enabled on their browsers for best performance.
