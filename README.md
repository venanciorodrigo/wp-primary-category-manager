# Wordpress - Primary Category Manager

![Image](https://cdn-images-1.medium.com/max/2000/1*Fwqye_SrYsLjkxE5ilTHfw.jpeg)

Gives you the ability to set a primary category on your posts.

## How to install?

Simple clone or download this repo and put it on your Wordpress `/plugins` folder, then you can activate on `WP-ADMIN`.

## How to use?

Set a primary category on your post:

![Image](https://duaw26jehqd4r.cloudfront.net/items/3Z3R3a0S0A0W2H1c160W/Screen%20Recording%202018-10-20%20at%2008.04%20pm.gif)

Just write the following shortcode on your post:
* By ID - `[pcm category-id='{id}']`
* By Slug Name - `[pcm category-name='{slug}']`

If you wish to use it on your theme:
* `<?php echo do_shortcode("[pcm category-id='{id}']"); ?>`

If you wish to implement your own template to render the post list, just include the following file on your theme folder:
* `pcm_primary_category/post-list.php`

Also the plugin provide a new field on the WP-API called `pcm_primary_category` for every post that you set the primary category.

## Hooks

* `pcm_before_list` - Implement code before the post list appears
* `pcm_before_item` - Implement code before the item on the list appears
* `pcm_before_link` - Implement code before the post link appears
* `pcm_after_link` - Implement code after the post link appears
* `pcm_after_item` - Implement code after the item on the list appears
* `pcm_after_list` - Implement code after the post list appears

## Dependencies

* [NPM](https://www.npmjs.com/get-npm)
* [Composer](https://getcomposer.org/)
* [Grunt](https://gruntjs.com/)
* [Gulp](https://gulpjs.com/)

## Author

* **Rodrigo Venancio** - http://rodrigovenancio.info/