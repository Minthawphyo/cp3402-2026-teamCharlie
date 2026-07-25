<?php
/**
 * Menu Item custom post type + Menu Category taxonomy.
 * Editable in WP Admin: name, description, price, category.
 *
 * @package Charlies_Coffee
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register CPT + taxonomy.
 */
function charlies_coffee_register_menu_cpt() {
	register_post_type(
		'menu_item',
		array(
			'labels'       => array(
				'name'          => __( 'Menu Items', 'charlies-coffee' ),
				'singular_name' => __( 'Menu Item', 'charlies-coffee' ),
				'add_new_item'  => __( 'Add Menu Item', 'charlies-coffee' ),
				'edit_item'     => __( 'Edit Menu Item', 'charlies-coffee' ),
				'all_items'     => __( 'All Menu Items', 'charlies-coffee' ),
				'menu_name'     => __( 'Menu Items', 'charlies-coffee' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-coffee',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'rewrite'      => array( 'slug' => 'menu-item' ),
		)
	);

	register_taxonomy(
		'menu_category',
		'menu_item',
		array(
			'labels'            => array(
				'name'          => __( 'Menu Categories', 'charlies-coffee' ),
				'singular_name' => __( 'Menu Category', 'charlies-coffee' ),
				'add_new_item'  => __( 'Add Menu Category', 'charlies-coffee' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'menu-category' ),
		)
	);
}
add_action( 'init', 'charlies_coffee_register_menu_cpt' );

/**
 * Price + featured meta.
 */
function charlies_coffee_register_menu_meta() {
	register_post_meta(
		'menu_item',
		'_menu_price',
		array(
			'type'              => 'string',
			'single'            => true,
			'show_in_rest'      => true,
			'auth_callback'     => function () {
				return current_user_can( 'edit_posts' );
			},
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	register_post_meta(
		'menu_item',
		'_menu_featured',
		array(
			'type'              => 'boolean',
			'single'            => true,
			'show_in_rest'      => true,
			'auth_callback'     => function () {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'charlies_coffee_register_menu_meta' );

function charlies_coffee_menu_meta_boxes() {
	add_meta_box(
		'charlies_menu_details',
		__( 'Menu details', 'charlies-coffee' ),
		'charlies_coffee_render_menu_meta_box',
		'menu_item',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'charlies_coffee_menu_meta_boxes' );

function charlies_coffee_render_menu_meta_box( $post ) {
	wp_nonce_field( 'charlies_menu_meta', 'charlies_menu_meta_nonce' );
	$price    = get_post_meta( $post->ID, '_menu_price', true );
	$featured = (bool) get_post_meta( $post->ID, '_menu_featured', true );
	?>
	<p>
		<label for="charlies_menu_price"><strong><?php esc_html_e( 'Price (SGD)', 'charlies-coffee' ); ?></strong></label><br>
		<input type="text" id="charlies_menu_price" name="charlies_menu_price" value="<?php echo esc_attr( $price ); ?>" placeholder="5.20" style="width:100%;">
		<span class="description"><?php esc_html_e( 'Numbers only, e.g. 5.20 — shown as S$5.20', 'charlies-coffee' ); ?></span>
	</p>
	<p>
		<label>
			<input type="checkbox" name="charlies_menu_featured" value="1" <?php checked( $featured ); ?>>
			<?php esc_html_e( 'Featured on Home page', 'charlies-coffee' ); ?>
		</label>
	</p>
	<p class="description"><?php esc_html_e( 'Title = name. Editor = short description.', 'charlies-coffee' ); ?></p>
	<?php
}

function charlies_coffee_save_menu_meta( $post_id ) {
	if ( ! isset( $_POST['charlies_menu_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['charlies_menu_meta_nonce'] ) ), 'charlies_menu_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$price = isset( $_POST['charlies_menu_price'] ) ? sanitize_text_field( wp_unslash( $_POST['charlies_menu_price'] ) ) : '';
	update_post_meta( $post_id, '_menu_price', $price );
	update_post_meta( $post_id, '_menu_featured', ! empty( $_POST['charlies_menu_featured'] ) ? 1 : 0 );
}
add_action( 'save_post_menu_item', 'charlies_coffee_save_menu_meta' );

/**
 * Category term fields: tagline + image URL + sort order.
 */
function charlies_coffee_category_add_fields() {
	?>
	<div class="form-field">
		<label for="charlies_cat_tagline"><?php esc_html_e( 'Tagline', 'charlies-coffee' ); ?></label>
		<input type="text" name="charlies_cat_tagline" id="charlies_cat_tagline" value="">
	</div>
	<div class="form-field">
		<label for="charlies_cat_image"><?php esc_html_e( 'Image URL', 'charlies-coffee' ); ?></label>
		<input type="url" name="charlies_cat_image" id="charlies_cat_image" value="">
	</div>
	<div class="form-field">
		<label for="charlies_cat_sort"><?php esc_html_e( 'Sort order', 'charlies-coffee' ); ?></label>
		<input type="number" name="charlies_cat_sort" id="charlies_cat_sort" value="0" min="0">
	</div>
	<?php
}
add_action( 'menu_category_add_form_fields', 'charlies_coffee_category_add_fields' );

function charlies_coffee_category_edit_fields( $term ) {
	$tagline = get_term_meta( $term->term_id, 'tagline', true );
	$image   = get_term_meta( $term->term_id, 'image', true );
	$sort    = get_term_meta( $term->term_id, 'sort_order', true );
	?>
	<tr class="form-field">
		<th><label for="charlies_cat_tagline"><?php esc_html_e( 'Tagline', 'charlies-coffee' ); ?></label></th>
		<td><input type="text" name="charlies_cat_tagline" id="charlies_cat_tagline" value="<?php echo esc_attr( $tagline ); ?>"></td>
	</tr>
	<tr class="form-field">
		<th><label for="charlies_cat_image"><?php esc_html_e( 'Image URL', 'charlies-coffee' ); ?></label></th>
		<td><input type="url" name="charlies_cat_image" id="charlies_cat_image" value="<?php echo esc_url( $image ); ?>" style="width:100%;"></td>
	</tr>
	<tr class="form-field">
		<th><label for="charlies_cat_sort"><?php esc_html_e( 'Sort order', 'charlies-coffee' ); ?></label></th>
		<td><input type="number" name="charlies_cat_sort" id="charlies_cat_sort" value="<?php echo esc_attr( $sort ? $sort : 0 ); ?>" min="0"></td>
	</tr>
	<?php
}
add_action( 'menu_category_edit_form_fields', 'charlies_coffee_category_edit_fields' );

function charlies_coffee_save_category_meta( $term_id ) {
	if ( isset( $_POST['charlies_cat_tagline'] ) ) {
		update_term_meta( $term_id, 'tagline', sanitize_text_field( wp_unslash( $_POST['charlies_cat_tagline'] ) ) );
	}
	if ( isset( $_POST['charlies_cat_image'] ) ) {
		update_term_meta( $term_id, 'image', esc_url_raw( wp_unslash( $_POST['charlies_cat_image'] ) ) );
	}
	if ( isset( $_POST['charlies_cat_sort'] ) ) {
		update_term_meta( $term_id, 'sort_order', (int) $_POST['charlies_cat_sort'] );
	}
}
add_action( 'created_menu_category', 'charlies_coffee_save_category_meta' );
add_action( 'edited_menu_category', 'charlies_coffee_save_category_meta' );

/**
 * Admin list: show price column.
 */
function charlies_coffee_menu_columns( $columns ) {
	$new = array();
	foreach ( $columns as $key => $label ) {
		$new[ $key ] = $label;
		if ( 'title' === $key ) {
			$new['menu_price'] = __( 'Price', 'charlies-coffee' );
		}
	}
	return $new;
}
add_filter( 'manage_menu_item_posts_columns', 'charlies_coffee_menu_columns' );

function charlies_coffee_menu_column_content( $column, $post_id ) {
	if ( 'menu_price' === $column ) {
		$price = get_post_meta( $post_id, '_menu_price', true );
		echo $price ? 'S$' . esc_html( $price ) : '—';
	}
}
add_action( 'manage_menu_item_posts_custom_column', 'charlies_coffee_menu_column_content', 10, 2 );

/**
 * Build menu sections from CPT (same shape templates already use).
 *
 * @return array
 */
function charlies_coffee_get_menu_categories() {
	$terms = get_terms(
		array(
			'taxonomy'   => 'menu_category',
			'hide_empty' => false,
		)
	);

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		return array();
	}

	usort(
		$terms,
		function ( $a, $b ) {
			$sa = (int) get_term_meta( $a->term_id, 'sort_order', true );
			$sb = (int) get_term_meta( $b->term_id, 'sort_order', true );
			if ( $sa === $sb ) {
				return strcasecmp( $a->name, $b->name );
			}
			return $sa <=> $sb;
		}
	);

	$sections = array();
	foreach ( $terms as $term ) {
		$query = new WP_Query(
			array(
				'post_type'      => 'menu_item',
				'posts_per_page' => -1,
				'orderby'        => array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				),
				'tax_query'      => array(
					array(
						'taxonomy' => 'menu_category',
						'field'    => 'term_id',
						'terms'    => $term->term_id,
					),
				),
			)
		);

		$items = array();
		foreach ( $query->posts as $post ) {
			$items[] = array(
				'name'  => get_the_title( $post ),
				'desc'  => wp_strip_all_tags( $post->post_content ),
				'price' => get_post_meta( $post->ID, '_menu_price', true ),
			);
		}
		wp_reset_postdata();

		$sections[] = array(
			'id'      => $term->slug,
			'title'   => $term->name,
			'tagline' => get_term_meta( $term->term_id, 'tagline', true ),
			'image'   => get_term_meta( $term->term_id, 'image', true ),
			'items'   => $items,
		);
	}

	return $sections;
}

/**
 * Featured items for the home page (checked in admin).
 *
 * @param int $limit Max items.
 * @return array
 */
function charlies_coffee_get_featured_items( $limit = 3 ) {
	$query = new WP_Query(
		array(
			'post_type'      => 'menu_item',
			'posts_per_page' => $limit,
			'meta_key'       => '_menu_featured',
			'meta_value'     => '1',
			'orderby'        => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
		)
	);

	$items = array();
	foreach ( $query->posts as $post ) {
		$terms = get_the_terms( $post, 'menu_category' );
		$tag   = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';
		$img   = get_the_post_thumbnail_url( $post, 'large' );
		if ( ! $img && $terms && ! is_wp_error( $terms ) ) {
			$img = get_term_meta( $terms[0]->term_id, 'image', true );
		}
		$items[] = array(
			'tag'   => $tag,
			'name'  => get_the_title( $post ),
			'desc'  => wp_strip_all_tags( $post->post_content ),
			'price' => get_post_meta( $post->ID, '_menu_price', true ),
			'img'   => $img ? $img : '',
		);
	}
	wp_reset_postdata();

	return $items;
}
