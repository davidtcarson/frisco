<?php

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
     * LessCSS for easy color changes.  
     */
add_action('wp_print_styles', 'add_lesscss');
function add_lesscss() {

	wp_register_style('lesscss', get_bloginfo('stylesheet_directory') . '/css/styles.less');
	wp_enqueue_style( 'lesscss');
}

add_action('init', 'add_lesscssjs');
function add_lesscssjs() {
    wp_register_script( 'lesscssjs', get_bloginfo('stylesheet_directory') . '/js/less-1.1.3.min.js');
    wp_enqueue_script( 'lesscssjs' );

}    

// add rel="stylesheet/less" to any less stylesheet url
// from http://plugins.svn.wordpress.org/template-provisioning/tags/0.2.5/template-provisioning.php
add_filter('style_loader_tag', 'filter_style_link_tags_for_less_js', 10, 2);
function filter_style_link_tags_for_less_js($tag, $handle)
	{
  	global $wp_styles;
  	
  	// if the src ends in ".less", the rel attribute should be "stylesheet/less"
  	if (preg_match("/\.less$/", $wp_styles->registered[$handle]->src)) {
  	  $tag = preg_replace("/rel=(['\"])[^'\"]*(['\"])/", "rel=$1stylesheet/less$2", $tag);
  	}
  	
	  return $tag;
	}

// Batten down the hatches, we're going full-width... there's got to be a better way to make the theme full-width, but this will work in the meantime. Everything below is just inserting divs to help style a full-width background. 
function div_bp_before_header() {
	?>
		<div id="bp_before_header" class="fullwidth">
	<?php 
}
add_action ( 'bp_before_header', 'div_bp_before_header' );

// close the bp_before_header div
function div_bp_after_header() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_header', 'div_bp_after_header' );

// This could have gone in div_bp_after_header, but we might want to add something later.
function div_bp_before_container() {
	?>
		<div id="bp_before_container" class="fullwidth">
	<?php 
}
add_action ( 'bp_before_container', 'div_bp_before_container' );

// close the bp_before_container div
function div_bp_after_container() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_container', 'div_bp_after_container' );

// Batten down the hatches, we're going full-width
function div_bp_before_footer() {
	?>
		<div id="bp_before_footer" class="fullwidth">
	<?php 
}
add_action ( 'bp_before_footer', 'div_bp_before_footer' );

// close the bp_before_footer div
function div_bp_after_footer() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_footer', 'div_bp_after_footer' );


// Batten down the hatches, we're going full-width
function div_bp_before_activity_post_form() {
	?>
		<div id="bp_before_activity_post_form">
	<?php 
}
add_action ( 'bp_before_activity_post_form', 'div_bp_before_activity_post_form' );

// close the bp_before_activity_post_form div
function div_bp_after_activity_post_form() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_activity_post_form', 'div_bp_after_activity_post_form' );

// Batten down the hatches, we're going full-width
function div_bp_before_member_header() {
	?>
		<div id="bp_before_member_header">
	<?php 
}
add_action ( 'bp_before_member_header', 'div_bp_before_member_header' );

// close the bp_before_member_header div
function div_bp_after_member_header() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_member_header', 'div_bp_after_member_header' );


// Batten down the hatches, we're going full-width
function div_bp_before_group_header() {
	?>
		<div id="bp_before_group_header">
	<?php 
}
add_action ( 'bp_before_group_header', 'div_bp_before_group_header' );

// close the bp_before_group_header div
function div_bp_after_group_header() {
	?>
		</div> 
	<?php
}
add_action ( 'bp_after_group_header', 'div_bp_after_group_header' );


// Temporary hack. The bp-default directory pages use the form inconsistently. Not a big deal, but Safari is having a bug of a time with the full width layout. 
function form_template_notices_group_and_member_directory() {

 if(bp_is_directory())
   {
	?>
		</form>
	<?php 
	}
}
add_action ( 'template_notices', 'form_template_notices_group_and_member_directory' );

// see above... same issue. Temporary function. 
function form_bp_directory_groups_content() {
	?>
		<form style="display: none;"> 
	<?php
}
add_action ( 'bp_directory_groups_content', 'form_bp_directory_groups_content' );

// see above... same issue. Temporary function. 
function form_bp_directory_members_content() {
	?>
		<form style="display: none;"> 
	<?php
}
add_action ( 'bp_directory_members_content', 'form_bp_directory_members_content' );

// Adds theme credit in footer.php. Delete it if you'd like.  
function add_bp_dtheme_credits() {
	?>
		<p><?php printf( __( 'Made with a little help from the <a href="%1$s">Frisco Theme</a>.', 'buddypress' ), 'http://friscotheme.com' ) ?></p>
	<?php
}
add_action ( 'bp_dtheme_credits', 'add_bp_dtheme_credits' );


?>