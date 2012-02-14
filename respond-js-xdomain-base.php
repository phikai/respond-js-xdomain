<?php
/**
 * Where all the magic happens to set the crossdomain stuff up for you.
 */

function toz_rjsxd_header(){ ?>
	<link href="<?php echo str_replace( home_url(), get_option('toz_rjsxd_external_domain'), plugin_dir_url(__FILE__)); ?>cross-domain/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
<?php }

function toz_rjsxd_footer(){ ?>
	<link href="<?php echo str_replace( home_url(), '', plugin_dir_url(__FILE__)); ?>cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
	<script type="text/javascript" src="<?php echo str_replace( home_url(), '', plugin_dir_url(__FILE__)); ?>cross-domain/respond.proxy.js"></script>
<?php }
?>