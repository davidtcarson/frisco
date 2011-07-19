<!-- No sidebar for you! -->
<?php do_action( 'bp_before_sidebar' ) ?>

	<?php do_action( 'bp_inside_before_sidebar' ) ?>

	<?php if ( is_user_logged_in() ) : ?>

		<?php do_action( 'bp_before_sidebar_me' ) ?>

		<?php do_action( 'bp_after_sidebar_me' ) ?>

	<?php else : ?>

		<?php do_action( 'bp_before_sidebar_login_form' ) ?>
	
		<?php do_action( 'bp_after_sidebar_login_form' ) ?>

	<?php endif; ?>

	<?php do_action( 'bp_inside_after_sidebar' ) ?>

<?php do_action( 'bp_after_sidebar' ) ?>
