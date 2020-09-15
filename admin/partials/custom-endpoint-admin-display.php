<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/Orinwebsolutions
 * @since      1.0.0
 *
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1>Plugin Settings</h1>
    <form method="post" action="options.php">
    <?php 
        settings_fields( 'custom_endpoint_group' ); // settings group name
        do_settings_sections( 'custom-endpoint' ); // just a page slug
        submit_button();
    ?>
    </form>
</div>