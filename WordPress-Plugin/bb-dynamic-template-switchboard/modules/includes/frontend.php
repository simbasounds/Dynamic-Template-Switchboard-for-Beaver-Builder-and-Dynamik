<?php

global $wp_the_query;
$fldts_post_type = get_post_type( $wp_the_query->post->ID );

/* Check if we're using the page builder to edit a template */
if(FLBuilderModel::is_builder_active() || $fldts_post_type == "fl-builder-template") { ?>
	<div class="fldts-active-message">
		<h3>Dynamic Template Switchboard</h3>
		<?php if (FLBuilderModel::is_builder_active()) { ?>
			<p>Your content will appear in this area on your website's public pages. It will not be displayed while editing a Beaver Builder Template. If you haven't set up a WordPress template to link to this Beaver Builder template yet, you can do so now.</p>
			<ol>
				<li>Take note of the ID of this template.</li>
				<li>Create a WordPress template using the example structure on the front end of this template.</li>
				<li>In your template, use this template ID where indicated in the example.</li>
			</ol>
		<?php } else { ?>
			<p>Your content will appear in this area on your website's public pages. It will not be displayed while viewing the front end of a Beaver Builder Template. If you haven't set up a WordPress template to link to this Beaver Builder template yet, you can do so now.</p>
			<ol>
				<li>Take note of the ID of this template.</li>
				<li>Create a WordPress template using the example structure below.</li>
				<li>In your template, use this template ID where indicated in the example.</li>
			</ol>
			<script src="https://gist.github.com/simbasounds/4fdff6f2cb47529a15c962fb9a977c9c.js"></script>
		<?php } ?>
	</div>
<?php } else {
	do_action('fl_dynamic_switchboard');
}
