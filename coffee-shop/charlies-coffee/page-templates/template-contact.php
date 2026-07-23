<?php
/**
 * Template Name: Contact
 *
 * @package Charlies_Coffee
 */

get_header();
?>

<section class="page-hero">
	<div class="container">
		<p class="eyebrow">Find us</p>
		<div class="page-hero-row" style="align-items:end;">
			<h1 class="display">
				Corner of <span class="em">Lantern Lane</span>. <br>
				Say hi.
			</h1>
			<p class="lead">
				Message us about bookings, private hire, wholesale beans, or just to
				tell us how the flat white was. We read everything.
			</p>
		</div>
	</div>
</section>

<section>
	<div class="container contact-grid">
		<div class="contact-form">
			<h2 class="font-serif" style="margin:0;font-size:1.875rem;color:var(--forest);">Send us a message</h2>
			<p style="margin:.5rem 0 0;color:var(--ink-muted);font-size:.875rem;">
				Bookings, wholesale, or just say hello — we read everything.
			</p>

			<form class="form-grid" method="post" action="#" onsubmit="alert('Thanks! We will get back to you soon.'); return false;">
				<div>
					<label for="c-name">Name</label>
					<input id="c-name" name="name" type="text" required placeholder="Your name">
				</div>
				<div>
					<label for="c-email">Email</label>
					<input id="c-email" name="email" type="email" required placeholder="you@example.com">
				</div>
				<div class="full">
					<label for="c-topic">Topic</label>
					<select id="c-topic" name="topic">
						<option>General</option>
						<option>Bookings</option>
						<option>Private hire</option>
						<option>Wholesale beans</option>
						<option>Feedback</option>
					</select>
				</div>
				<div class="full">
					<label for="c-message">Message</label>
					<textarea id="c-message" name="message" required placeholder="Tell us what's on your mind…"></textarea>
				</div>
				<div class="full">
					<button class="btn btn-primary" type="submit">Send message</button>
				</div>
			</form>
		</div>

		<aside class="contact-aside">
			<div class="info-card">
				<span class="hours-widget" data-hours-widget></span>
				<div class="info-row">
					<div>
						<strong>42 Lantern Lane</strong>
						Townsville QLD 4810
					</div>
				</div>
				<div class="info-row">
					<div>
						<strong>Hours</strong>
						Mon–Fri · 6:30a – 5:00p<br>
						Sat–Sun · 7:30a – 3:00p
					</div>
				</div>
				<div class="info-row">
					<div>
						<strong>Phone</strong>
						(07) 4772 0000
					</div>
				</div>
				<div class="info-row">
					<div>
						<strong>Email</strong>
						hello@charliescoffee.com.au
					</div>
				</div>
			</div>

			<div class="map-card">
				<div>
					<p class="font-serif" style="margin:0;font-size:1.5rem;color:var(--forest);">Find us here</p>
					<p style="margin:.5rem 0 0;color:var(--ink-muted);font-size:.875rem;">
						42 Lantern Lane, Townsville QLD 4810
					</p>
				</div>
			</div>
		</aside>
	</div>
</section>

<?php
get_footer();
