<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
	<div class="container header-inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Charlie's Coffee — home">
			<span class="brand-mark" aria-hidden="true">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/><line x1="6" x2="6" y1="2" y2="4"/><line x1="10" x2="10" y1="2" y2="4"/><line x1="14" x2="14" y1="2" y2="4"/></svg>
			</span>
			<span class="brand-name">Charlie&rsquo;s</span>
		</a>

		<nav class="nav-desktop" aria-label="Primary">
			<a class="<?php echo charlies_coffee_is_page( 'home' ) ? 'is-active' : ''; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
			<a class="<?php echo charlies_coffee_is_page( 'menu' ) ? 'is-active' : ''; ?>" href="<?php echo esc_url( charlies_coffee_page_url( 'menu', '/menu/' ) ); ?>">Menu</a>
			<a class="<?php echo charlies_coffee_is_page( 'about' ) ? 'is-active' : ''; ?>" href="<?php echo esc_url( charlies_coffee_page_url( 'about', '/about/' ) ); ?>">About</a>
			<a class="<?php echo charlies_coffee_is_page( 'contact' ) ? 'is-active' : ''; ?>" href="<?php echo esc_url( charlies_coffee_page_url( 'contact', '/contact/' ) ); ?>">Find Us</a>
		</nav>

		<div class="header-actions">
			<span class="hours-widget hours-desktop" data-hours-widget></span>
			<a class="btn btn-primary header-cta" href="<?php echo esc_url( charlies_coffee_page_url( 'menu', '/menu/' ) ); ?>">View Menu</a>
			<button type="button" class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="mobile-panel" aria-label="Open menu">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
			</button>
		</div>
	</div>

	<div class="mobile-panel" id="mobile-panel" hidden>
		<nav aria-label="Mobile">
			<a class="<?php echo charlies_coffee_is_page( 'home' ) ? 'is-active' : ''; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
			<a class="<?php echo charlies_coffee_is_page( 'menu' ) ? 'is-active' : ''; ?>" href="<?php echo esc_url( charlies_coffee_page_url( 'menu', '/menu/' ) ); ?>">Menu</a>
			<a class="<?php echo charlies_coffee_is_page( 'about' ) ? 'is-active' : ''; ?>" href="<?php echo esc_url( charlies_coffee_page_url( 'about', '/about/' ) ); ?>">About</a>
			<a class="<?php echo charlies_coffee_is_page( 'contact' ) ? 'is-active' : ''; ?>" href="<?php echo esc_url( charlies_coffee_page_url( 'contact', '/contact/' ) ); ?>">Find Us</a>
			<div class="mobile-panel-foot">
				<span class="hours-widget" data-hours-widget></span>
				<a class="btn btn-primary" href="<?php echo esc_url( charlies_coffee_page_url( 'menu', '/menu/' ) ); ?>">View Menu</a>
			</div>
		</nav>
	</div>
</header>

<main class="site-main">
