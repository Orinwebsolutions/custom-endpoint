<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/Orinwebsolutions
 * @since      1.0.0
 *
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php get_header(); ?>
<div class="container">
        
        <?php
            if(!empty($result))
            {
        ?>
            <div class="row text-center">
                <div class="col-sm-12 col-md-2">
                    <strong>ID</strong>
                </div>
                <div class="col-sm-12 col-md-2">
                    <strong>Name</strong>
                </div>
                <div class="col-sm-12 col-md-2">
                    <strong>Username</strong>
                </div>
                <div class="col-sm-12 col-md-2">
                    <strong>Email</strong>
                </div>
                <div class="col-sm-12 col-md-2">
                    <strong>Phone</strong>
                </div>
                <div class="col-sm-12 col-md-2">
                    <strong>Address</strong>
                </div>
            </div>
            <?php 
                foreach ($result as $key => $value) {
            ?>
            <div class="row text-center">
                <div class="col-sm-12 col-md-2">
                    <a class="link user_id" data-user_id="<?php echo $value->id;?>" href="#"><?php echo $value->id; ?></a>
                </div>
                <div class="col-sm-12 col-md-2">
                    <a class="link user_id" data-user_id="<?php echo $value->id;?>" href="#"><?php echo $value->name; ?></a>
                </div>
                <div class="col-sm-12 col-md-2">
                    <a class="link user_id" data-user_id="<?php echo $value->id;?>" href="#"><?php echo $value->username; ?></a>
                </div>
                <div class="col-sm-12 col-md-2">
                    <?php echo $value->email; ?>
                </div>
                <div class="col-sm-12 col-md-2">
                    <?php echo $value->phone; ?>
                </div>
                <div class="col-sm-12 col-md-2">
                    <?php
                    echo sprintf(
                        '%s, %s, %s, %s',
                        $value->address->street,
                        $value->address->suite,
                        $value->address->city,
                        $value->address->zipcode
                    );
                    // echo $value->address->street.', ';
                    //  echo $value->website; 
                     ?>
                </div>
            </div>
            <?php
                }
            ?>
        <?php
        }
        else
        {
        ?>
            <div class="row">
                <div class="col-sm-12">
                    No result found
                </div>
            </div>
        <?php 
        } 
        ?>
</div>
<?php get_footer(); ?>