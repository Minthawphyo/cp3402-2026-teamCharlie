<?php
/**
 * Front page template — Home
 *
 * @package Charlies_Coffee
 */

get_header();

$menu_url    = charlies_coffee_page_url( 'menu', '/menu/' );
$contact_url = charlies_coffee_page_url( 'contact', '/contact/' );
$categories  = charlies_coffee_get_menu_categories();
$featured    = charlies_coffee_get_featured_items( 3 );
?>

<section class="grain-bg">
	<div class="container hero">
		<div>
			<p class="eyebrow">Est. on the corner · Townsville</p>
			<h1 class="display" style="margin-top:1.5rem;">
				Coffee worth <br>
				<span class="em">walking</span> for.
			</h1>
			<p class="lead" style="margin-top:2rem;">
				Charlie&rsquo;s is a small-batch cafe for students, locals and everyone
				in between. Slow-brewed drinks, honest pastries, and a corner
				booth with your name on it.
			</p>
			<div class="hero-actions">
				<a class="btn btn-primary" href="<?php echo esc_url( $menu_url ); ?>">View the menu →</a>
				<a class="btn btn-ghost" href="<?php echo esc_url( $contact_url ); ?>">Find us</a>
			</div>
			<div class="hero-meta">
				<span class="hours-widget" data-hours-widget></span>
				<span>Rotating single origin every fortnight</span>
			</div>
		</div>

		<div class="hero-media">
			<div class="hero-img-wrap">
				<img
					src="https://images.pexels.com/photos/5373256/pexels-photo-5373256.jpeg"
					alt="Cozy interior of Charlie's Coffee"
					width="800"
					height="1000"
				>
				<div class="hero-img-caption">
					<div>
						<p style="margin:0;font-size:0.625rem;letter-spacing:0.28em;text-transform:uppercase;opacity:.8;">Today&rsquo;s bean</p>
						<p class="font-serif" style="margin:0;font-size:1.5rem;">Ethiopia · Guji</p>
					</div>
					<span style="border-radius:999px;background:rgba(204,88,3,.95);padding:.25rem .75rem;font-size:.75rem;">Filter · Espresso</span>
				</div>
			</div>
			<div class="float-card">
				<span class="brand-mark" aria-hidden="true">☕</span>
				<div>
					<p style="margin:0;font-size:.75rem;letter-spacing:.2em;text-transform:uppercase;color:var(--ink-muted);">Served in</p>
					<p class="font-serif" style="margin:0;font-size:1.125rem;color:var(--forest);">Ceramic · never paper</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="intro-strip">
	<div class="container intro-grid">
		<div>
			<p class="num">01</p>
			<h3>Small batch, roasted local</h3>
			<p>We pull from a rotating roster of Australian roasters — never more than two weeks off roast.</p>
		</div>
		<div>
			<p class="num">02</p>
			<h3>A table for students</h3>
			<p>Free wifi, quiet corners, and a student discount on filter every weekday afternoon.</p>
		</div>
		<div>
			<p class="num">03</p>
			<h3>Made in-house, daily</h3>
			<p>Pastries baked at 5am. Sandwiches built to order. Nothing sits around long.</p>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="section-head">
			<div>
				<p class="eyebrow">This week&rsquo;s picks</p>
				<h2>Featured drinks</h2>
			</div>
			<a class="link-arrow" href="<?php echo esc_url( $menu_url ); ?>">See the full menu →</a>
		</div>
		<div class="cards-3">
			<?php if ( empty( $featured ) ) : ?>
				<p class="lead"><?php esc_html_e( 'Mark menu items as Featured in WP Admin to show them here.', 'charlies-coffee' ); ?></p>
			<?php else : ?>
				<?php foreach ( $featured as $f ) : ?>
					<article class="card">
						<?php if ( ! empty( $f['img'] ) ) : ?>
							<div class="card-img">
								<img src="<?php echo esc_url( $f['img'] ); ?>" alt="<?php echo esc_attr( $f['name'] ); ?>" loading="lazy" width="600" height="450">
							</div>
						<?php endif; ?>
						<div class="card-body">
							<div class="card-meta">
								<span><?php echo esc_html( $f['tag'] ); ?></span>
								<span class="price">S$<?php echo esc_html( $f['price'] ); ?></span>
							</div>
							<h3><?php echo esc_html( $f['name'] ); ?></h3>
							<p><?php echo esc_html( $f['desc'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<section>
	<div class="container cat-grid">
		<?php foreach ( $categories as $c ) : ?>
			<a class="cat-pill" href="<?php echo esc_url( $menu_url . '#' . $c['id'] ); ?>">
				<p class="eyebrow">Explore</p>
				<p class="title"><?php echo esc_html( $c['title'] ); ?></p>
			</a>
		<?php endforeach; ?>
	</div>
</section>

<section>
	<div class="container">
		<div class="cta-band">
			<div>
				<p class="eyebrow">Come say hi</p>
				<h2>Your next favourite <br>cup is on the corner.</h2>
			</div>
			<div class="cta-actions">
				<a class="btn btn-burnt" href="<?php echo esc_url( $menu_url ); ?>">View the menu →</a>
				<a class="btn btn-light-outline" href="<?php echo esc_url( $contact_url ); ?>">Find us</a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
