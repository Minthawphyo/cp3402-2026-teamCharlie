<?php
/**
 * Template Name: Menu
 * Brochure menu page — same design as the React Menu view.
 *
 * @package Charlies_Coffee
 */

get_header();

$categories  = charlies_coffee_get_menu_categories();
$contact_url = charlies_coffee_page_url( 'contact', '/contact/' );
$about_url   = charlies_coffee_page_url( 'about', '/about/' );
?>

<section class="page-hero grain-bg">
	<div class="container">
		<p class="eyebrow">The menu</p>
		<div class="page-hero-row">
			<h1 class="display">Everything we <br>pour, brew &amp; bake.</h1>
			<p class="lead">
				Prices are in SGD and include GST. Milk alternatives — oat, soy, almond —
				are always on the house. Ask a barista about today&rsquo;s single origin.
			</p>
		</div>
	</div>
</section>

<?php if ( empty( $categories ) ) : ?>
	<div class="container" style="padding:3rem 0 6rem;">
		<p class="lead">
			<?php esc_html_e( 'No menu items yet. Add them in WP Admin → Menu Items (and assign a Menu Category).', 'charlies-coffee' ); ?>
		</p>
	</div>
<?php else : ?>
<nav class="menu-tabs" aria-label="Menu categories">
	<div class="container menu-tabs-inner">
		<?php foreach ( $categories as $i => $c ) : ?>
			<a class="<?php echo 0 === $i ? 'is-active' : ''; ?>" href="#<?php echo esc_attr( $c['id'] ); ?>">
				<?php echo esc_html( $c['title'] ); ?>
			</a>
		<?php endforeach; ?>
	</div>
</nav>

<div class="container menu-sections">
	<?php foreach ( $categories as $idx => $cat ) : ?>
		<section class="menu-section" id="<?php echo esc_attr( $cat['id'] ); ?>">
			<div class="menu-spread <?php echo $idx % 2 === 1 ? 'is-flip' : ''; ?>">
				<div class="menu-media">
					<?php if ( ! empty( $cat['image'] ) ) : ?>
						<img
							src="<?php echo esc_url( $cat['image'] ); ?>"
							alt="<?php echo esc_attr( $cat['title'] . " at Charlie's Coffee" ); ?>"
							loading="lazy"
							width="640"
							height="800"
						>
					<?php endif; ?>
					<div class="menu-media-label">
						<p style="margin:0;font-size:0.625rem;letter-spacing:0.28em;text-transform:uppercase;opacity:.8;">Category</p>
						<p class="font-serif" style="margin:0;font-size:1.875rem;"><?php echo esc_html( $cat['title'] ); ?></p>
					</div>
				</div>

				<div class="menu-list">
					<p class="eyebrow"><?php echo esc_html( str_pad( (string) ( $idx + 1 ), 2, '0', STR_PAD_LEFT ) ); ?><?php echo $cat['tagline'] ? ' · ' . esc_html( $cat['tagline'] ) : ''; ?></p>
					<h2><?php echo esc_html( $cat['title'] ); ?></h2>
					<ul class="menu-items">
						<?php foreach ( $cat['items'] as $item ) : ?>
							<li>
								<div class="menu-row">
									<span class="menu-name"><?php echo esc_html( $item['name'] ); ?></span>
									<span class="menu-price"><?php echo $item['price'] !== '' ? 'S$' . esc_html( $item['price'] ) : ''; ?></span>
								</div>
								<?php if ( $item['desc'] ) : ?>
									<p class="menu-desc"><?php echo esc_html( $item['desc'] ); ?></p>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</section>
	<?php endforeach; ?>
</div>
<?php endif; ?>

<section>
	<div class="container" style="padding-bottom:6rem;">
		<div class="cta-band" style="background:var(--cream-200);color:var(--forest);">
			<div>
				<p class="eyebrow">Ready when you are</p>
				<h2 style="color:var(--forest);">Pop in — we&rsquo;ll save you the corner booth.</h2>
				<p style="color:var(--ink-muted);max-width:32rem;">
					Charlie&rsquo;s is a walk-in cafe. No online ordering (yet). Bring your
					laptop, bring a friend, or bring both.
				</p>
			</div>
			<div class="cta-actions">
				<a class="btn btn-primary" href="<?php echo esc_url( $contact_url ); ?>">Find us</a>
				<a class="btn btn-ghost" href="<?php echo esc_url( $about_url ); ?>">Our story →</a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
