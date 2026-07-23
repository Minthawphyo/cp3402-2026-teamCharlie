<?php
/**
 * Fallback template.
 *
 * @package Charlies_Coffee
 */

get_header();
?>

<section class="page-hero">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<p class="eyebrow"><?php the_title(); ?></p>
				<div class="lead" style="margin-top:1.5rem;max-width:48rem;">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<h1 class="display">Charlie&rsquo;s Coffee</h1>
			<p class="lead" style="margin-top:1.5rem;">Nothing here yet.</p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
