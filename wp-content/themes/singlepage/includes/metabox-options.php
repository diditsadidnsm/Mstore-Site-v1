<?php

/**
 * Calls the class on the post edit screen.
 */
function singlepage_call_metaboxClass() {
    new singlepage_metaboxClass();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'singlepage_call_metaboxClass' );
    add_action( 'load-post-new.php', 'singlepage_call_metaboxClass' );
}

/** 
 * The Class.
 */
class singlepage_metaboxClass {

	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	/**
	 * Adds the meta box container.
	 */
	public function add_meta_box( $post_type ) {
            $post_types = array('page');     //limit meta box to certain post types
            if ( in_array( $post_type, $post_types )) {
		add_meta_box(
			'singlepage_page_meta_box'
			,__( 'Singlepage Metabox Options', 'singlepage' )
			,array( $this, 'render_meta_box_content' )
			,$post_type
			,'advanced'
			,'high'
		);
            }
	}


	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function save( $post_id ) {
	
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['singlepage_inner_custom_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['singlepage_inner_custom_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'singlepage_inner_custom_box' ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted,
                //     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		/* OK, its safe for us to save the data now. */

		// Sanitize the user input.
		$show_breadcrumb              = sanitize_text_field( $_POST['show_breadcrumb'] );
		$show_title                   = sanitize_text_field( $_POST['show_title'] );
		$singlepage_right_sidebar     = sanitize_text_field( $_POST['page_layout'] );

		

		// Update the meta field.
		update_post_meta( $post_id, 'show_breadcrumb', $show_breadcrumb );
		update_post_meta( $post_id, 'show_title', $show_title );
		update_post_meta( $post_id, 'page_layout', $singlepage_right_sidebar );
	
	}


	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 */
	public function render_meta_box_content( $post ) {
	
		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'singlepage_inner_custom_box', 'singlepage_inner_custom_box_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$show_title       = get_post_meta( $post->ID, 'show_title', true );
	    $show_breadcrumb  = get_post_meta( $post->ID, 'show_breadcrumb', true );
		$page_layout      = get_post_meta( $post->ID, 'page_layout', true );


		// Display Breadcrumb
		echo '<p class="meta-options"><label for="singlepage_show_breadcrumb"  style="display: inline-block;width: 150px;">';
		_e( 'Show Breadcrumb :', 'singlepage' );
		echo '</label> ';
		echo '<select name="show_breadcrumb" id="singlepage_show_breadcrumb">
		<option '.selected($show_breadcrumb,'on',false).' value="on">'.__("Yes","singlepage").'</option>
		<option'.selected($show_breadcrumb,'off',false).' value="off">'.__("No","singlepage").'</option>
		</select></p>';
		
		// Display Title
		echo '<p class="meta-options"><label for="singlepage_show_title"  style="display: inline-block;width: 150px;">';
		_e( 'Show Title :', 'singlepage' );
		echo '</label> ';
		echo '<select name="show_title" id="singlepage_show_title">
		<option '.selected($show_title,'on',false).' value="on">'.__("Yes","singlepage").'</option>
		<option'.selected($show_title,'off',false).' value="off">'.__("No","singlepage").'</option>
		</select></p>';
		
		echo '<p class="meta-options"><label for="page_layout"  style="display: inline-block;width: 150px;">';
		_e( 'Choose Sidebar Layout :', 'singlepage' );
		echo '</label> ';
		echo '<select name="page_layout" id="page_layout">
		<option  value="full-width" '.selected($page_layout,'full-width',false).'>'.__("no sidebar","singlepage").'</option>
		<option  value="left-sidebar" '.selected($page_layout,'left-sidebar',false).'>'.__("left sidebar","singlepage").'</option>
		<option  value="right-sidebar" '.selected($page_layout,'right-sidebar',false).'>'.__("right sidebar","singlepage").'</option>
		</select></p>';
		
		
		
	}
}