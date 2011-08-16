<?php

// Load up our awesome theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );

	 /*
     * Google Font for cursive header title. This will change for sure to make it easier for users to change. 
     */
add_action('wp_print_styles', 'add_googlefonts');
function add_googlefonts() {
        $givemetypography = 'http://fonts.googleapis.com/css?family=Lobster+Two&v2';
       
            wp_register_style('googlewebfonts', $givemetypography);
            wp_enqueue_style( 'googlewebfonts');
}

// special thanks to Less Framework (http://lessframework.com/)
function go_responsive() {
	?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<?php 
}
add_action ( 'bp_head', 'go_responsive' );
		
function bp_dtheme_enqueue_styles() {
       //nothing to see here
}
add_action( 'wp_print_styles', 'bp_dtheme_enqueue_styles' );

    /*
     * New theme option.  
     */
add_action('wp_print_styles', 'add_colorcss');
function add_colorcss() {
	$options = get_option('frisco_theme_options');
    wp_register_style('colorcss', get_bloginfo('stylesheet_directory') . '/css/' . $options['selectinput'] . '.css');
	wp_enqueue_style( 'colorcss');
}


add_action('wp_print_styles', 'add_customcss');
function add_customcss() {
	$options = get_option('frisco_theme_options');
	
	if ( $options['customcss'] == 1 ) {
    // Load custom.css
	    wp_register_style('customcss', get_bloginfo('stylesheet_directory') . '/custom.css');
		wp_enqueue_style( 'customcss');
	} else {
    // Do nothing
	}

}
	
function bp_dtheme_setup() {
	global $bp;

	// Load the AJAX functions for the theme
	require( TEMPLATEPATH . '/_inc/ajax.php' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'buddypress' ),
	) );


	if ( !is_admin() ) {
		// Register buttons for the relevant component templates
		// Friends button
		if ( bp_is_active( 'friends' ) )
			add_action( 'bp_member_header_actions',    'bp_add_friend_button' );

		// Activity button
		if ( bp_is_active( 'activity' ) )
			add_action( 'bp_member_header_actions',    'bp_send_public_message_button' );

		// Messages button
		if ( bp_is_active( 'messages' ) )
			add_action( 'bp_member_header_actions',    'bp_send_private_message_button' );

		// Group buttons
		if ( bp_is_active( 'groups' ) ) {
			add_action( 'bp_group_header_actions',     'bp_group_join_button' );
			add_action( 'bp_group_header_actions',     'bp_group_new_topic_button' );
			add_action( 'bp_directory_groups_actions', 'bp_group_join_button' );
		}

		// Blog button
		if ( bp_is_active( 'blogs' ) )
			add_action( 'bp_directory_blogs_actions',  'bp_blogs_visit_blog_button' );
	}
}
add_action( 'after_setup_theme', 'bp_dtheme_setup' );


// Batten down the hatches, we're going full-width... there's got to be a better way to make the theme full-width, but this will work in the meantime. Everything below is just inserting divs to help style a full-width background. 
function div_bp_before_header() {
	?>
		<div id="bp-before-header" class="fullwidth">
	<?php 
}
add_action ( 'bp_before_header', 'div_bp_before_header' );

// close the bp-before-header div
function div_bp_after_header() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_header', 'div_bp_after_header' );

// This could have gone in div_bp_after_header, but we might want to add something later.
function div_bp_before_container() {
	?>
		<div id="bp-before-container" class="fullwidth">
	<?php 
}
add_action ( 'bp_before_container', 'div_bp_before_container' );

// close the bp-before-container div
function div_bp_after_container() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_container', 'div_bp_after_container' );

// Batten down the hatches, we're going full-width
function div_bp_before_footer() {
	?>
		<div id="bp-before-footer" class="fullwidth">
	<?php 
}
add_action ( 'bp_before_footer', 'div_bp_before_footer' );

// close the bp-before-footer div
function div_bp_after_footer() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_footer', 'div_bp_after_footer' );


// Batten down the hatches, we're going full-width
function div_bp_before_activity_post_form() {
	?>
		<div id="bp-before-activity-post-form">
	<?php 
}
add_action ( 'bp_before_activity_post_form', 'div_bp_before_activity_post_form' );

// close the bp-before-activity-post-form div
function div_bp_after_activity_post_form() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_activity_post_form', 'div_bp_after_activity_post_form' );

// Batten down the hatches, we're going full-width
function div_bp_before_member_header() {
	?>
		<div id="bp-before-member-header">
	<?php 
}
add_action ( 'bp_before_member_header', 'div_bp_before_member_header' );

// close the bp-before-member-header div
function div_bp_after_member_header() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_member_header', 'div_bp_after_member_header' );


// Batten down the hatches, we're going full-width
function div_bp_before_group_header() {
	?>
		<div id="bp-before-group-header">
	<?php 
}
add_action ( 'bp_before_group_header', 'div_bp_before_group_header' );

// close the bp-before-group-header div
function div_bp_after_group_header() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_group_header', 'div_bp_after_group_header' );

//site credits
add_filter('gettext', 'sitecredits', 20, 3);
/**
 * Edit the default credits to add Frisco link. Remove if you'd like. 
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function sitecredits( $translated_text, $untranslated_text, $domain ) {

    $custom_field_text = 'Proudly powered by <a href="%1$s">WordPress</a> and <a href="%2$s">BuddyPress</a>.';

    if ( $untranslated_text === $custom_field_text ) {
        return 'Proudly powered by <a href="http://wordpress.org">WordPress</a>, <a href="http://buddypress.org">BuddyPress</a> and the <a href="http://friscotheme.com/">Frisco Theme</a>.';
    }

    return $translated_text;
}

?>