<?php 

/**
 * This script contains CPT for Company , 
*/

if ( ! function_exists('art_sync_register_airtable_cpt') ) {

    function art_sync_register_airtable_cpt() {

        $labels = array(
            'name'                  => _x( 'Airtables', 'Post Type General Name', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'singular_name'         => _x( 'Airtable', 'Post Type Singular Name', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'menu_name'             => __( 'Airtables', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'name_admin_bar'        => __( 'Airtable', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'archives'              => __( 'Airtable Archives', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'attributes'            => __( 'Airtable Attributes', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'parent_item_colon'     => __( 'Parent Airtable:', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'all_items'             => __( 'All Airtables', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'add_new_item'          => __( 'Add New Airtable', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'add_new'               => __( 'Add New', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'new_item'              => __( 'New Airtable', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'edit_item'             => __( 'Edit Airtable', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'update_item'           => __( 'Update Airtable', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'view_item'             => __( 'View Airtable', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'view_items'            => __( 'View Airtables', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'search_items'          => __( 'Search Airtable', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'not_found'             => __( 'Not found', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'featured_image'        => __( 'Featured Image', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'set_featured_image'    => __( 'Set featured image', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'remove_featured_image' => __( 'Remove featured image', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'use_featured_image'    => __( 'Use as featured image', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'insert_into_item'      => __( 'Insert into Airtable', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Airtable', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'items_list'            => __( 'Airtables list', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'items_list_navigation' => __( 'Airtables list navigation', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'filter_items_list'     => __( 'Filter Airtables list', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
        );
        $args = array(
            'label'                 => __( 'Airtable', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'description'           => __( 'Post Type Description', 'ART_SYNC_ART_SYNC_ART_SYNC_TEXT_DOMAIN' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-rest-api',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );

        register_post_type( 'airtable', $args );
    }
    add_action( 'init', 'art_sync_register_airtable_cpt', 0 );
}


 
if(! function_exists('art_sync_company_information_metabox')){
function art_sync_company_information_metabox() {
    add_meta_box(
        'airtable_rating_category',            
        'Company Information',                 
        'art_sync_company_information_metabox_callback', 
        'airtable',                           
        'normal',                            
        'default'                            
    );
}


add_action( 'add_meta_boxes_airtable', 'art_sync_company_information_metabox' );
}

if(! function_exists('art_sync_company_information_metabox_callback')) {
function art_sync_company_information_metabox_callback( $post ) {

    $rating = get_post_meta( $post->ID, '_airtable_rating', true ); 
    $category = get_post_meta( $post->ID, '_airtable_category', true ); 
    $average_no_employees = get_post_meta( $post->ID, '_airtable_average', true ); 
    $description = get_post_meta( $post->ID, '_airtable_description', true ); 
    $logo = get_post_meta( $post->ID, '_airtable_logo', true ); 

    ?>

    <table class="form-table">
        <tbody>
            <tr>
                <th><label for="airtable_rating">Rating:</label></th>
                <td>
                    <input type="number" id="airtable_rating" name="airtable_rating" min="1" max="5" step="1" value="<?php echo esc_attr( $rating ); ?>" class="no-arrows">
                </td>
            </tr>
            <tr>
                <th><label for="airtable_category">Category:</label></th>
                <td>
                    <select id="airtable_category" name="airtable_category">
                        <option value="category1" <?php selected( $category, 'category1'); ?>>Category 1</option>
                        <option value="category2" <?php selected( $category, 'category2' ); ?>>Category 2</option>
                        <option value="category3" <?php selected( $category, 'category3' ); ?>>Category 3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="airtable_average">Average Of Employees</label></th>
                <td>
                    <input type="number" id="airtable_average_employees" name="airtable_average" value="<?php echo esc_attr($average_no_employees); ?>">
                </td>
            </tr>
            <tr>
                <th><label for="airtable_description">Description</label></th>
                <td>
                    <input type="text" id="airtable_description" name="airtable_description" value="<?php echo esc_attr($description); ?>">
                </td>
            </tr>
            <tr>
                <th><label for="airtable_logo">Logo</label></th>
                <td>
                    <input type="file" id="airtable_logo" name="airtable_logo" value="<?php echo esc_attr($logo); ?>">
                    <?php if ( $logo ) : ?>
                        <img src="<?php echo esc_url( $logo ); ?>" style="max-width: 200px; height: auto;">
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>

<?php
}
}
