<?php
/**
 * Template Name: Contact
 *
 * @package Charlies_Coffee
 */

$contact_status = '';

if ( isset( $_POST['charlies_contact_submit'] ) ) {
	$nonce_ok = isset( $_POST['charlies_contact_nonce'] )
		&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['charlies_contact_nonce'] ) ), 'charlies_contact_form' );

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$topic   = isset( $_POST['topic'] ) ? sanitize_text_field( wp_unslash( $_POST['topic'] ) ) : 'General';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( $nonce_ok && $name && is_email( $email ) && $message ) {
		$sent = wp_mail(
			get_option( 'admin_email' ),
			sprintf( '[Charlie\'s Coffee] New enquiry: %s', $topic ),
			"Name: {$name}\nEmail: {$email}\nTopic: {$topic}\n\nMessage:\n{$message}",
			array( 'Reply-To: ' . $name . ' <' . $email . '>' )
		);
		$contact_status = $sent ? 'success' : 'error';
	} else {
		$contact_status = 'error';
	}
}

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

			<?php if ( 'success' === $contact_status ) : ?>
				<p class="form-status form-status-success" role="status">Thanks — your message is sent. We'll get back to you soon.</p>
			<?php elseif ( 'error' === $contact_status ) : ?>
				<p class="form-status form-status-error" role="alert">Something went wrong sending that — please check the fields and try again, or call us directly.</p>
			<?php endif; ?>

			<form class="form-grid" method="post" action="">
				<?php wp_nonce_field( 'charlies_contact_form', 'charlies_contact_nonce' ); ?>
				<input type="hidden" name="charlies_contact_submit" value="1">
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
						Every day · 9:00a – 8:00p
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
