<?php
/**
 * Where all the magic happens to set the crossdomain stuff up for you.
 */

function toz_rjsxd_header(){ ?>
	<link href="<?php echo str_replace( home_url(), get_option('toz_rjsxd_external_domain'), plugin_dir_url(__FILE__)); ?>Respond/cross-domain/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
	<link href="<?php echo str_replace( home_url(), '', plugin_dir_url(__FILE__)); ?>Respond/cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
<?php }

function toz_rjsxd_footer(){ ?>
	<script type="text/javascript" src="<?php echo plugin_dir_url(__FILE__); ?>Respond/respond.min.js"></script>
	<script type="text/javascript" src="<?php echo str_replace( home_url(), '', plugin_dir_url(__FILE__)); ?>Respond/cross-domain/respond.proxy.js"></script>
<?php }
?>