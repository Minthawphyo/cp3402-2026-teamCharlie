<?php
/**
 * 404 error page.
 *
 * @package Charlies_Coffee
 */

get_header();

$menu_url    = charlies_coffee_page_url( 'menu', '/menu/' );
$contact_url = charlies_coffee_page_url( 'contact', '/contact/' );
?>

<section class="page-hero grain-bg">
	<div class="container" style="text-align:center;">
		<p class="eyebrow">404</p>
		<h1 class="display" style="margin-top:1.5rem;">
			Looks like this <span class="em">cup&rsquo;s</span> empty.
		</h1>
		<p class="lead" style="margin:2rem auto 0;max-width:32rem;">
			<?php esc_html_e( 'We couldn’t find the page you were looking for. Maybe it moved, or maybe it never existed — either way, let’s get you back somewhere good.', 'charlies-coffee' ); ?>
		</p>
		<div class="hero-actions" style="justify-content:center;">
			<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'charlies-coffee' ); ?></a>
			<a class="btn btn-ghost" href="<?php echo esc_url( $menu_url ); ?>"><?php esc_html_e( 'View the menu', 'charlies-coffee' ); ?></a>
			<a class="btn btn-ghost" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Find us', 'charlies-coffee' ); ?></a>
		</div>
	</div>
</section>

<?php
get_footer();
