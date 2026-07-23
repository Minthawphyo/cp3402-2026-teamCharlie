<?php
/**
 * Template Name: About
 *
 * @package Charlies_Coffee
 */

get_header();

$menu_url    = charlies_coffee_page_url( 'menu', '/menu/' );
$contact_url = charlies_coffee_page_url( 'contact', '/contact/' );
?>

<section class="page-hero">
	<div class="container" style="display:grid;gap:2.5rem;align-items:end;">
		<div style="display:grid;gap:2rem;">
			<div>
				<p class="eyebrow">Our story</p>
				<h1 class="display" style="margin-top:1.5rem;">
					Started with one <br>
					<span class="em">borrowed</span> grinder.
				</h1>
			</div>
			<p class="lead">
				Charlie&rsquo;s began as a Sunday-only pop-up outside a share house in 2019.
				Six years, three roasters and a lot of late-night espresso later, we
				settled on the corner of Lantern Lane — and we&rsquo;ve been pouring
				neighbourhood cups ever since.
			</p>
		</div>
	</div>
</section>

<section>
	<div class="container about-spread">
		<div class="about-photo">
			<img
				src="https://images.pexels.com/photos/5373256/pexels-photo-5373256.jpeg"
				alt="Interior of Charlie's Coffee"
				loading="lazy"
				width="1200"
				height="750"
			>
		</div>
		<div class="about-card">
			<p class="eyebrow">What we&rsquo;re about</p>
			<h2>Coffee that treats you like a regular from day one.</h2>
			<p>
				We&rsquo;re a small team who happen to love coffee, but we&rsquo;re here
				for the people first. Whether it&rsquo;s your first ever flat white or
				your fourth of the morning — you&rsquo;re welcome.
			</p>
		</div>
	</div>
</section>

<section>
	<div class="container values">
		<div class="value-card">
			<span class="value-icon" aria-hidden="true">🌿</span>
			<h3>Sourced with care</h3>
			<p>Direct-trade relationships and seasonal single origins. We tell you the farm, altitude and process — always.</p>
		</div>
		<div class="value-card">
			<span class="value-icon" aria-hidden="true">🎓</span>
			<h3>Made for students</h3>
			<p>S$1 filter refills between 2–5pm on weekdays. Bring your textbooks, we&rsquo;ll bring the caffeine.</p>
		</div>
		<div class="value-card">
			<span class="value-icon" aria-hidden="true">🤝</span>
			<h3>Community first</h3>
			<p>We round up tips into a monthly donation to a local youth music program. Every cup, a small vote.</p>
		</div>
	</div>
</section>

<section>
	<div class="container" style="padding-bottom:6rem;">
		<div class="cta-band">
			<div>
				<p class="eyebrow">Come visit</p>
				<h2>See you on Lantern Lane.</h2>
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
