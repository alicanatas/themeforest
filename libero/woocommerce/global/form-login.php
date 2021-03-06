<?php
/**
 * Login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form method="post" class="login" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php if ( $message ) echo wpautop( wptexturize( $message ) ); ?>
	<div class="mkd-woo-form-row">
		<p class="form-row form-row-first">
			<input type="text" placeholder="<?php _e( 'Username or email', 'libero' ); ?>" class="input-text" name="username" id="username" />
		</p>
		<p class="form-row form-row-last">
			<input class="input-text" placeholder="<?php _e( 'Password', 'libero' ); ?>" type="password" name="password" id="password" />
		</p>	
		<p class="lost_password">
			<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'libero' ); ?></a>
		</p>
	</div>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form' ); ?>

	<p class="form-row">
		<?php wp_nonce_field( 'woocommerce-login' ); ?>
		<input type="submit" class="button" name="login" value="<?php esc_attr_e( 'Login', 'libero' ); ?>" />
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
		<label for="rememberme" class="inline">
			<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'libero' ); ?>
		</label>
	</p>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
