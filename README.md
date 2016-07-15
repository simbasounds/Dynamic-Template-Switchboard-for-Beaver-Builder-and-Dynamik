# Dynamic Template Switchboard for Beaver Builder
A custom Beaver Builder module for inserting dynamic content generated by WordPress templates (eg. single.php, archive.php) via php hook into Beaver Builder layout templates.

Currently the template example given in [the Gist](https://gist.github.com/simbasounds/4fdff6f2cb47529a15c962fb9a977c9c) is tweaked for use with the Dynamik Website Builder (which in turn requires Genesis), but in essence template files can be constructed around [this example](https://gist.github.com/simbasounds/63b616a0ba229c0bcea4b403f9bf3b6d).

---
##Explanation
###The Requirement
Beaver Builder can greatly speed up building a website, but out of the box it's always been impossible to use those layouts for WordPress dynamically generate pages - archives (categories, tags, custom taxonomy archives), posts, custom post types.

This means that WordPress templates have to be built and styled seperately, replicating the work already performed on the Beaver Builder templates. Ultimately it would have been quicker not to use Beaver Builder at all.


###The Solution
The solution is achieved using a combination of a minor template modification, and a WordPress plugin which adds a custom module to the Advanced Modules section of Beaver Builder.

**The Module**
The Beaver Builder module **Dynamic Template Switchboard** is dropped into a Beaver Builder layout template where the dynamically generated content should appear.

**The Template**
WordPress template files are manually created or modified to:
<ul>
<li>Isolate the main loop.</li>
<li>Identify the specific Beaver Builder template that should be used for every generated instance.</li>
</ul>

---
##Instructions
1. Install the plugin (requires Beaver Builder).
2. Create a Beaver Builder template.
3. Use the **Dynamic Template Switchboard** module (in Advanced Modules) where you want your content to appear.
4. [Find](https://www.competethemes.com/blog/find-page-id), and take note of the ID of the Beaver Builder template.
5. Modify your WordPress template files, or create one using the [example template Gist for Dynamik](https://gist.github.com/simbasounds/4fdff6f2cb47529a15c962fb9a977c9c), or the [generic WordPress barebones version](https://gist.github.com/simbasounds/63b616a0ba229c0bcea4b403f9bf3b6d). In short, the template's loop should be attached to the `fl_dynamic_switchboard` hook.</li>
6. In your template, use the Beaver Builder layout template ID as indicated in the example Gist.

```php
<?php

add_action('fl_dynamic_switchboard', 'my_template_code');
function my_template_code() {
	/* Your template loop code here */
}

add_action('fldts_fl_template','fldts_get_fl_template');
function fldts_get_fl_template() {
	FLBuilder::render_query( array(
		'post_type' => 'fl-builder-template',
		'p'         => 1234 /* Your BB Template ID here */
	) );
}

get_header();
do_action( 'fldts_fl_template' );
get_footer();
```

