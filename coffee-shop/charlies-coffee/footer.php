</main>

<footer class="site-footer">
	<div class="container footer-grid">
		<div>
			<p class="eyebrow">Charlie&rsquo;s Coffee</p>
			<h3>Small-batch coffee. <br>Big neighbourhood energy.</h3>
			<p class="footer-muted">
				A student-friendly cafe on the corner — good beans, honest pastries,
				and a table that&rsquo;s always yours.
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
				<li>42 Lantern Lane<br>Townsville QLD 4810</li>
				<li>(07) 4772 0000</li>
				<li>Mon–Fri · 6:30a – 5:00p<br>Sat–Sun · 7:30a – 3:00p</li>
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
