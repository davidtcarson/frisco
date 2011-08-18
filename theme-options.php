<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
add_action( 'admin_bar_menu', 'theme_options_nav' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'frisco_options', 'frisco_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'friscotheme' ), __( 'Theme Options', 'friscotheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}


function theme_options_nav() {
 global $wp_admin_bar;
 $wp_admin_bar->add_menu( array(
 'parent' => 'appearance',
 'id' => 'theme-options',
 'title' => 'Theme Options',
 'href' => admin_url('themes.php?page=theme_options')
 ) );
}


/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'default' => array(
		'value' =>	'default',
		'label' => __( 'Default', 'friscotheme' )
	),
	'green' => array(
		'value' =>	'green',
		'label' => __( 'Green', 'friscotheme' )
	),
	'orange' => array(
		'value' => 'orange',
		'label' => __( 'Orange', 'friscotheme' )
	),
	'yellow' => array(
		'value' => 'yellow',
		'label' => __( 'Yellow', 'friscotheme' )
	),
	'grey' => array(
		'value' => 'grey',
		'label' => __( 'Grey', 'friscotheme' )
	),
	'purple' => array(
		'value' => 'purple',
		'label' => __( 'Purple', 'friscotheme' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'friscotheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'friscotheme' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'friscotheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'friscotheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'friscotheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'frisco_options' ); ?>
			<?php $options = get_option( 'frisco_theme_options' ); ?>

			<table class="form-table">

			
			
				<?php
				/**
				 * Color Choices
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Select Theme Color', 'friscotheme' ); ?></th>
					<td>
						<select name="frisco_theme_options[themecolor]">
							<?php
								$selected = $options['themecolor'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="frisco_theme_options[themecolor]"><?php _e( 'Only a few color choices at the moment.', 'friscotheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample checkbox option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Custom Stylesheet', 'friscotheme' ); ?></th>
					<td>
						<input id="frisco_theme_options[customcss]" name="frisco_theme_options[customcss]" type="checkbox" value="1" <?php checked( '1', $options['customcss'] ); ?> />
						<label class="description" for="frisco_theme_options[customcss]"><?php _e( 'Check this box to use a custom stylesheet. Put custom.css in the main theme directory.', 'friscotheme' ); ?></label>
					</td>
				</tr>


			
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'friscotheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['customcss'] ) )
		$input['customcss'] = null;
	$input['customcss'] = ( $input['customcss'] == 1 ? 1 : 0 );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/