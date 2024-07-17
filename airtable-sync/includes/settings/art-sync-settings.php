<?php

/**
 * 
 *  This script contain plugin admin menu configurations fields.
 * 
 */


if (!function_exists('airtable_settings_page_cb')) {
    function airtable_settings_page_cb() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html__('Airtable Settings', ART_SYNC_TEXT_DOMAIN); ?></h1>
            <?php settings_errors(); ?>
            <form method="post" action="options.php">
                <?php settings_fields('airtable-settings'); ?>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><?php esc_html_e('Base ID', ART_SYNC_TEXT_DOMAIN); ?></th>
                            <td>
                                <input type="text" id="airtable_base_id" name="airtable_base_id" style="width: 50%;" value="<?php echo esc_attr(get_option('airtable_base_id')); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Table ID or Name', ART_SYNC_TEXT_DOMAIN); ?></th>
                            <td>
                                <input type="text" id="airtable_table_id" name="airtable_table_id" style="width: 50%;" value="<?php echo esc_attr(get_option('airtable_table_id')); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('API Token', ART_SYNC_TEXT_DOMAIN); ?></th>
                            <td>
                                <input type="text" id="airtable_api_token" name="airtable_api_token" style="width: 50%;" value="<?php echo esc_attr(get_option('airtable_api_token')); ?>" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php submit_button(__('Save Settings', ART_SYNC_TEXT_DOMAIN)); ?>
            </form>
        </div>
        <?php
    }
}


if ( ! function_exists('airtable_admin_menu_cb') ) {

    function airtable_admin_menu_cb() {

        add_menu_page(
            __('Airtable Sync', ART_SYNC_TEXT_DOMAIN),
            __('Airtable Sync', ART_SYNC_TEXT_DOMAIN),
            'manage_options',
            'airtable-settings',
            'airtable_settings_page_cb',
            'dashicons-database',
            80
        );

    }

    add_action('admin_menu', 'airtable_admin_menu_cb');

    add_action('admin_init', function () {
        register_setting('airtable-settings', 'airtable_base_id');
        register_setting('airtable-settings', 'airtable_table_id');
        register_setting('airtable-settings', 'airtable_api_token');
    });

}
