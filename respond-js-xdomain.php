<?php 
/*
Plugin Name: TOZ Respond.js CrossDomain
Plugin URI: http://thinkonezero.com
Description: Easy setup for cross domain (CDN/Subdomain) use of respond.js for responsive design with IE8 and older browsers.
Author: A. Kai Armstrong
Version: 1.0
Author URI: http://kaiarmstrong.com
*/

if ( @include_once('respond-js-xdomain-base.php') ) {
	add_action('wp_head','toz_rjsxd_header');
	add_action('wp_footer','toz_rjsxd_footer', 999);
}

/********** WordPress Administrative ********/

function toz_rjsxd_activate() {
	add_option('toz_rjsxd_external_domain', get_option('siteurl'));
}
register_activation_hook( __FILE__, 'toz_rjsxd_activate');

/********** WordPress Interface ********/
add_action('admin_menu', 'toz_rjsxd_admin_menu');

function toz_rjsxd_admin_menu() {
	add_options_page('RespondJS XDomain', 'RespondJS XDomain', 8, __FILE__, 'toz_rjsxd_options');
}

function toz_rjsxd_options() {
	if ( isset($_POST['action']) && ( $_POST['action'] == 'update_toz_rjsxd' )){
		update_option('toz_rjsxd_external_domain', $_POST['toz_rjsxd_external_domain']);
	}
	$example_external_domain = str_replace('http://', 'http://cdn.', str_replace('www.', '', get_option('siteurl')));

	?><div class="wrap">
		<h2>Respond.js XDomain</h2>
		<p>With the trend towards responsive design, it's important to compensate for older browsers. <a href="https://github.com/scottjehl/Respond"></a>Respond.js</a> does this, however if you're serving your CSS from a CDN you'll run into problems with it not working. This plugin provides easily sets up the necessary pieces for it to work cross domain.</p>
		<p><form method="post" action="">
		<table class="form-table"><tbod>
			<tr valign="top">
				<th scope="row"><label for="toz_rjsxd_external_domain">EXTERNAL DOMAIN</label></th>
				<td>
					<input type="text" name="toz_rjsxd_external_domain" value="<?php echo(get_option('toz_rjsxd_external_domain')); ?>" size="64" class="regular-text code" />
					<span class="description">The base URL of your CDN or subdomain where your css is served from. <?php echo(get_option('siteurl')); ?> for rewriting. No trailing <code>/</code> please. E.g. <code><?php echo($example_external_domain); ?></code>.</span>
				</td>
			</tr>
		</tbody></table>
		<input type="hidden" name="action" value="update_toz_rjsxd" />
		<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
		</form></p>
	</div><?php
}