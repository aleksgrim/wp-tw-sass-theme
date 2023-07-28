<?php

add_action('wp_enqueue_scripts', function() {

	// Styles
	if (WP_MODE === 'prod') {
		wp_enqueue_style('styles', get_template_directory_uri() . '/dist/styles/styles.min.css?v=' . uniqid());
	} else {
		wp_enqueue_style('tw-styles', get_template_directory_uri() . '/dist/styles/tw.css?v=' . uniqid());
		wp_enqueue_style('g-styles', get_template_directory_uri() . '/dist/styles/styles.css?v=' . uniqid());
	}

	// Remove Gutenberg and other styles
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-block-style');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('classic-theme-styles');
	wp_deregister_style('poka-review-vendor');
    wp_deregister_style('poka-review-main');
    wp_deregister_style('contact-form-7');
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'core-block-supports' );

	// Remove jQuery
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_deregister_script('wp-embed');
	}

	// Main scripts
	wp_enqueue_script('scripts', get_template_directory_uri() . '/dist/js/scripts.min.js?v=' . uniqid(), [], '', true);
	

    // Ajax
	wp_localize_script('scripts', 'ajax',
		array(
			'url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('myajax-nonce')
		)
	);
});
