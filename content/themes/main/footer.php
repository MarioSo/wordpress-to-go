	</div><!-- END .page -->

	<script src="<?php echo(get_template_directory_uri()); ?>/static/js/main.js"></script>
	<?php wp_footer(); ?>
	<?php //$js = Javascript::getInstance()->printJS(); ?>

	<?php if(WP_LOCAL_DEV) { ?>
<script type='text/javascript' id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.2.7.6.js'><\/script>".replace("HOST", location.hostname));
//]]></script>
	<?php } ?>
</body>
</html>
