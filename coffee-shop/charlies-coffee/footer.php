</main>

<footer class="site-footer">
	<div class="container footer-grid">
		<div>
			<p class="eyebrow">Charlie&rsquo;s Coffee</p>
			<h3>Small-batch coffee. <br>Big neighbourhood energy.</h3>
			<p class="footer-muted">
				<?php echo wp_kses_post( charlies_coffee_get_contact( 'footer_tagline' ) ); ?>
			</p>
			<form class="newsletter" action="#" method="post" onsubmit="return false;">
				<label class="sr-only" for="footer-email">Email address</label>
				<input id="footer-email" type="email" name="email" placeholder="Your email" required>
				<button class="btn btn-burnt" type="submit">Get the drop</button>
			</form>
		</div>

		<div>
			<h4>Visit</h4>
			<ul class="footer-list">
				<li><?php echo nl2br( esc_html( charlies_coffee_get_contact( 'address' ) ) ); ?></li>
				<li><?php echo esc_html( charlies_coffee_get_contact( 'phone' ) ); ?></li>
				<li><?php echo esc_html( charlies_coffee_get_contact( 'hours' ) ); ?></li>
			</ul>
		</div>

		<div>
			<h4>Explore</h4>
			<ul class="footer-list">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
				<li><a href="<?php echo esc_url( charlies_coffee_page_url( 'menu', '/menu/' ) ); ?>">Menu</a></li>
				<li><a href="<?php echo esc_url( charlies_coffee_page_url( 'about', '/about/' ) ); ?>">About</a></li>
				<li><a href="<?php echo esc_url( charlies_coffee_page_url( 'contact', '/contact/' ) ); ?>">Find Us</a></li>
			</ul>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Charlie&rsquo;s Coffee. Brewed with care.</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
